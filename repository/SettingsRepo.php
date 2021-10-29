<?php

require_once('AuthRepo.php');
require_once('files.php');

$users_txt = getRootDir() . "users.txt";

function changePassword($oldPassword, $newpassword) //notAuthenticated=-1, wrongPassword=0, successfull=1
{
    global $users_txt;
    $username = getLoggedInUsername();
    if (!$username) {
        return -1;
    }
    $dummyUsers = array();
    $usersFile = fopen($users_txt, 'r');
    $isPasswordValid = false;
    while (!feof($usersFile)) {
        $data = fgets($usersFile);
        if ($data != "") {
            $user = explode('|',$data);
            if (trim($user[9]) == $oldPassword) {
                $modedUser = trim($user[0]) . "|" . trim($user[1]) . "|" . trim($user[2]) . "|" . trim($user[3]) . "|" . trim($user[4]) . "|" . trim($user[5]) . "|" . trim($user[6]) . "|" . trim($user[7]) . "|" . trim($user[8]) . "|" . $newpassword;
                array_push($dummyUsers, $modedUser);
                $isPasswordValid = true;
            } else {
                array_push($dummyUsers, $data);
            }
        }
    }
    fclose($usersFile);
    if (!$isPasswordValid) {
        return 0;
    }

    $usersFile = fopen($users_txt, 'w');
    for ($i = 0; $i < count($dummyUsers); ++$i) {
        fwrite($usersFile, $dummyUsers[$i] . "\n");
    }
    fclose($usersFile);
    return 1;
}
