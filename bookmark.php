<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Bookmark.php';

include 'templates/header.php';

if(!logged_in()) {
    header('Location: index.php');
}

if(isset($_GET['id'])) {
    $errors = array();

    $id = $_GET['id'];
    $db = new Database();
    $bm = new Bookmark($db);
    $bookmark = $bm->getBookmarkById($id);

    /*
     * Check if the bookmark exists and belongs to the user
     */
    if(!$bookmark) {
        $errors[] = 'Bookmark not found.';
    }

    if($bookmark['owner_id'] != $_SESSION['user_id']) {
        $errors[] = 'You do not have permission to view this bookmark.';
    }

    if(!empty($errors)) {
        show_errors($errors);
    } else {
        include 'templates/t_bookmark.php';
    }

}

include 'templates/footer.php';
die();