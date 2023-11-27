<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Favorite.php';
require_once 'classes/Category.php';
require_once 'classes/User.php';

include 'templates/header.php';

include 'templates/t_profile.php';

include 'templates/footer.php';
