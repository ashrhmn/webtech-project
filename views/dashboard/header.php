<?php

require_once('../../repository/AuthRepo.php');

$user = getLoggedInUser();

if (!$user) {
    setcookie('token', null, -1, '/');
    header('location: ../login.php');
    return;
}
