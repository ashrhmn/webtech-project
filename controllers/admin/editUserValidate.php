<?php

require_once('../../repository/AuthRepo.php');

// $username = "ash";
// $email = "nila@nil.com";

$data = json_decode(file_get_contents('php://input'));

$username = $data->username;
$email = $data->email;

// $username = $_POST['username'];
// $email = $_POST['email'];

$user = getLoggedInUser();

// print_r($user);


if ($username == "") {
    $usernameMsg = "Username is required";
} else {
    if (isUsernameAvailable($username) || $username == $user['username']) {
        $usernameMsg = "";
    } else {
        $usernameMsg = "Username is unvailable";
    }
}


if ($email == "") {
    $emailMsg = "Email is required";
} else {
    if (isEmailAvailable($email) || $email == $user['email']) {
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