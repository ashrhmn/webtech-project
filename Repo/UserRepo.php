<?php

function isUserLoggedIn()
{
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];
        require_once('../database.php');

        $result = query("select * from session where token='" . $token . "'");
        if ($result->num_rows > 0) {
            return true;
        }
        setcookie('token', null, -1, '/');
        return false;
    }
    return false;
}

function getLoggedInUser()
{
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];
        require_once('../database.php');

        $result = query("select * from session where token='" . $token . "'");
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                return array('username'=>$row['username'],'role'=>$row['role']);
            }
        }
        setcookie('token', null, -1, '/');
        return null;
    }
    return null;
}
