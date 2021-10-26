<?php

if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];
    setcookie('token', null, -1, '/');
    require_once('../repository/UserRepo.php');
    if (!destroyLoginSession($token)) {
        echo '<script>alert("Logged out but session deleting failed, you may want to delete session manually from your account")</script>';
    }
    header('location: ../views/home.php');
}
