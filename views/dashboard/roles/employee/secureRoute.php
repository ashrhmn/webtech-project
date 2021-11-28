<?php

require_once(__DIR__ . '/../../../../repository/AuthRepo.php');

$user = getLoggedInUser();

if ($user['role'] != 'Employee') {
	echo 'Not elevated';
	return;
}
