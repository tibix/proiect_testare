<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Bookmark.php';

include 'templates/header.php';

if(!logged_in()) {
    redirect('index.php');
}

if(isset($_GET['id']))
{
    if (!empty($_GET['id']))
    {
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

        if (isset($_POST['save'])) {
            prety_dump($_POST);
            $errors = array();

            /**
             * check if all required fields have values
             * title, URL - required
             * description, category - optional
             */
            if (isset($_POST['title'])) {
                if (!empty($_POST['title'])) {
                    $errors[] = "Title field cannot be empty";
                } else {
                    $title = $_POST['title'];
                }
            } else {
                $errors[] = "Title field is required!";
            }

            if (isset($_POST['url'])) {
                if (!empty($_POST['url'])) {
                    $errors[] = "URL field cannot be empty";
                } else {
                    $url = $_POST['url'];
                }
            } else {
                $errors[] = "URL field is required!";
            }

            if (isset($_POST['description'])) {
                if (!empty($_POST['url'])) {
                    $description = $_POST['description'];
                }
            } else {
                $description = "";
            }

            if (isset($_POST['category'])) {
                if (!empty($_POST['category'])) {
                    $category = $_POST['category'];
                }
            } else {
                $category = 1;
            }

            if (empty($errors))
            {
                $db = new Database();
                $new_bm = new Bookmark($db);

                if ($new_bm->updateBookmark($title, $url, $description, NOW, $_SESSION['user_id'], $category))
                {
                    echo '<div class="alert alert-success alert-dismissible fade show text-secondary" role="alert">';
                    echo '<p>Bookmark was updated successfully!</p>';
                    echo '</div>';
                    sleep(5);
                    redirect('home.php');
                }
            } else {
                show_errors($errors);
            }

        }
        include 'templates/t_bookmark.php';
    } else {
        $errors = ['Invalid bookmark ID!'];
        show_errors($errors);
        die();
    }
} else {
    redirect('home.php');
}

include 'templates/footer.php';