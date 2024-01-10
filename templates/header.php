<?php
	include(dirname(__DIR__).'/core/utils.php');
    $db = new Database();
    $categ = new Category($db);
    $cats = $categ->getAllCategories();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo _("Bookmarks"); ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-GLhlTQ8iK1uL10a+pf/W2ZlOiHRNmz9L6ZNqd5S9Cf0MvH8e1lIo7Ips973meTl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/styles/nav.css">
	<link rel="stylesheet" href="assets/styles/main.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/6f78ace1ca.js" crossorigin="anonymous"></script>
	
	<style>
    .modal-content {
        color: #454545; /* Change to your desired color */
    }
</style>
	
</head>
<div class="overlay"></div>

<body>
	<header>
		<div class="my-container">
			<nav class="menu">
				<button class="menu-toggler" aria-control="primary-navigation" aria-expanded="false" aria-label="Toggle navigation">
					<span class="hamburger"></span>
				</button>
				<a class="menu__logo" href="index.php"><i class="fa-solid fa-book-bookmark"></i><?php echo _("Bookmarks"); ?></a>
				<ul class="menu__list" id="primary-navigation">
					<!--Language Selector -->
        <form class="d-flex align-items-center ms-auto me-2" method="post" action="language_switch.php">
    <select class="form-select me-2" name="selected_language">
        <option value="en_US"><?php echo _("English"); ?></option>
        <option value="fr_FR"><?php echo _("French"); ?></option>
        <option value="hu_HU"><?php echo _("Hungarian"); ?></option>
		<option value="ro_RO"><?php echo _("Romanian"); ?></option>
    </select>
	<li class="menu__item switch-language">
		<button class="menu__btn framed-item shiny-item" type="submit" style="white-space: nowrap;"><?php echo _("Switch Language"); ?></button>
	</li>
