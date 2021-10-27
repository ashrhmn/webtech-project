<?php

require_once('database.php');
function isUserLoggedIn()
{
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];

        if ($token != "") {

            $sessionFile = fopen('../data/fs/session.txt', 'r');

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

function getLoggedInUsername()
{
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];
        if ($token != "") {
            $sessionFile = fopen('../data/fs/session.txt', 'r');
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
    $username = getLoggedInUsername();
    if ($username) {
        $usersFile = fopen('../data/fs/users.txt', 'r');
        while (!feof($usersFile)) {
            $data = fgets($usersFile);
            if ($data != "") {
                $user = explode('|', $data);
                if (trim($user[1]) == $username) {
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
    $usersFile = fopen("../data/fs/users.txt", 'r');
    while (!feof($usersFile)) {
        $data = fgets($usersFile);
        if ($data != "") {
            $user = explode('|', $data);
            if (trim($user[1]) == $usernameOrEmail) {
                if (trim($user[9]) == $password) {
                    $sessionFile = fopen("../data/fs/session.txt", 'a');
                    $token = base64_encode(random_bytes(37));
                    if (!fwrite($sessionFile, $usernameOrEmail . '|' . $token."\n")) {
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
    $role = "Patient"; //default
    $id = time().'-'.$username.'-'.$phone; //randomGen
    $user = $id.'|'.$username.'|'.$email.'|'.$name.'|'.$role.'|'.$address.'|'.$gender.'|'.$dateOfBirth.'|'.$phone.'|'.$password."\n";
    if(!fwrite(fopen('../data/fs/users.txt','a'),$user)){
        return false;
    }
    return true;
}

function destroyLoginSession($token)
{
    $flag = false;
    $sessionFile = fopen("../data/fs/session.txt",'r');
    $users = array();
    while(!feof($sessionFile)){
        $data = fgets($sessionFile);
        if($data!=""){
            $userToken = explode('|',$data);
            if(trim($userToken[1])!=$token){
                array_push($users,$data);
            }
            else{
                $flag = true;
            }
        }
    }
    fclose($sessionFile);
    $sessionFile = fopen("../data/fs/session.txt",'w');

    for($i=0;$i<count($users);++$i){
        fwrite($sessionFile,$users[$i]);
    }

    return $flag;
}
