<?php

require_once('files.php');

$users_txt = getFsRootDir()."users.txt";


function isUsernameAvailable($username){
    global $users_txt;
    $usersFile = fopen($users_txt,'r');
    while(!feof($usersFile)){
        $data = fgets($usersFile);
        if($data!=""){
            $user = explode('|',$data);
            if(trim($user[1])==$username){
                return false;
            }
        }
    }
    return true;
}

function isEmailAvailable($email){
    global $users_txt;
    $usersFile = fopen($users_txt,'r');
    while(!feof($usersFile)){
        $data = fgets($usersFile);
        if($data!=""){
            $user = explode('|',$data);
            if(trim($user[2])==$email){
                return false;
            }
        }
    }
    return true;
}

function saveUserProfileEdits($user){ //usernameUnavailable=-1, //emailAlreadyExists=0, //userNotFound=-2 saveSuccessfully=1

    // require_once('AuthRepo.php');
    // $username = getLoggedInUsername();
    // echo $username;
    // if($username['username']!=$user['username']){
    //     if(!isUsernameAvailable($user['username'])){
    //         return -1;
    //     }
    // }
    // if(!isEmailAvailable($user['email'])){
    //     return 0;
    // }
    
    global $users_txt;
    // $username = getLoggedInUsername();
    // if (!$username) {
    //     return -1;
    // }
    $dummyUsers = array();
    $usersFile = fopen($users_txt, 'r');
    $isUserFound = false;
    while (!feof($usersFile)) {
        $data = fgets($usersFile);
        if ($data != "") {
            $oldUser = explode('|', $data);
            if (trim($oldUser[1]) == $user['username']) {
                $modedUser = trim($oldUser[0]) . "|" . $user['username'] . "|" . $user['email'] . "|" . $user['name'] . "|" . trim($oldUser[4]) . "|" . $user['address'] . "|" . $user['gender'] . "|" . $user['dateOfBirth'] . "|" . $user['phone'] . "|" . trim($oldUser[9]);
                array_push($dummyUsers, $modedUser);
                $isUserFound = true;
            } else {
                array_push($dummyUsers, trim($data));
            }
        }
    }
    fclose($usersFile);
    if (!$isUserFound) {
        return -2;
    }

    $usersFile = fopen($users_txt, 'w');
    for ($i = 0; $i < count($dummyUsers); ++$i) {
        fwrite($usersFile, $dummyUsers[$i] . "\n");
    }
    fclose($usersFile);
    return 1;
}