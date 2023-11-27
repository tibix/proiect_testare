<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/User.php';
require_once 'classes/Bookmark.php';
require_once 'classes/Category.php';
require_once 'classes/Favorite.php';

include 'templates/header.php';

if(!logged_in()){
    header('Location: login.php');
}

$db = new Database();
$bookmark = new Bookmark($db);
$fav = new Favorite($db);

$bookmarks = $bookmark->getBookmarksByUserId($_SESSION['user_id']);
?>
<div class="d-flex justify-content-center p-3">
    <a href="new_bookmark.php" class="btn btn-outline-primary mx-4">Add New Bookmark</a>
</div>
<?php
if(count($bookmarks) > 1){
    echo '<div class="row m-3">';
    foreach($bookmarks as $bm)
    {?>
        <div class="col-sm-3">
            <div class="card text-center mb-4">
                <div class="card-header">
                    <?= $bm['title'] ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $bm['title'] ?></h5>
                    <p class="card-text"><?= $bm['description'] ?></p>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?=$bm['URL']?>" target="_blank" class="btn btn-outline-primary my-2">Go to Page</a>
                    <button class="btn btn-outline-dark">Copy to Clipboard</button>
                    <a class="btn btn-outline-secondary" href="favorites.php?id=<?=$bm['id']?>">
                        <?php
                            if($fav->isFavorite($bm['id']))
                            {
                                echo '<i class="fa-solid fa-heart"></i>';
                            } else {
                                echo '<i class="fa-regular fa-heart"></i>';
                            }
                        ?>
                    </a>
                </div>
            </div>
        </div>
<?php
    }
}
echo '</div>';
include 'templates/footer.php';