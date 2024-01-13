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

    if (empty($errors)) {
        // Redirect based on the action
        if (!empty($_GET['action']) && $_GET['action'] === 'add') {
            redirect('home.php');
        } elseif (!empty($_GET['action']) && $_GET['action'] === 'remove') {
            redirect('favorites.php');
        } else {
            redirect('home.php');
        }
    } else {
        show_errors($errors);
    }
} else {

    $db = new Database;
    $bm = new Bookmark($db);
    $fav = new Favorite($db);

    $user_favs = $fav->getAllFavorites($_SESSION['user_id']);
	if (empty($user_favs)) {
        echo '<div id="countdown-message" class="alert alert-info alert-dismissible fade show text-center" role="alert">';
        echo '<p>' . _("You have no favorites. Add some ") . '<a href="home.php">' . _("here") . '</a>' . _(" - Page will be redirected in") . ' <span id="countdown">5</span> ' . _("seconds.") . '</p>';
        echo '</div>';
        echo '<script>
            var seconds = 5;
            function updateCountdown() {
                document.getElementById("countdown").innerText = seconds;
                seconds--;
                if (seconds < 0) {
                    window.location.href = "home.php";
                } else {
                    setTimeout(updateCountdown, 1000);
                }
            }
            updateCountdown(); // Call the function to start the countdown immediately
        </script>';
        }
        
        echo '</div>';
        echo '<script>';
        echo 'setTimeout(function() {';
        echo '   window.location.href = "home.php";';
        echo '}, 5000);'; // Introduce a 5-second delay
        echo '</script>';
    }
    echo '<div class="row m-3">';
    if($user_favs){
        foreach($user_favs as $u_fav)
        {?>
            <div class="col-sm-3">
                <div class="card text-center mb-4">
                    <div class="card-header">
                        <?=$u_fav['title']?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?=$u_fav['title']?></h5>
                        <p class="card-text"><?=$u_fav['description']?></p>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="<?=$u_fav['URL']?>" target="_blank" class="btn btn-outline-primary my-2">Go to Page</a>
                        <script>
                            function copyToClipboard(text) {
                                navigator.clipboard.writeText(text).then(function() {
                                    alert(<?php echo json_encode(_("Copied to clipboard: ")); ?> + text);
                                }).catch(function(err) {
                                    console.error(<?php echo json_encode("Unable to copy to clipboard"); ?>, err);
                                });
                            }
                        </script>
                        <button class="btn btn-outline-dark" onclick="copyToClipboard('<?=$u_fav['URL']?>')"><?php echo _("Copy to Clipboard"); ?></button>
                        <a class="btn btn-outline-danger" href="favorites.php?id=<?=$u_fav['bookmark_id']?>&action=remove"><i class="fa-solid fa-heart"></i></a>
                    </div>
                </div>
            </div>
            <?php
        }
    } 

include 'templates/footer.php';