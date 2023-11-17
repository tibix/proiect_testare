<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/User.php';

include 'templates/header.php';

prety_dump($_SESSION);

include 'templates/footer.php';