<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Bookmark.php';

include 'templates/header.php';
$form_title = "New";
include 'templates/t_bookmark.php';


include 'templates/footer.php';