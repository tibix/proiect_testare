<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/User.php';

include 'templates/header.php';

if(isset($_POST['autentificare'])){

	$login = null;
	$password = null;
	$errors = array();
	$db = new Database();
	$auth = new User($db);

	if(isset($_POST['login'])){
		if(!empty($_POST['login'])){
			$log_in = $_POST['login'];
			$login = $auth->getUserByLogin($log_in);
			if(!$login){
				$errors[] .= "This user/email is not registered! You care register it<a href=\"register.php\"> here</a>";
			} else {
				if(isset($_POST['password'])){
					if(!empty($_POST['password'])){
						$password = $_POST['password'];
						if($login['password'] != md5($password)){
							$errors[] .= "Invalid password!";
						}
					} else {
						$errors[] .= "Field Password cannot be empty!";
					}
				} else {
					$errors[] .= "Missing password!";
				}
			}
		} else {
			$errors[] .= "Field Email/Username cannot be empty!";
		}
	} else {
		$errors[] .= "Missing username/email!";
	}

	if(empty($errors)){
		$_SESSION['user_id'] = $login['id'];
		$_SESSION['username'] = $login['user_name'];
		$_SESSION['first_name'] = $login['first_name'];
		$_SESSION['last_name'] = $login['last_name'];
		$_SESSION['email'] = $login['email'];
		$_SESSION['loggedin'] = TRUE;
		redirect("home.php");
	} else {
		foreach($errors as $error){
			echo "<div class=\"alert alert-danger alert-dismissible text-secondary fade show\" role=\"alert\">$error";
			echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
		}
		include 'templates/t_login.php';
	}
} else {
	include 'templates/t_login.php';
}

include 'templates/footer.php';
