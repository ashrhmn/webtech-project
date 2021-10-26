<?php
// include("nav.php");

require_once('../repository/AuthRepo.php');

if (isUserLoggedIn()) {
    header('location: dashboard.php');
    return;
}

include('home.php');