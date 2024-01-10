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
	<title>Bookmarks</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/styles/nav.css">
	<link rel="stylesheet" href="assets/styles/main.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/6f78ace1ca.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<div class="my-container">
			<nav class="menu">
				<button class="menu-toggler" aria-control="primary-navigation" aria-expanded="false" aria-label="Toggle navigation">
					<span class="hamburger"></span>
				</button>
				<a class="menu__logo" href="index.php"><i class="fa-solid fa-book-bookmark"></i> Bookmarks&trade;Ltd</a>
				<ul class="menu__list" id="primary-navigation">
				<?php
				if(logged_in()){?>
					<li class="menu__item">
						<a class="menu__link shiny-item" href="home.php">Home</a>
					</li>

					<!--Categories item to Categories dropdown menu-->

					<li class="menu__item"> <!--Changed in li from div-->
                        <a class="dropdown_btn cat_dropdown_btn menu__link shiny-item" data-bs-toggle="dropdown" aria-expanded="false">
							Categories <i class="fa-solid fa-caret-down"></i>
						</a>
						<ul class="dropdown_menu cat_dropdown_menu" id="dropDownMenu">
                            <?php foreach($cats as $cat):?>
                            <li class="menu__item">
                                <a class="menu__link shiny-item" href="bookmarks.php?category=<?=$cat['id']?>">
                                    <?=$cat['name'];?>
                                </a>
                            </li>
                            <?php endforeach;?>
                            <hr class="dropdown-divider">
                            <li class="menu__item">
                                <a class="menu__link shiny-item" href="bookmarks.php">Reset Categories
                                </a>
                            </li>
						</ul>
					</li>

					<li class="menu__item">
						<a class="menu__link shiny-item" href="favorites.php">Favorites</a>
					</li>
				<?php } ?>
					<li class="menu__item help" data-bs-toggle="modal" data-bs-target="#aboutUsModal">
						<a class="menu__link shiny-item" href="#"> Help </a>
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
						<a class="dropdown_btn acc_dropdown_btn menu__link shiny-item framed-item framed-item--dif account" data-toggle="dropdown">
							<i class="fa-solid fa-user"> </i>  
							<?php echo($_SESSION['first_name'] . ' ' .$_SESSION['last_name']); ?>
							<i class="fa-solid fa-caret-down"></i>
						</a>
						<ul class="dropdown_menu acc_dropdown_menu" id="account_dropdown">
							<li class="menu__item">
								<a class="menu__link shiny-item" href="bookmarks.php">
									<i class="fa-solid fa-book-bookmark"></i>
									My Bookmarks
								</a>
							</li>
							<li class="menu__item">
								<a class="menu__link shiny-item" href="favourites.php">
									<i class="fa-regular fa-bookmark"></i>
									Favourites
								</a>
							</li>
							<li class="menu__item">
								<a class="menu__link shiny-item" href="profile.php">
									<i class="fa-solid fa-pen"></i>
									Edit Profile
								</a>
							</li>
							<li class="menu__item">
								<a class="menu__link shiny-item" href="password_reset.php">
									<i class="fa-solid fa-key"></i>
									Reset Password
								</a>
							</li>
							<li class="menu__item">
								<a class="menu__link shiny-item" href="logout.php">
									<span><i class="fa-solid fa-arrow-right-from-bracket"> </i> Logout</span>
								</a>
							</li>
						</ul>
					</li>
				<?php } 
				else { ?>
					<li class="menu__item menu__item--right sign-in">
						<a class="menu__link framed-item shiny-item" href="login.php"> Sign In </a>
					</li>
					<li class="menu__item register">
						<a class="menu__link framed-item shiny-item" href="register.php">Register</a>
					</li>
				<?php } ?>
				</ul>
				

				<div class="modal fade" id="aboutUsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="exampleModalLabel">About Us</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<h3>What is "<i class="fa-solid fa-book-bookmark"></i> Bookmarks&trade; Limited"?</h3>
								<p>"<i class="fa-solid fa-book-bookmark"></i> Bookmarks&trade; Limited"" is an online solution to bookmark your favorit URLs and have access to them from anywhere, without being locked down to one browser.</p>
								<h3>Who should use "<i class="fa-solid fa-book-bookmark"></i> Bookmarks&trade; Limited"?</h3>
								<p>This prodcut is for every person that needs to have a URLs collection, but does not want to use a single browser for the rest of his/hers/their/its days.</p>
								<h3>How do I use this product?</h3>
								<p>Using "<i class="fa-solid fa-book-bookmark"></i> Bookmarks&trade; Limited" is really easy.</p>
								<p>Firs, you need to register your account <a class="text-decoration-none text-primary" href="register.php">here</a></p>
								<p>As a registered user, you can add/update/delete your URLs, have them grouped in categories defined by you and even configure favorites.</p>
								<h3>How can I contact you?</h3>
								<p>Fastest way to get in touch with us is to send us an <a class="text-decoration-none text-primary" href="mailto:example@email.com:">email</a></p>
								<p>If you experience service dissruptions, you can raise a ticket <a class="text-decoration-none text-primary" href="https://github.com"><i class="fa fa-github"></i> here</a> explaining the issue in great details.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
<main>