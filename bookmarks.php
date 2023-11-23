<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Bookmark.php';

include 'templates/header.php';

if(!logged_in())
{
    redirect('login.php');
}

$db = new Database();
$bm = new Bookmark($db);

$count = $bm->getBookmarksCountByUserId($_SESSION['user_id']);
$limit = 10;

$total_pages = ceil($count / $limit);

if((isset($_GET['page']) && (!empty($_GET['page']) && (int)$_GET['page'] != 1))){
    $page = (int)$_GET['page'];
    if($page > $total_pages){
        redirect('bookmarks.php?page=1');
    }
} else {
    $page = 1;
}

$offset = ($page-1)*$limit;

$bookmarks = $bm->getBookmarksByUserId($_SESSION['user_id'], $limit, $offset);

?>
<div class="d-flex justify-content-center">
    <a href="new_bookmark.php" class="btn btn-outline-primary mx-4">Add New Bookmark</a>
    <a href="new_category.php" class="btn btn-outline-primary">Add New Category</a>
</div>

<?php
if($count > 1)
{
?>
<section class="intro mx-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-borderless mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">URL</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Date Modified</th>
                                <th scope="col">In category</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($bookmarks as $bookmark)
                                {?>
                                <tr>
                                    <td><?=$bookmark['title'];?></td>
                                    <td><?=$bookmark['URL'];?></td>
                                    <td><?=$bookmark['description'];?></td>
                                    <td><?=$bookmark['date_created'];?></td>
                                    <td><?=$bookmark['date_modified'];?></td>
                                    <td><?=$bookmark['category_id'];?></td>
                                    <td>
                                        <a class="btn btn-outline-primary" href="edit_bookmark.php?id=<?=$bookmark['id'];?>"><i class="fa fa-solid fa-pen"></i> Edit</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-danger" href="delete_bookmark.php?id=<?=$bookmark['id'];?>"><i class="fa fa-solid fa-trash"></i> Delete</a>
                                    </td>

                                </tr>
                                <?php }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
            echo '<li class="page-item '.$prev_disabled.'"><a class="page-link" href="bookmarks.php?page=1">&laquo;</a></li>';
            echo '<li class="page-item '.$prev_disabled.'"><a class="page-link" href="bookmarks.php?page='. ($page-1). '">Previous</a></li>';
            for($i=1; $i <= $total_pages; $i++)
            {
                if($page == $i) {
                    echo '<li class="page-item active" aria-current="page"><span class="page-link primary" >'. $i .'</span></li>';
                } else {
                    $class = "page-item";
                    $aria = "";
                    echo '<li '.$class . $aria .'><a class="page-link" href="bookmarks.php?page='.$i.'">'. $i .'</a></li>';
                }
            }
            echo '<li class="page-item '.$next_disabled.'"><a class="page-link " href="bookmarks.php?page='.($page+1).'">Next</a></li>';
            echo '<li class="page-item '.$next_disabled.'"><a class="page-link" href="bookmarks.php?page='.$total_pages.'">&raquo;</a></li>';
        ?>
    </ul>
</nav>
<?php }
include 'templates/footer.php';

