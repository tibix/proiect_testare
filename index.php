<?php

session_start();

include 'templates/header.php';

if(logged_in())
{
    redirect("home.php");
}
include 'templates/t_index.php';

include 'templates/footer.php';