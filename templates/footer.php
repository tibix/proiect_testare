<<<<<<< HEAD
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
<footer class="text-center text-lg-start">
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright
        <a class="text-light text-decoration-none mx-2 shiny-item" id="logo" href="<?=$base_url?>"><i class="fa-solid fa-book-bookmark"></i> Bookmarks&trade;Ltd</a>
    </div>
    <!-- Copyright -->
</footer>
<script src="assets/js/main.js"></script>
=======
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
        <a class="text-light text-decoration-none mx-2 shiny-item" id="footer-logo" href="git-pulse.html" target="blank"><i class="fa-brands fa-github"></i> Git-Pulse Stats</a>
    </div>
    <!-- Copyright -->
</footer>
>>>>>>> cf24b5a644ba6b56fa56bdda014f5cee21b3e0b2
