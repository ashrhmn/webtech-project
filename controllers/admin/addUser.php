<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function hasEmptyStr($strings)
{
    $n = count($strings);
    for ($i = 0; $i < $n; ++$i) {
        if ($strings[$i] == "") {
            return true;
        }
    }
    return false;
}

if (isset($_POST['addNewUser'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    if (hasEmptyStr([$username, $email, $gender])) {
        echo 'Invalid input';
        return;
    }

    require_once('../../repository/UserRepo.php');

    if (addUser($name, $username, $email, $role, $address, $phone, $gender, $dateOfBirth)) {
        header('location: ../../views/dashboard');
        return;
    }
    echo 'Adding user Error';
    return;
}

echo 'Submit error';
