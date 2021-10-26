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
            if($row = $result->fetch_assoc()){
                return $row['username'];
            }
        }
        setcookie('token', null, -1, '/');
        return null;
    }
    return null;
}

function getLoggedInUser(){
    if (isset($_COOKIE['token'])) {
        $token = $_COOKIE['token'];
        $sql = "select u.id as id, u.name as name, u.username as username, u.email as email,u.role as role, u.address as address, u.gender as gender, u.dateOfBirth as dateOfBirth, u.phone as phone from session as s left join users as u on u.username=s.username where token='" . $token . "'";
        $result = query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                return $row;
            }
        }
        setcookie('token', null, -1, '/');
        return null;
    }
    return null;
}