<?php
require_once('../../repository/AuthRepo.php');
require_once('../../repository/UserRepo.php');

$user = getLoggedInUser();

$file = "user/" . time() . '-' . $user['id'] . '-' . $_FILES['proPic']['name'];
$des = "../../../assets/" . $file;
$src = $_FILES['proPic']['tmp_name'];

if (move_uploaded_file($src, $des)) {
	$oldFile = '../../../assets/' . $user['profilePicture'];
	$status = setProPic($file);
	if ($status) {
		if (file_exists($oldFile)) {
			unlink($oldFile);
		}
		header('location: ../../views/dashboard');
		return;
	}
	echo 'Not Authenticatedd';
	return;
} else {
	echo "Error Changing Profile Picture";
}
