<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/User.php';
require_once 'classes/Bookmark.php';

include 'templates/header.php';

if(!logged_in()){
    header('Location: login.php');
}

$db = new Database();
$bookmark = new Bookmark($db);

$bookmarks = $bookmark->getBookmarksByUserId($_SESSION['user_id']);
?>
<div class="d-flex justify-content-center">
    <a href="new_bookmark.php" class="btn btn-outline-primary mx-4">Add New Bookmark</a>
    <a href="new_category.php" class="btn btn-outline-primary">Add New Category</a>
</div>
<?php
if(count($bookmarks) > 1){
    echo '<div class="row mx-3 my-3">';
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
                </div>
            </div>
        </div>
<?php
    }
}
echo '</div>';
include 'templates/footer.php';