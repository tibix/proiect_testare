<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Bookmark.php';
require_once 'classes/Favorite.php';
require_once 'classes/User.php';

include 'templates/header.php';

if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $db = new Database();
    $user = new User($db);
    $bm = new Bookmark($db);
    $fav = new Favorite($db);

    $errors = array();

    /*
     * Check if already isFavorite
     */

    $bookmark = $bm->getBookmarkById($id);
    if($bookmark)
    {
        $bmi = $id;
    } else {
        $bmi = null;
        $errors[] = "This bookmarks does not exists!";
    }
    if($bmi){
        if($fav->isFavorite($bmi)){
            $errors[] = "This bookmark is already added to favorites";
        }
    }

}