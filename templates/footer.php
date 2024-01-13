<?php
$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/', $uri);

$base_url = "http://" . $_SERVER['HTTP_HOST'];
foreach($uri as $element){
    if($element != end($uri))
    $base_url .= $element . "/";
}

?>
</main>
<footer>
    <!-- Copyright -->
    <div class="text-center">
        © 2023 Copyright
        <a class="text-light text-decoration-none mx-2 shiny-item" id="footer-logo" href="<?=$base_url?>"><i class="fa-solid fa-book-bookmark"></i> Bookmarks&trade;Ltd</a>
    </div>
    <!-- Copyright -->
</footer>
