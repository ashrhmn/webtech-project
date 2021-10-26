<?php

require_once('database.php');
function isUserLoggedIn()
{
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];

        $result = query("select * from session where token='" . $token . "'");
        if ($result->num_rows > 0) {
            return true;
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
        $result = query("select * from session where token='" . $token . "'");
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                return $row['username'];
            }
        }
        setcookie('token', null, -1, '/');
        return null;
    }
    return null;
}

function getLoggedInUser()
{
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];
        $sql = "select u.id as id, u.name as name, u.username as username, u.email as email,u.role as role, u.address as address, u.gender as gender, u.dateOfBirth as dateOfBirth, u.phone as phone from session as s left join users as u on u.username=s.username where token='" . $token . "'";
        $result = query($sql);
        if ($result->num_rows > 0) {
            if ($row = $result->fetch_assoc()) {
                return $row;
            }
        }
        setcookie('token', null, -1, '/');
        return null;
    }
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

function isSignUpSuccessful($name,$username,$email,$password,$address,$phone,$gender,$dateOfBirth)
{
    $sql = "INSERT INTO users(name, username,email, password, address, phone, gender, dateOfBirth) VALUES ('" . $name . "','" . $username . "','" . $email . "','" . $password . "','" . $address . "','" . $phone . "','" . $gender . "','" . $dateOfBirth . "')";

    if (mutate($sql)) {
        return true;
    }
    return false;
}