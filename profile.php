<?php

session_start();

require_once 'classes/Bookmark.php';
require_once 'classes/Database.php';
require_once 'classes/Favorite.php';
require_once 'classes/Category.php';
require_once 'classes/User.php';

include 'templates/header.php';

if(!logged_in())
{
    redirect('login.php');
}

$db = new Database();
$user = new User($db);
$bm = new Bookmark($db);
$fav = new Favorite($db);

$count_bms = $bm->getBookmarksCountByUserId($_SESSION['user_id']);
$count_favs = $fav->getCountFavorites($_SESSION['user_id']);
$latest_bms = $bm->getBookmarksByUserId($_SESSION['user_id'], 5);
$my_favs = $fav->getAllFavorites($_SESSION['user_id']);
$bms_categ = $bm->getCountUserBookmarksByCategory($_SESSION['user_id']);

if(isset($_POST['update_profile']))
{
    $errors = array();

    //check if post data is not empty
    if(empty($_POST['user_name']))
    {
        $errors[] = "Username field cannot be empty!";
    }

    if(empty($_POST['first_name']))
    {
        $errors[] = "First Name field cannot be empty!";
    }

    if(empty($_POST['last_name']))
    {
        $errors[] = "Last Name field cannot be empty!";
    }

    if(empty($_POST['email']))
    {
        $errors[] = "Email field cannot be empty!";
    }


    if(
        $_POST['user_name']  == $_SESSION['username'] &&
        $_POST['first_name'] == $_SESSION['first_name'] &&
        $_POST['last_name']  == $_SESSION['last_name'] &&
        $_POST['email']      == $_SESSION['email'] &&
        $_POST['language']   == $_SESSION['language']
    )
    {
        $errors[] = "No information was changed!";
    }

//    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
//    {
//        $errors[] = "Email field must contain a valid e-mail!";
//    }
    if(!$errors)
    {
        $update_user = $user->updateUser($_SESSION['user_id'], $_POST['user_name'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['language']);
        if(!$update_user){
            show_errors(["There was an error updating user's data: ".$update_user]);
        } else {
            $_SESSION['username'] = $_POST['user_name'];
            $_SESSION['first_name'] = $_POST['first_name'];
            $_SESSION['last_name'] = $_POST['last_name'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['lang'] = $_POST['language'];
            show_success("User profile was updated successfully. Go <a href='home.php' class='text-dark'>home</a>.");
        }
    } else {
        show_errors($errors);
    }
}

include 'templates/t_profile.php';

include 'templates/footer.php';
