<?php 
session_start();
include("nav.php");
if(isset($_COOKIE['isLoggedIn'])){
    if(trim($_COOKIE['isLoggedIn'])=='true'){
        echo 'Logged In';
        return;
    }
    else{
        header('location: login.php');
        return;
    }
}
header('location: home.php');
