<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Bookmark.php';
require_once 'classes/Category.php';

include 'templates/header.php';

if(!logged_in())
{
    redirect('login.php');
}

$form_title = "New";
if (isset($_POST['save'])) {
    $errors = array();

    if (isset($_POST['title'])) {
        if (empty($_POST['title'])) {
            $errors[] = "Title field cannot be empty";
            $title = '';
        } else if(strlen(trim($_POST['title'])) < 1) {
            $errors[] = 'Title field must contain valid string';
            $title = '';
        } else {
            $title = $_POST['title'];
        }
    } else {
        $errors[] = "Title field is required!";
    }

    if (isset($_POST['url'])) {
        if (empty($_POST['url'])) {
            $errors[] = "URL field cannot be empty";
            $url = '';
        } else if(!filter_var($_POST['url'], FILTER_VALIDATE_URL)) {
            $errors[] = 'URL field must contain a valid URL!';
            $url = '';
        } else {
            $url = $_POST['url'];
        }
    } else {
        $errors[] = "URL field is required!";
    }

    if (isset($_POST['description'])) {
        if (!empty($_POST['description'])) {
            $description = $_POST['description'];
        }
    } else {
        $description = "";
    }

    if (isset($_POST['category'])) {
        if (!empty($_POST['category'])) {
            $category = (int)$_POST['category'];
        }
    } else {
        $category = null;
    }

    if (empty($errors))
    {
        $db = new Database();
        $new_bm = new Bookmark($db);

        if(!$category) {
            $insert = $new_bm->createSimpleBookmark($title, $url, $description, NOW, $_SESSION['user_id']);
        } else {
            $insert = $new_bm->createBookmark($title, $url, $description, NOW, $_SESSION['user_id'], $category);
        }

        if($insert){
            echo '<div class="alert alert-success alert-dismissible fade show text-secondary" role="alert">';
            echo '<p>Bookmark was created successfully!</p>';
            echo '<p>Go to <a href="home.php" class="text-dark">home</a> page to see your new bookmark</p>';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            die();
        } else {
            $errors[] = "Could not update record! Try again or report the issue!";
        }
    } else {
        show_errors($errors);
    }
}
include 'templates/t_bookmark.php';


include 'templates/footer.php';