<?php

require_once('AuthRepo.php');
require_once('files.php');

$users_txt = getFsRootDir() . "users.txt";
$session_txt = getFsRootDir() . "session.txt";

function changePassword($oldPassword, $newpassword) //notAuthenticated=-1, wrongPassword=0, successfull=1
{
    global $users_txt;
    $userId = getLoggedInUserId();
    if (!$userId) {
        return -1;
    }
    $dummyUsers = array();
    $usersFile = fopen($users_txt, 'r');
    $isPasswordValid = false;
    while (!feof($usersFile)) {
        $data = fgets($usersFile);
        if ($data != "") {
            $user = explode('|', $data);
            if (trim($user[9]) == $oldPassword && trim($user[0]) == $userId) {
                $modedUser = trim($user[0]) . "|" . trim($user[1]) . "|" . trim($user[2]) . "|" . trim($user[3]) . "|" . trim($user[4]) . "|" . trim($user[5]) . "|" . trim($user[6]) . "|" . trim($user[7]) . "|" . trim($user[8]) . "|" . $newpassword;
                array_push($dummyUsers, $modedUser);
                $isPasswordValid = true;
            } else {
                array_push($dummyUsers, trim($data));
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


function getAllSession()
{
    global $session_txt;
    $userId = getLoggedInUserId();
    if (!$userId) {
        return null;
    }
    $sessions = array();

    $sessionFile = fopen($session_txt, 'r');

    while (!feof($sessionFile)) {
        $data = fgets($sessionFile);
        if ($data != "") {
            $sessionData = explode('|', $data);
            if (trim($sessionData[0]) == $userId) {
                array_push($sessions, array('token' => trim($sessionData[1]), 'agent' => trim($sessionData[2])));
            }
        }
    }
    return $sessions;
}

function deleteSession($token) // notAuthenticated = -1, notAuthorized = 0, deleteSuccess = 1
{
    global $session_txt;
    $userId = getLoggedInUserId();
    if (!$userId) {
        return -1;
    }
    $sessions = array();
    $sessionFile = fopen($session_txt, 'r');
    $flag = false;
    while (!feof($sessionFile)) {
        $data = fgets($sessionFile);
        if ($data != "") {
            $sessionData = explode('|', $data);
            if (trim($sessionData[0]) == $userId && trim($sessionData[1]) == $token) {
                $flag = true;
            } else {
                array_push($sessions, trim($data));
            }
        }
    }
    fclose($sessionFile);

    if (!$flag) {
        return 0;
    }
    $sessionFile = fopen($session_txt, 'w');

    for ($i = 0; $i < count($sessions); ++$i) {
        fwrite($sessionFile, $sessions[$i] . "\n");
    }

    fclose($sessionFile);
    return 1;
}
