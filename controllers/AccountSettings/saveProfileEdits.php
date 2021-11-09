<?php

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

$status = saveUserEdits(array('username' => $username, 'email' => $email, 'name' => $name, 'gender' => $gender, 'role' => $role, 'dateOfBirth' => $dateOfBirth, 'address' => $address, 'phone' => $phone)); //usernameUnavailable=-1, //emailAlreadyExists=0, //userNotFound=-2 saveSuccessfully=1

switch ($status) {
	case -2:
		echo "User not found";
		return;
		break;
	case -1:
		echo 'Username already in use';
		return;
		break;
	case 0:
		echo 'Email already in use';
		return;
		break;
	case 1:
		header('location: ../../views/dashboard');
		break;
	default:
		break;
}

