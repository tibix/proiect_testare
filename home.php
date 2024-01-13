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
$bm = new Bookmark($db);
$fav = new Favorite($db);

$count = $bm->getBookmarksCountByUserId($_SESSION['user_id']);

$limit = 12;

$total_pages = ceil($count / $limit);

if((isset($_GET['page']) && (!empty($_GET['page']) && (int)$_GET['page'] != 1))){
    $page = (int)$_GET['page'];
    if($page > $total_pages){
        redirect('home.php?page=1');
    }
} else {
    $page = 1;
}

$offset = ($page-1)*$limit;
$bookmarks = $bm->getBookmarksByUserId($_SESSION['user_id'], $limit, $offset);

?>
<div class="d-flex justify-content-center p-3">
    <a href="new_bookmark.php" class="btn btn-md btn-green-900">Add New Bookmark <i class="fa-solid fa-plus"></i></a>
</div>
<?php
if(count($bookmarks) > 1){
    echo '<div class="row m-3">';
    foreach($bookmarks as $bookmark)
    {?>
        <div class="col-sm-3">
            <div class="card text-center mb-4">
                <div class="card-header">
                    <?= $bookmark['title'] ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $bookmark['title'] ?></h5>
                    <p class="card-text"><?= $bookmark['description'] ?></p>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?=$bookmark['URL']?>" target="_blank" class="bttn btn_sm btn-green-300">Go to Page</a>
                    <script>
                            function copyToClipboard(text) {
                                navigator.clipboard.writeText(text).then(function() {
                                    alert('<?php echo "Copied to clipboard: ";?>' + text);
                                }).catch(function(err) {
                                    console.error('<?php echo "Unable to copy to clipboard"; ?>', err);
                                });
                            }
                        </script>
                    <button class="bttn btn_sm btn_dark" onclick="copyToClipboard('<?=$bookmark['URL']?>')">Copy to Clipboard</button>
                    <?php if($fav->isFavorite($bookmark['id'])) { ?>
                        <a class="bttn btn_sm btn_accent" href="favorites.php?id=<?=$bookmark['id']?>&action=remove"><i class="fa-solid fa-heart"></i></a>
                    <?php } else { ?>
                        <a class="bttn btn_sm btn_accent" href="favorites.php?id=<?=$bookmark['id']?>&action=add"><i class="fa-regular fa-heart"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php
    }
}
echo '</div>';
if($count > $limit){
?>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
            if($page == 1){
                $prev_disabled = " disabled ";
            } else {
                $prev_disabled = "";
            }

            if($page == $total_pages)
            {
                $next_disabled = " disabled ";
            } else {
                $next_disabled = "";
            }
            echo '<li class="page-item '.$prev_disabled.'"><a class="page-link" href="home.php?page=1">&laquo;</a></li>';
            echo '<li class="page-item '.$prev_disabled.'"><a class="page-link" href="home.php?page='. ($page-1). '">Previous</a></li>';
            for($i=1; $i <= $total_pages; $i++)
            {
                if($page == $i) {
                    echo '<li class="page-item active" aria-current="page"><span class="page-link primary" >'. $i .'</span></li>';
                } else {
                    $class = "page-item";
                    $aria = "";
                    echo '<li '.$class . $aria .'><a class="page-link" href="home.php?page='.$i.'">'. $i .'</a></li>';
                }
            }
            echo '<li class="page-item '.$next_disabled.'"><a class="page-link " href="home.php?page='.($page+1).'">Next</a></li>';
            echo '<li class="page-item '.$next_disabled.'"><a class="page-link" href="home.php?page='.$total_pages.'">&raquo;</a></li>';
        ?>
    </ul>
</nav>
<?php
}
include 'templates/footer.php';