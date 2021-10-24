<?php
include("nav.php");

require_once('../Repo/UserRepo.php');

if (isUserLoggedIn()) {
    header('location: dashboard.php');
    return;
}

header('location: home.php');
