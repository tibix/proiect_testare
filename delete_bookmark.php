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

if(empty($_GET['id']))
{
    redirect('bookmarks.php');
}

$errors = array();
$db = new Database();
$bm = new Bookmark($db);

$bookmark = $bm->getBookmarkById($_GET['id']);

if(!$bookmark){
    $errors[] = "Invalid or non-existent bookmark";
} else if($bookmark['owner_id'] != $_SESSION['user_id']){
    $errors[] = "You are not allowed to manage this bookmark.";
}

if(empty($errors))
{
    $delete = $bm->deleteBookmark($_GET['id']);
    if($delete) {
        echo '<div class="alert alert-success alert-dismissible fade show text-secondary" role="alert">';
        echo '<p>Bookmark was deleted successfully!</p>';
        echo '<p>Go <a href="bookmarks.php" class="text-dark">back</a> to your bookmarks page</p>';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    } else {
        $errors[] = "There was an error removing the bookmark. Try again later!";
        show_errors($errors);
    }
} else {
    show_errors($errors);
    echo '<div class="alert alert-warning alert-dismissible fade show text-secondary" role="alert">';
    echo '<p>Please check the above errors!</p>';
    echo '<p>Go <a href="bookmarks.php" class="text-dark">back</a> to your bookmarks page</p>';
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

include 'templates/footer.php';


