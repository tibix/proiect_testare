<div class="container mt-4">
    <div class="jumbotron">
        <h1 class="display-4"><?php echo _("Wellcome to"); ?> <span class="text-secondary"><i class="fa-solid fa-book-bookmark"></i> <?php echo _("Bookmarks&trade;Limited"); ?></span></h1>
        <p class="lead"><?php echo _("It looks like you are not signed in. To take full advantage of our application, you can either ..."); ?></p>
        <div class=row>
            <div class="col-sm-6">
                <a class="btn btn-outline-primary btn-lg my-3" href="login.php" role="button"><?php echo _("Sign in"); ?></a>
                <p class="lead"><?php echo _("if you are already registered, or ..."); ?></p>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-outline-primary btn-lg my-3" href="register.php" role="button"><?php echo _("Register"); ?></a>
                <p class="lead"><?php echo _("if you don't have an account with us!"); ?></p>
            </div>
        </div>
    </div>
</div>
<!-- Marketing messaging and featurettes
    ================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
<div class="container marketing">
    <!-- START THE FEATURETTES -->
    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading"><?php echo _("Have all your bookmarks ready"); ?> <span class="text-muted"><b><?php echo _("EVERYWHERE"); ?></b></span></h2>
            <p class="lead"><?php echo _("Never be tied to a specific browser and enjoy your favourite URLs from everywhere."); ?></p>
        </div>
        <div class="col-md-5">
            <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title><?php echo _("Placeholder"); ?></title>
                <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em"><?php echo _("500x500"); ?></text>
            </svg>
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading"><?php echo _("It's open source"); ?> <span class="text-muted"><?php echo _("See for yourself."); ?></span></h2>
            <p class="lead"><?php echo _("So you can see how it works underneath the hood. You can also contribute if you feel like getting your hands dirty with some code"); ?></p>
            <p><?php echo _(" ... checkout our"); ?> <a href="https://github.com/" class="text-dark"><i class="fa-brands fa-github"></i><?php echo _(" GitHub page"); ?></a></p>
        </div>
        <div class="col-md-5 order-md-1">
            <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title><?php echo _("Placeholder"); ?></title>
                <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em"><?php echo _("500x500"); ?></text>
            </svg>
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading"><?php echo _("And lastly, it's free."); ?> <span class="text-muted"><?php echo _("Checkmate."); ?></span></h2>
            <p class="lead"><?php echo _("This application is and will always be free. No need for monthly/annual subscription ... just enjoy it and share it with your peers"); ?></p>
        </div>
        <div class="col-md-5">
            <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title><?php echo _("Placeholder"); ?></title>
                <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em"><?php echo _("500x500"); ?></text>
            </svg>
        </div>
    </div>

    <hr class="featurette-divider">
    <!-- /END THE FEATURETTES -->
</div><!-- /.container -->
