<?php
	include(dirname(__DIR__).'/core/utils.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Bookmarks</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/styles.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/6f78ace1ca.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
			<div class="container-fluid">
				<button class="navbar-toggler bg-light"
						type="button"
						data-bs-toggle="collapse"
						data-bs-target="#navbarTogglerDemo01"
						aria-controls="navbarTogglerDemo01"
						aria-expanded="false"
						aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
					<a class="navbar-brand text-light" href="index.php"><i class="fa-solid fa-book-bookmark"></i> Bookmarks&trade;Limited</a>
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					    <?php
						if(logged_in()){?>
							<li class="nav-item">
								<a class="nav-link text-light" href="home.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-light" href="categories.php">Categories</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-light" href="favourites.php">Favourites</a>
							</li>
					    <?php } ?>
					    <li class="nav-item" data-bs-toggle="modal" data-bs-target="#aboutUsModal">
							<a class="nav-link text-light" href="#">
								<i class="fa-solid fa-question"></i> Help
							</a>
						</li>
					</ul>
					<?php
						if(logged_in()){ ?>
                        <ul class="navbar-nav my-2">
                            <li class="nav-item mx-3">
                                <form class="d-flex d-inline" action="search.php" method="GET">
                                    <input class="form-control me-2 w-100" type="search" name="search" placeholder="Search..." aria-label="Search">
                                    <button class="btn btn-outline-light" type="submit">Search</button>
                                </form>
                            </li>
                        </ul>
						<div class="btn-group">
							<button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fa-solid fa-user"> </i>  <?php echo($_SESSION['first_name'] . ' ' .$_SESSION['last_name']); ?>
							</button>
							<ul class="dropdown-menu dropdown-menu-end" id="dropDownMenu">
								<li>
									<a class="dropdown-item" href="bookmarks.php">
										<i class="fa-solid fa-book-bookmark"></i>
										My Bookmarks
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="favourites.php">
										<i class="fa-regular fa-bookmark"></i>
										Favourites
									</a>
								</li>
								<li><hr class="dropdown-divider"></li>
								<li>
									<a class="dropdown-item" href="profile.php">
										<i class="fa-solid fa-pen"></i>
										Edit Profile
									</a>
								</li>
								<li>
									<a class="dropdown-item" href="password_reset.php">
										<i class="fa-solid fa-key"></i>
										Reset Password
									</a>
								</li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="logout.php"><span><i class="fa-solid fa-arrow-right-from-bracket"> </i> Logout</span></a></li>
							</ul>
						</div>
						<?php } else { ?>
						<a class="text-decoration-none text-white" href="login.php">
							<button class="btn btn-outline-light outline-light mx-2" type="submit">Sign In</button>
						</a>
						<a class="text-decoration-none text-white" href="register.php">
							<button class="btn btn-outline-light outline-light mx-2" type="submit">Register</button>
						</a>
					<?php } ?>
				</div>
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
								<p>As a registered user, you can add/update/delete your URLs, have them grouped in categories defined by you and even configure favourites.</p>
								<h3>How can I contact you?</h3>
								<p>Fastest way to get in touch with us is to send us an <a class="text-decoration-none text-primary" href="mailto:example@email.com:">email</a></p>
								<p>If you experience service dissruptions, you can raise a ticket <a class="text-decoration-none text-primary" href="github.com"><i class="fa fa-github"></i> here</a> explaining the issue in great details.</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
