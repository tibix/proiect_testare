<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Category.php';
require_once 'classes/User.php';

include 'templates/header.php';

if(logged_in()){
	if(isset($_POST['reset_password']))
	{
		$errors = array();

		if(empty($_POST['current_password'])){
			$errors[] .= '<p>Please enter your current password!</p>';
		}

		if(empty($_POST['new_password'])){
			$errors[] .= '<p>Please enter your new password!</p>';
		}

		if(empty($_POST['new_password_c'])){
			$errors[] .= '<p>Please confirm your new password!</p>';
		}

		if($_POST['new_password'] != $_POST['new_password_c']){
			$errors[] .= '<p>Your new passwords do not match!</p>';
		}

		if($_POST['current_password'] == $_POST['new_password']){
			$errors[] .= '<p>Password must be different!</p>';
		}

		$db = new Database();
		$user = new User($db);

		$current_user = $user->getUserById($_SESSION['user_id']);
		if($current_user['password'] != md5($_POST['current_password'])){
			$errors[] .= '<p>Your current password is incorrect</p>';
		}
		
		if($current_user['password'] == md5($_POST['new_password'])){
			$errors[] .= '<p>Your new password must be different from your current password!</p>';
		}

		if(!empty($errors))
		{
			show_errors($errors);
		} else {
			$user->updateUserPassword($_SESSION['user_id'], $_POST['new_password']);
			echo '<div class="alert alert-success alert-dismissible fade show text-secondary" role="alert">';
			echo '<p>Your password has been updated</p>';
			echo '</div>';
			sleep(2);
			redirect('home.php');
		}
	}
	include 'templates/t_password_reset.php';
} else {
	if(isset($_POST['recover_password']))
	{
		$errors = array();

		if(!isset($_POST['email']) || empty($_POST['email'])){
			$errors[] .= '<p>Please enter your email address!</p>';
		} else {
			$db = new Database();
			$user = new User($db);
			$user_data = $user->getUserByLogin($_POST['email']);
			if(empty($user_data)){
				$errors[] .= '<p>Sorry, we can\'t find that email address!</p>';
			}
		}

		if(!empty($errors))
		{
			show_errors($errors);
		} else {
			$user->setToken($user_data['id']);
			$uri = $_SERVER['REQUEST_URI'];
			$uri = explode('/', $uri);

			$reset_link = "http://" . $_SERVER['HTTP_HOST'];
			foreach($uri as $element){
				if($element != end($uri))
					$reset_link .= $element . "/";
			}

			$reset_link .= "password_recover.php?user_id=" . $user_data['id'] . "&token=" . $user->getToken($user_data['id']);
			sleep(2);
			redirect($reset_link);
		}
	}
	include 'templates/t_password_reset_email.php';
}

include 'templates/footer.php';