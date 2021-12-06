<?php

require_once('../repository/AuthRepo.php');

if (isUserLoggedIn()) {
    header('location: dashboard');
    return;
}

include('home.php');