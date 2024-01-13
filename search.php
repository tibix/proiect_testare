<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Bookmark.php';
require_once 'classes/Category.php';
require_once 'classes/Favorite.php';

include 'templates/header.php';

if(!logged_in())
{
    redirect('login.php');
}

if(isset($_GET))
{
    if(!empty($_GET['query']))
    {
        $query = $_GET['query'];
        $db = new Database();
        $bm = new Bookmark($db);
        $fav = new Favorite($db);
        $results = $bm->searchBookmarks($_SESSION['user_id'], $query);
        if($results) {
            $result_count = count($results);
            echo "<div class='container'>";
            echo "<div class='col-lg-12 mb-4'>";
            echo "<div class='card'>";
            echo "<div class='card-header bg-success text-light text-center fs-5 text-opacity-75 fw-bold'>";
            echo "We found <b>$result_count</b> result(s) for <b>$query</b>";
            echo "</div>";
            echo '<div class="card-body h-100">';
            echo '<ul class="list-group">';
            foreach($results as $result){
                echo '
                        <a href="'.$result["URL"].'" target="_blank" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                              <h5 class="mb-1">'.$result["title"].'</h5>';
                if ($fav->isFavorite($result['id'])) {
                    echo '<small class="text-danger"><i class="fa-solid fa-heart"></i></small>';
                } else {
                    echo '<small class="text-muted text-danger"><i class="fa-regular fa-heart"></i></small>';
                }
                echo '
                        </div>
                            <p class="mb-1">'.$result["description"].'</p>
                            <small class="text-muted">Added: '.$result['date_created'].'</small>
                          </a>
                ';
            }
            echo '</ul>';
            echo"</div></div></div>";
        } else {
            show_errors(["We found 0 result(s) for <b>$query</b>", "Click <a href='home.php' class='text-dark text-decoration-underline fw-bold'>here</a> to go back"]);
        }
    }
}

include 'templates/footer.php';