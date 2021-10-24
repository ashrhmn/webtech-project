<?php

if(isset($_COOKIE['token'])){
    $token = $_COOKIE['token'];

    setcookie('token',null,-1,'/');
    require_once('../database.php');
    
    if(!mutate("delete from session where token='".$token."'")){
        echo '<script>alert("Logged out but session deleting failed, you may want to delete session manually from your account")</script>';
    }

    header('location: ../html/home.php');
}