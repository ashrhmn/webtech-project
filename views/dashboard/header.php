<?php

// require_once(realpath(dirname(__FILE__).'/../../repository/AuthRepo.php'));
require_once('../../repository/AuthRepo.php');
// require_once('/var/www/html/views/repository/AuthRepo.php');
// include(ROOT.'/repository/AuthRepo.php');

$user = getLoggedInUser();

if (!$user) {
    setcookie('token', null, -1, '/');
    header('location: ../login.php');
    return;
}