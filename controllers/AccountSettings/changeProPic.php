<?php

// require_once('../../repository/files.php');
require_once('../../repository/AuthRepo.php');
require_once('../../repository/UserRepo.php');

$userId = getLoggedInUserId();

$des = "../../assets/user/" . $userId . '-' . $_FILES['proPic']['name'];
$src = $_FILES['proPic']['tmp_name'];

if (move_uploaded_file($src, $des)) {
    $status = setProPic($des);
    if ($status) {
        header('location: ../../views/dashboard');
        return;
    }
    echo 'Not Authenticatedd';
    return;
} else {
    echo "Error Changing Profile Picture";
}
