<?php

session_start();

require_once 'classes/Database.php';
require_once 'classes/Category.php';

include 'templates/header.php';

if(logged_in())
{
    redirect("home.php");
}
include 'templates/t_index.php';

include 'templates/footer.php';