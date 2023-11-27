<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Bookmark.php';
require_once 'classes/Favorite.php';
require_once 'classes/Category.php';
require_once 'classes/User.php';

include 'templates/header.php';

if(!logged_in())
{
    redirect('login.php');
}


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
        if(!empty($_GET['action']))
        {
            if ($_GET['action'] === 'add')
            {
                if($fav->isFavorite($bmi))
                {
                    $errors[] = 'This bookmark is already added to favorites!';
                } else {
                    $new_fav = $fav->addToFavorites($_SESSION['user_id'], $id);
                    if (!$new_fav) {
                        $errors[] = 'Error adding bookmark to favorites: ' . $new_fav;
                    }
                }
            }

            if ($_GET['action'] === 'remove')
            {
                if($fav->isFavorite($bmi))
                {
                    $new_fav = $fav->removeFromFavorites($_SESSION['user_id'], $id);
                    if (!$new_fav) {
                        $errors[] = 'Error removing bookmark from favorites: ' . $new_fav;
                    }
                } else {
                    $errors[] = 'This bookmark is not part of favorites!';
                }
            }

        }
    } else {
        $bmi = null;
        $errors[] = "This bookmarks does not exists!";
    }

    if(empty($errors))
    {
        redirect('home.php');
    } else {
        show_errors($errors);
    }
} else {
    redirect('home.php');
}
