<?php

require_once(__DIR__.'/../../../../repository/AuthRepo.php');

$user = getLoggedInUser();

if($user['role']!='Admin'){
    echo 'Not elevated';
    return;
}

echo '<br>Route secured for admin<br>';