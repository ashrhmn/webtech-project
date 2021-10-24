<?php 
session_start();
include("nav.php");
// if(isset($_COOKIE['isLoggedIn'])){
//     if(trim($_COOKIE['isLoggedIn'])=='true'){
//         echo 'Logged In';
//         return;
//     }
//     else{
//         header('location: login.php');
//         return;
//     }
// }
// header('location: home.php');

require_once('../Repo/UserRepo.php');

if(isUserLoggedIn()){
    if(isUserLoggedIn()){
        header('location: dashboard.php');
    }
    return;
}
header('location: home.php');