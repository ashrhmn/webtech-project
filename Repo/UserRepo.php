<?php

require_once('../database.php');
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
            if($row = $result->fetch_assoc()){
                return $row['username'];
            }
        }
        setcookie('token', null, -1, '/');
        return null;
    }
    return null;
}
