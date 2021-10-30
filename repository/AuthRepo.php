<?php

require_once('files.php');

$users_txt = getFsRootDir() . "users.txt";
$session_txt = getFsRootDir() . "session.txt";

function isUserLoggedIn()
{
    global $session_txt;
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];

        if ($token != "") {

            $sessionFile = fopen($session_txt, 'r');

            while (!feof($sessionFile)) {
                $data = fgets($sessionFile);
                if ($data != "") {
                    $session = explode('|', $data);
                    if (trim($session[1]) == trim($token)) {
                        return true;
                    }
                }
            }
        }
        setcookie('token', null, -1, '/');
        return false;
    }
    return false;
}

// function getLoggedInUsername()
// {
//     global $session_txt;
//     if (isset($_COOKIE['token'])) {
//         $token = $_COOKIE['token'];
//         if ($token != "") {
//             $sessionFile = fopen($session_txt, 'r');
//             while (!feof($sessionFile)) {
//                 $data = fgets($sessionFile);
//                 if ($data != "") {
//                     $session = explode('|', $data);
//                     if (trim($session[1]) == trim($token)) {
//                         return $session[0];
//                     }
//                 }
//             }
//         }
//         setcookie('token', null, -1, '/');
//         return null;
//     }
//     return null;
// }


function getLoggedInUserId()
{
    global $session_txt;
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];
        if ($token != "") {
            $sessionFile = fopen($session_txt, 'r');
            while (!feof($sessionFile)) {
                $data = fgets($sessionFile);
                if ($data != "") {
                    $session = explode('|', $data);
                    if (trim($session[1]) == trim($token)) {
                        return $session[0];
                    }
                }
            }
        }
        setcookie('token', null, -1, '/');
        return null;
    }
    return null;
}

function getLoggedInUser()
{
    global $users_txt;
    $userId = getLoggedInUserId();
    if ($userId) {
        $usersFile = fopen($users_txt, 'r');
        while (!feof($usersFile)) {
            $data = fgets($usersFile);
            if ($data != "") {
                $user = explode('|', $data);
                if (trim($user[0]) == $userId) {
                    return array('id' => $user[0], 'username' => $user[1], 'email' => $user[2], 'name' => $user[3], 'role' => $user[4], 'address' => $user[5], 'gender' => $user[6], 'dateOfBirth' => $user[7], 'phone' => $user[8]);
                }
            }
        }
    }
    setcookie('token', null, -1, '/');
    return null;
}

function credsStatus($usernameOrEmail, $password) //-> 1=loginSucc, 0=wrongPassword, -1=userNotFound, 2=sesionError
{
    global $users_txt;
    global $session_txt;
    $usersFile = fopen($users_txt, 'r');
    while (!feof($usersFile)) {
        $data = fgets($usersFile);
        if ($data != "") {
            $user = explode('|', $data);
            if (trim($user[1]) == $usernameOrEmail) {
                if (trim($user[9]) == $password) {
                    $sessionFile = fopen($session_txt, 'a');
                    $token = bin2hex(random_bytes(37));
                    if (!fwrite($sessionFile, $user[0] . '|' . $token . "|" . $_SERVER['HTTP_USER_AGENT'] . "\n")) {
                        //sessionError
                        return 2;
                    }
                    //loginSucc
                    setcookie('token', $token, time() + (365 * 24 * 3600), '/');
                    return 1;
                } else {
                    //wrongPass
                    return 0;
                }
            }
        }
    }
    //userNotFound
    return -1;
}

function isSignUpSuccessful($name, $username, $email, $password, $address, $phone, $gender, $dateOfBirth)
{
    global $users_txt;
    $role = "Patient"; //default
    $id = time() . '-' . $username . '-' . $phone; //randomGen
    $user = $id . '|' . $username . '|' . $email . '|' . $name . '|' . $role . '|' . $address . '|' . $gender . '|' . $dateOfBirth . '|' . $phone . '|' . $password . "\n";
    $users_file = fopen($users_txt, 'a');
    if (!fwrite($users_file, $user)) {
        return false;
    }
    return true;
}

function destroyLoginSession($token)
{
    global $session_txt;
    $flag = false;
    $sessionFile = fopen($session_txt, 'r');
    $users = array();
    while (!feof($sessionFile)) {
        $data = fgets($sessionFile);
        if ($data != "") {
            $userToken = explode('|', $data);
            if (trim($userToken[1]) != $token) {
                array_push($users, $data);
            } else {
                $flag = true;
            }
        }
    }
    fclose($sessionFile);
    $sessionFile = fopen($session_txt, 'w');

    for ($i = 0; $i < count($users); ++$i) {
        fwrite($sessionFile, $users[$i]);
    }

    return $flag;
}
