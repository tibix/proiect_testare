<?php

require_once 'classes/Database.php';
require_once 'classes/Category.php';
require_once 'classes/User.php';

include 'templates/header.php';

if(isset($_POST['register'])){

    $errors = array();
    $db = new Database();
    $user = new User($db);

    if(isset($_POST['user_name'])) { 
        $u_name = $_POST['user_name'];
        if($user->userExists($u_name)){
            $errors[] = "Username is already in use!</br>";
        }
    } else { 
        $errors[] = "Username is invalid!</br>";
    }
    if(isset($_POST['first_name'])) { $first_name = $_POST['first_name']; } else { $errors[] = "First name is invalid!</br>"; }
    if(isset($_POST['last_name'])) { $last_name = $_POST['last_name']; } else { $errors[] = "Last name is invalid!</br>"; }
    if(isset($_POST['email'])) { 
        $email = $_POST['email'];
        if($user->emailExists($email)){
            $errors[] = "This e-mail is already registered! Reset password <a href=\"password_reset.php\" class=\"text-dark\">here</a></br>";
        }
    } else { 
        $errors[] = "Invalid e-mail address!</br>";
    }
    if(isset($_POST['password'])) { $password = $_POST['password']; } else { $errors[] = "Invalid password!</br>"; }
    if(isset($_POST['password_c'])) { $password2 = $_POST['password_c']; } else { $errors[] = "Password confirmation invalid!</br>"; }
    if($_POST['password'] !== $_POST['password_c']) { $errors[] = "Passwords don't match!</br>"; }

    if(empty($errors)){
        $now = date('Y-m-d H:i:s');

        if($user->createUser($u_name, $first_name, $last_name, $email, $password, $now)) {
            $db->close();
            redirect("login.php");
        } else {
            $errors[] = "Error creating the account! Please try again later";
        }
    } else {
        show_errors($errors);
        include 'templates/t_register.php';
    }
} else {
    include 'templates/t_register.php';
}

include 'templates/footer.php';
