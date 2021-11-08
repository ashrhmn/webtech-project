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

if (isset($_POST['signup'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$gender = $_POST['gender'];
	$dateOfBirth = $_POST['dateOfBirth'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];

	if (hasEmptyStr([$username, $email, $password, $password2, $gender])) {
		echo 'Invalid input';
		return;
	}

	if ($password != $password2) {
		echo 'Passwords do not match';
		return;
	}

	require_once('../repository/AuthRepo.php');
	// 1=signUpSucc, 0=serverError, -1 = emailNotAvailable , -2 = usernameNotAvailable

	$status = signUpStatus($name, $username, $email, $password, $address, $phone, $gender, $dateOfBirth);
	switch ($status) {
		case 1:
			header('location: ../views/login.php');
			break;
			return;
		case 0:
			echo 'Internal server error';
			break;
		case -1:
			echo 'Email is already in use';
			break;
		case -2:
			echo 'Username not available';
			break;
	}
	//    if(isSignUpSuccessful($name,$username,$email,$password,$address,$phone,$gender,$dateOfBirth)){
	//        header('location: ../views/login.php');
	//        return;
	//    }
	//echo 'Sign Up Error';
	return;
}

echo 'Submit error';
