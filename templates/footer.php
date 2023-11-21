<?php
$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/', $uri);

$base_url = "http://" . $_SERVER['HTTP_HOST'];
foreach($uri as $element){
    if($element != end($uri))
    $base_url .= $element . "/";
}

?>
<footer class="bg-primary text-center text-lg-start text-light">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright
        <a class="text-light mx-2" id="logo" href="<?=$base_url?>"><i class="fa-solid fa-book-bookmark"></i> Bookmarks&trade;Limited</a>
    </div>
    <!-- Copyright -->
</footer>