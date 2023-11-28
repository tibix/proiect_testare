<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Category.php';
require_once 'classes/User.php';

include 'templates/header.php';

/**
 * Displays an invalid message for password recovery.
 *
 * This function echoes an alert message indicating that the password recovery link is invalid.
 * It provides instructions for the user to check their email for the correct link or generate a new one.
 *
 * @return void
 */
function invalid_message()
{
	echo '<div class="alert alert-danger alert-dismissible fade show text-secondary" role="alert">';
	echo '<p>Invalid link!</p>';
	echo '<p>Please check your email for the correct link, or try to generate a new  <a href="password_reset.php" class="text-dark fw-bold">recovery link</a>!</p>';
	echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
	echo '</div>';
}

if(logged_in())
{
	redirect('password_reset.php');
	die();
}

if(isset($_GET['user_id']) && isset($_GET['token']))
{
	if(!empty($_GET['user_id']) && !empty($_GET['token'])){

		// check if user_id and token are valid
		$db = new Database();
		$user = new User($db);
		$user_id = $_GET['user_id'];
		$token = $_GET['token'];
		$user_data = $user->getUserById($user_id);

		if(!$user_data){
			invalid_message();
			die();
		}

		if(!$user->hasToken($user_id, $token)){
			invalid_message();
			die();
		}

		if(isset($_POST['recover_password']))
		{
			if(isset($_POST['new_password']) && isset($_POST['new_password_c']))
			{
				$errors = array();

				if(empty($_POST['new_password'])){
					$errors[] .= '<p>Please enter your new password!</p>';
				}

				if(empty($_POST['new_password_c'])){
					$errors[] .= '<p>Please confirm your new password!</p>';
				}

				if($_POST['new_password'] != $_POST['new_password_c']){
					$errors[] .= '<p>Passwords do not match!</p>';
				}

				if(!empty($errors))
				{
					show_errors($errors);
				} else {
					$user->updateUserPassword($user_id, $_POST['new_password']);
					$user->deleteToken($user_id);
					echo '<div class="alert alert-success alert-dismissible fade show text-secondary" role="alert">';
					echo '<p>Your password has been updated successfully!</p>';
					echo '<p>Click <a href="login.php" class="text-secondary fw-bold">here</a> to go to the login page.</p>';
					echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
					echo '</div>';
					die();
				}
			}
		}
		include 'templates/t_password_recover.php';
	} else {
		invalid_message();
		die();
	}
} else {
	redirect('password_reset.php');
}

include 'templates/footer.php';