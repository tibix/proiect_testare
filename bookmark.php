<?php

include 'templetes/header.php';

require_once 'class/Datebase.php';
require_once 'class/Bookmark.php';

if(!logged_in()) {
    header('Location: index.php');
}

if(isset($_GET['id'])) {
    $errors = array();

    $id = $_GET['id'];
    $bm = new Bookmark();
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
        foreach($errors as $error) {
            echo $error, '<br />';
        }
    } else {
        include 'templates/bookmark.php';
    }

}