</form>
<?php
				if(logged_in()){?>
					<li class="menu__item">
						<a class="menu__link shiny-item" href="home.php"><?php echo _("Home"); ?></a>
					</li>

					<!--Categories item to Categories dropdown menu-->

					<li class="menu__item"> <!--Changed in li from div-->
						<a class="dropdown-toggle menu__link shiny-item" data-bs-toggle="dropdown" aria-expanded="false">
							<?php echo _("Categories"); ?>
						</a>
						<ul class="dropdown-menu" id="dropDownMenu">
                            <?php foreach($cats as $cat):?>
                                <li>
                                    <a class="dropdown-item new-category" href="bookmarks.php?category=<?=$cat['id']?>"><?=$cat['name'];?>
                                    </a>
                                </li>
                            <?php endforeach;?>
                            <hr class="dropdown-divider">
                            <li>
                                <a class="dropdown-item new-category bg-danger text-light" href="bookmarks.php"><?php echo _("Reset Categories"); ?></a>
                            </li>
						</ul>
					</li>
					<li class="menu__item">
						<a class="menu__link shiny-item" href="favorites.php"><?php echo _("Favorites"); ?></a>
					</li>
				<?php } ?>
					<li class="menu__item help" data-bs-toggle="modal" data-bs-target="#aboutUsModal">
						<a class="menu__link shiny-item" href="#"><?php echo _("About Us"); ?></a>
					</li>
				<?php
				if(logged_in()){ ?>
					<li class="menu__item menu__item--form menu__item--centered">
						<form class="menu__search" action="search.php" method="GET">
							<input class="form-control" type="search" name="query" placeholder="Search..." aria-label="Search">
                            <button class="menu__link framed-item framed-item--dif shiny-item btn" type="submit"><i class="fa fa-search"></i></button>
						</form>
					</li>
					
					<!-- <div class="btn-group"> -->
					<li class="menu__item">
						<a class="menu__link framed-item framed-item--dif shiny-item dropdown-toggle account" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="fa-solid fa-user"> </i>  <?php echo($_SESSION['first_name'] . ' ' .$_SESSION['last_name']); ?>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" id="dropDownMenu">
							<li>
								<a class="dropdown-item" href="bookmarks.php">
									<i class="fa-solid fa-book-bookmark"></i>
									<?php echo _("My Bookmarks"); ?></a>
							</li>
							<li>
								<a class="dropdown-item" href="favorites.php">
									<i class="fa-regular fa-bookmark"></i>
									<?php echo _("Favorites"); ?></a>
							</li>
							<li><hr class="dropdown-divider"></li>
							<li>
								<a class="dropdown-item" href="profile.php">
									<i class="fa-solid fa-pen"></i>
									<?php echo _("Edit Profile"); ?></a>
							</li>
							<li>
								<a class="dropdown-item" href="password_reset.php">
									<i class="fa-solid fa-key"></i>
									<?php echo _("Reset Password"); ?></a>
							</li>
							<li><hr class="dropdown-divider"></li>
							<li>
								<a class="dropdown-item" href="logout.php">
									<span><i class="fa-solid fa-arrow-right-from-bracket"> </i><?php echo _("Logout"); ?></span>
								</a>
							</li>
						</ul>
					</li>
				<?php } 
				else { ?>
					<li class="menu__item menu__item--right sign-in">
						<a class="menu__link framed-item shiny-item" href="login.php"><?php echo _("Sign In"); ?></a>
					</li>
					<li class="menu__item register">
						<a class="menu__link framed-item shiny-item" href="register.php"><?php echo _("Register"); ?></a>
					</li>
				<?php } ?>
				</ul>
				
				<div class="modal fade" id="aboutUsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo _("About Us"); ?></h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label= <?php echo _("Close"); ?> ></button>
							</div>
							<div class="modal-body">
								<h3><?php echo _("What is "); ?><i class="fa-solid fa-book-bookmark"></i><?php echo _("Bookmarks&trade; Limited"); ?></h3>
								<p><i class="fa-solid fa-book-bookmark"></i><?php echo _("Bookmarks&trade; Limited is an online solution to bookmark your favorit URLs and have access to them from anywhere, without being locked down to one browser."); ?></p>
								<h3><?php echo _("Who should use "); ?><i class="fa-solid fa-book-bookmark"></i><?php echo _("\" Bookmarks&trade; Limited\"?"); ?></h3>
								<p><?php echo _("This product is for every person that needs to have a URLs collection, but does not want to use a single browser for the rest of his/hers/their/its days."); ?></p>
								<h3><?php echo _("How do I use this product?"); ?></h3>
								<p><?php echo _("Using "); ?><i class="fa-solid fa-book-bookmark"></i><?php echo _(" Bookmarks&trade; Limited is really easy."); ?></p>
								<p><?php echo _("First, you need to register your account "); ?><a class="text-decoration-none text-primary" href="register.php"><?php echo _("here"); ?></a></p>
								<p><?php echo _("As a registered user, you can add/update/delete your URLs, have them grouped in categories defined by you and even configure favorites."); ?></p>
								<h3><?php echo _("How can I contact you?"); ?></h3>
								<p><?php echo _("Fastest way to get in touch with us is to send us an "); ?><a class="text-decoration-none text-primary" href="mailto:example@email.com:"><?php echo _("email"); ?></a></p>
								<p><?php echo _("If you experience service dissruptions, you can raise a ticket "); ?><a class="text-decoration-none text-primary" href="https://github.com"><i class="fa fa-github"></i><?php echo _(" here"); ?></a><?php echo _(" explaining the issue in great details."); ?></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo _("Close"); ?></button>
							</div>
							<script>
								document.getElementById('aboutUsModal').addEventListener('show.bs.modal', function () {
									document.body.classList.add('modal-open');
								});

								document.getElementById('aboutUsModal').addEventListener('hidden.bs.modal', function () {
									document.body.classList.remove('modal-open');
								});
							</script>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
<main>