<?php

require_once('../../repository/AuthRepo.php');

$username = $_POST['username'];
$email = $_POST['email'];


if ($username == "") {
    $usernameMsg = "Username is required";
} else {
    if (isUsernameAvailable($username)) {
        $usernameMsg = "";
    } else {
        $usernameMsg = "Username is unvailable";
    }
}


if ($email == "") {
    $emailMsg = "Email is required";
} else {
    if (isEmailAvailable($email)) {
        $emailMsg = "";
    } else {
        $emailMsg = "Email is unvailable";
    }
}

$response = array(
    'usernameMsg' => $usernameMsg,
    'emailMsg' => $emailMsg
);


$json = json_encode($response);

echo $json;