<?php

require_once('database.php');
function isUserLoggedIn()
{
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];

        if($token!=""){

            $sessionFile = fopen('session.txt','r');

            while(!feof($sessionFile)){
                $data = fgets($sessionFile);
                if($data!=""){
                    $session = explode('|',$data);
                    if(trim($session[1])==trim($token)){
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
        if($token!=""){
            $sessionFile = fopen('session.txt','r');
            while(!feof($sessionFile)){
                $data = fgets($sessionFile);
                if($data!=""){
                    $session = explode('|',$data);
                    if(trim($session[1])==trim($token)){
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
    if($username){
        $usersFile = fopen('users.txt','r');
        while(!feof($usersFile)){
            $data = fgets($usersFile);
            if($data!=""){
                $user = explode('|',$data);
                if(trim($user[1])==$username){
                    return array('id'=>$user[0],'username'=>$user[1],'email'=>$user[2],'name'=>$user[3],'role'=>$user[4],'address'=>$user[5],'gender'=>$user[6],'dateOfBirth'=>$user[7],'phone'=>$user[8]);
                }
            }
        }
    }
    setcookie('token', null, -1, '/');
    return null;
}

function credsStatus($usernameOrEmail, $password) //-> 1=loginSucc, 0=wrongPassword, -1=userNotFound, 2=sesionError
{
    $sql = "select * from  users where username='" . $usernameOrEmail . "' or email='" . $usernameOrEmail . "'";
    $result = query($sql);
    if ($result != false && $result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            if ($row['password'] == $password) {
                $token = base64_encode(random_bytes(37));
                setcookie('token', $token, time() + (365 * 24 * 3600), '/');
                if (mutate("insert into session (username,token) values('" . $row['username'] . "','" . $token . "')")) {
                    return 1;
                } else {
                    return 2;
                }
                return;
            } else {
                return 0;
            }
        }
    }
    return -1;
}

function isSignUpSuccessful($name, $username, $email, $password, $address, $phone, $gender, $dateOfBirth)
{
    $sql = "INSERT INTO users(name, username,email, password, address, phone, gender, dateOfBirth) VALUES ('" . $name . "','" . $username . "','" . $email . "','" . $password . "','" . $address . "','" . $phone . "','" . $gender . "','" . $dateOfBirth . "')";

    if (mutate($sql)) {
        return true;
    }
    return false;
}

function destroyLoginSession($token)
{
    if (!mutate("delete from session where token='" . $token . "'")) {
        return false;
    }
    return true;
}
