<?php

require_once('../../repository/AuthRepo.php');

$user = getLoggedInUser();

if($user['role']!='Admin'){
    echo 'Not elevated';
    return;
}