<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['id'];

require_once('../../repository/UserRepo.php');

if (deleteUser($id)) {
    header('location: ../../views/dashboard');
    return;
}
echo 'Deleting user Error';
return;
