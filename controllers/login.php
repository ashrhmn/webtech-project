<?php

if (isset($_POST['login'])) {

	$usernameOrEmail = $_POST['usernameOrEmail'];
	$password = $_POST['password'];

	if ($usernameOrEmail == "" || $password == "") {
		echo 'Invalid username/email and/or password';
		return;
	}

	require_once('../repository/AuthRepo.php');
	$status = credsStatus($usernameOrEmail, $password); //-> 1=loginSucc, 0=wrongPassword, -1=userNotFound, -2=sesionError
	switch ($status) {
		case 1:
			header('location: ../views/dashboard');
			break;
		case 0:
			echo 'Wrong Password';
			break;
		case -1:
			echo 'User not found with the username or email';
			break;
		case -2:
			echo 'Error creating session, internal error';
			break;
		default:
			echo 'Unknown error occured';
			break;
	}
	return;
}
echo 'Error form submission';
return;

