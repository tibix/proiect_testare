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
    $errors[] = _("Invalid or non-existent bookmark");
} else if($bookmark['owner_id'] != $_SESSION['user_id']){
    $errors[] = _("You are not allowed to manage this bookmark.");
}

if(empty($errors))
{
    $delete = $bm->deleteBookmark($_GET['id']);
    if($delete) {
        echo '<div class="alert alert-success alert-dismissible fade show text-secondary" role="alert">';
        echo '<p>' . _("Bookmark was deleted successfully") . '</p>';
        echo '<p>' . _("Go ") . '<a href="bookmarks.php" class="text-dark">back</a>' . _(" to your bookmarks page") . '</p>';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label=' . _("Close") . '></button></div>';
    } else {
        $errors[] = _("There was an error removing the bookmark. Try again later");
        show_errors($errors);
    }
} else {
    show_errors($errors);
    echo '<div class="alert alert-warning alert-dismissible fade show text-secondary" role="alert">';
    echo '<p>' . _("Please check the above errors") . '</p>';
    echo '<p>' . _("Go ") . '<a href="bookmarks.php" class="text-dark">back</a>' . _(" to your bookmarks page") . '</p>';
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label=' . _("Close") . '></button></div>';
}

include 'templates/footer.php';


