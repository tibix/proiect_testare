<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Bookmark.php';
require_once 'classes/Category.php';

include 'templates/header.php';

if(!logged_in()) {
    redirect('index.php');
}

if(!isset($_GET['id'])){
    redirect('home.php');
}

if(empty($_GET['id']))
{
    redirect('home.php');
}


$errors = array();
$form_title = "Edit";
$id = $_GET['id'];
$db = new Database();
$bm = new Bookmark($db);

$bookmark = $bm->getBookmarkById($id);

if (!$bookmark) {
    $errors[] = "Bookmark not found!";
    show_errors($errors);
    die();
}

if ($bookmark['owner_id'] != $_SESSION['user_id']) {
    $errors[] = "You do not have permission to view this bookmark.";
    show_errors($errors);
    die();
}

$title = $bookmark['title'];
$url = $bookmark['URL'];
$description = $bookmark['description'];
$category = $bookmark['category_id'];

if (isset($_POST['save'])) {
    $errors = array();

    /**
     * check if all required fields have values
     * title, URL - required
     * description, category - optional
     */
    if (isset($_POST['title'])) {
        if (empty($_POST['title'])) {
            $errors[] = "Title field cannot be empty";
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
    }

    if (empty($errors))
    {
        $db = new Database();
        $new_bm = new Bookmark($db);

        if ($new_bm->updateBookmark($bookmark['id'], $title, $url, $description, $category))
        {
            redirect('bookmarks.php');
        } else {
            $errors[] = "Could not update record! Try again or report the issue!";
        }
    } else {
        show_errors($errors);
    }
}
include 'templates/t_bookmark.php';


include 'templates/footer.php';