<?php

if (isset($_POST['savePasswordChanges'])) {
	$oldPassword = $_POST['oldPassword'];
	$newPassword = $_POST['newPassword'];
	$newPassword2 = $_POST['newPassword2'];
	if ($newPassword != $newPassword2) {
		echo 'Passowrds do not match';
		return;
	}

	require_once('../../repository/SettingsRepo.php');

	$passwordChangeStatus = changePassword($oldPassword, $newPassword);

	switch ($passwordChangeStatus) {
		case -1:
			echo "Not Authenticated";
			return;
			break;
		case 0:
			echo 'Invalid Password';
			return;
			break;
		case 1:
			header('location: ../../views/dashboard');
			return;
			break;
		default:
			break;
	}
}

