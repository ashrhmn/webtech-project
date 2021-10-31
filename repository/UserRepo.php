<?php

require_once('files.php');

$users_txt = getFsRootDir()."users.txt";
$session_txt = getFsRootDir()."session.txt";


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

    require_once('AuthRepo.php');
    $authUser = getLoggedInUser();
    if($authUser['username']!=$user['username']){
        if(!isUsernameAvailable($user['username'])){
            return -1;
        }
    }
    if($authUser['email']!=$user['email']){
        if(!isEmailAvailable($user['email'])){
            return 0;
        }
    }
    
    global $users_txt;
    $dummyUsers = array();
    $usersFile = fopen($users_txt, 'r');
    $isUserFound = false;
    while (!feof($usersFile)) {
        $data = fgets($usersFile);
        if ($data != "") {
            $oldUser = explode('|', $data);
            if (trim($oldUser[0]) == $authUser['id']) {
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

function getAllUser(){
    global $users_txt;
    $users = array();
    $usersFile = fopen($users_txt,'r');
    while(!feof($usersFile)){
        $data = fgets($usersFile);
        if($data!=""){
            $user = explode('|',$data);
            array_push($users,array('id'=>$user[0],'username'=>$user[1],'email'=>$user[2],'name'=>$user[3],'role'=>$user[4],'address'=>$user[5],'gender'=>$user[6],'dateOfBirth'=>$user[7],'phone'=>$user[8]));
        }
    }
    return $users;
}