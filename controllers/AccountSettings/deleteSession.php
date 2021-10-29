<?php

$token = $_GET['token'];

if (!$token) {
    echo 'Invalid token, got ' . $token . ' as token';
    return;
}

require_once('../../repository/SettingsRepo.php');

$status = deleteSession($token);

switch ($status) {
    case -1:
        echo 'Not authenticated';
        return;
        break;
    case 0:
        echo 'Not authorized';
        return;
        break;
    case 1:
        header('location: ../../views/dashboard');
        return;
        break;
    default:
        break;
}
