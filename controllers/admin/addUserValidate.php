<?php

require_once('../../repository/AuthRepo.php');

// print_r(file_get_contents('php://input'));
$data = json_decode(file_get_contents('php://input'));
// print_r($data->username);
// return;


$username = $data->username;
$email = $data->email;


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