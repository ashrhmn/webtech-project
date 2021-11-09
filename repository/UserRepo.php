<?php

require_once('files.php');
require_once('AuthRepo.php');
require_once('database.php');

$users_txt = getFsRootDir() . "users.txt";
$session_txt = getFsRootDir() . "session.txt";

function saveUserEdits($user)
{ //usernameUnavailable=-1, //emailAlreadyExists=0, //noInfoChanged=-2 saveSuccessfully=1
	$oldUser = getUserById($user['id']);
	if ($oldUser['username'] != $user['username']) {
		if (!isUsernameAvailable($user['username'])) {
			return -1;
		}
	}
	if ($oldUser['email'] != $user['email']) {
		if (!isEmailAvailable($user['email'])) {
			return 0;
		}
	}

	if (isPreparedStatementExecuted("update users set username=?, name=?, email=?, address=?, gender=?, role=?, dateOfBirth=?, phone=? where id=?", 'ssssssssi', $user['username'], $user['name'], $user['email'], $user['address'], $user['gender'], $user['role'], $user['dateOfBirth'], $user['phone'], $oldUser['id'])) {
		//successfull
		return 1;
	} else {
		//noInfoChanged
		return -2;
	}
}

//function saveUserEdits($user, $id)
//{ //usernameUnavailable=-1, //emailAlreadyExists=0, //userNotFound=-2 saveSuccessfully=1
//
//	require_once('AuthRepo.php');
//	$authUser = getUserById($id);
//	if ($authUser['username'] != $user['username']) {
//		if (!isUsernameAvailable($user['username'])) {
//			return -1;
//		}
//	}
//	if ($authUser['email'] != $user['email']) {
//		if (!isEmailAvailable($user['email'])) {
//			return 0;
//		}
//	}
//
//	global $users_txt;
//	$dummyUsers = array();
//	$usersFile = fopen($users_txt, 'r');
//	$isUserFound = false;
//	while (!feof($usersFile)) {
//		$data = fgets($usersFile);
//		if ($data != "") {
//			$oldUser = explode('|', $data);
//			if (trim($oldUser[0]) == $authUser['id']) {
//				$modedUser = trim($oldUser[0]) . "|" . $user['username'] . "|" . $user['email'] . "|" . $user['name'] . "|" . $user['role'] . "|" . $user['address'] . "|" . $user['gender'] . "|" . $user['dateOfBirth'] . "|" . $user['phone'] . "|" . trim($oldUser[9]) . "|" . trim($oldUser[10]);
//				array_push($dummyUsers, $modedUser);
//				$isUserFound = true;
//			} else {
//				array_push($dummyUsers, trim($data));
//			}
//		}
//	}
//	fclose($usersFile);
//	if (!$isUserFound) {
//		return -2;
//	}
//
//	$usersFile = fopen($users_txt, 'w');
//	for ($i = 0; $i < count($dummyUsers); ++$i) {
//		fwrite($usersFile, $dummyUsers[$i] . "\n");
//	}
//	fclose($usersFile);
//	return 1;
//}

//function getAllUser()
//{
//	global $users_txt;
//	$users = array();
//	$usersFile = fopen($users_txt, 'r');
//	while (!feof($usersFile)) {
//		$data = fgets($usersFile);
//		if ($data != "") {
//			$user = explode('|', $data);
//			array_push($users, array('id' => $user[0], 'username' => $user[1], 'email' => $user[2], 'name' => $user[3], 'role' => $user[4], 'address' => $user[5], 'gender' => $user[6], 'dateOfBirth' => $user[7], 'phone' => $user[8]));
//		}
//	}
//	return $users;
//}
function getAllUser()
{
	return queryToAssocArray("select * from users");
}


//function addUser($name, $username, $email, $role, $address, $phone, $gender, $dateOfBirth)
//{
//	global $users_txt;
//	$id = time() . '-' . $username; //randomGen
//	$user = $id . '|' . $username . '|' . $email . '|' . $name . '|' . $role . '|' . $address . '|' . $gender . '|' . $dateOfBirth . '|' . $phone . '|' . $username . '|assets/default.png' . "\n";
//	$users_file = fopen($users_txt, 'a');
//	if (!fwrite($users_file, $user)) {
//		return false;
//	}
//	return true;
//}
function addUser($name, $username, $email, $role, $address, $phone, $gender, $dateOfBirth)
{
	return isPreparedStatementExecuted("insert into users (name, username, email, role, address, phone, gender, dateOfBirth) values(?,?,?,?,?,?,?,?>)", 'ssssssss', $name, $username, $email, $role, $address, $phone, $gender, $dateOfBirth);
}

function getUserById($id)
{
	return getSingleRowIfExistsOnPreparedQuery("select * from users where id=?", 'i', $id);
}

//function getUserById($id)
//{
//	global $users_txt;
//	$userId = $id;
//	$usersFile = fopen($users_txt, 'r');
//	while (!feof($usersFile)) {
//		$data = fgets($usersFile);
//		if ($data != "") {
//			$user = explode('|', $data);
//			if (trim($user[0]) == $userId) {
//				return array('id' => $user[0], 'username' => $user[1], 'email' => $user[2], 'name' => $user[3], 'role' => $user[4], 'address' => $user[5], 'gender' => $user[6], 'dateOfBirth' => $user[7], 'phone' => $user[8]);
//			}
//		}
//	}
//	return null;
//}


//function deleteUser($id)
//{
//	global $users_txt;
//	$dummyUsers = array();
//	$usersFile = fopen($users_txt, 'r');
//	$isUserFound = false;
//	while (!feof($usersFile)) {
//		$data = fgets($usersFile);
//		if ($data != "") {
//			$oldUser = explode('|', $data);
//			if (trim($oldUser[0]) == $id) {
//				$isUserFound = true;
//			} else {
//				array_push($dummyUsers, trim($data));
//			}
//		}
//	}
//	fclose($usersFile);
//	if (!$isUserFound) {
//		return false;
//	}
//
//	$usersFile = fopen($users_txt, 'w');
//	for ($i = 0; $i < count($dummyUsers); ++$i) {
//		fwrite($usersFile, $dummyUsers[$i] . "\n");
//	}
//	fclose($usersFile);
//	return true;
//}
function deleteUser($id)
{
	return preparedQueryToAssocArray("delete from users where id=?", 'i', $id);
}


//function getAllDoctor()
//{
//	global $users_txt;
//	$users = array();
//	$usersFile = fopen($users_txt, 'r');
//	while (!feof($usersFile)) {
//		$data = fgets($usersFile);
//		if ($data != "") {
//			$user = explode('|', $data);
//			if ($user[4] == "Doctor") {
//				array_push($users, array('id' => $user[0], 'username' => $user[1], 'email' => $user[2], 'name' => $user[3], 'role' => $user[4], 'address' => $user[5], 'gender' => $user[6], 'dateOfBirth' => $user[7], 'phone' => $user[8]));
//			}
//		}
//	}
//	return $users;
//}
function getAllDoctor()
{
	$role = 'Doctor';
	return preparedQueryToAssocArray("select * from users where role=?", 's', $role);
}


//function setProPic($path)
//{
//	global $users_txt;
//	$userId = getLoggedInUserId();
//	if (!$userId) {
//		return false;
//	}
//	$dummyUsers = array();
//	$usersFile = fopen($users_txt, 'r');
//	while (!feof($usersFile)) {
//		$data = fgets($usersFile);
//		if ($data != "") {
//			$user = explode('|', $data);
//			if (trim($user[0]) == $userId) {
//				$modedUser = trim($user[0]) . "|" . trim($user[1]) . "|" . trim($user[2]) . "|" . trim($user[3]) . "|" . trim($user[4]) . "|" . trim($user[5]) . "|" . trim($user[6]) . "|" . trim($user[7]) . "|" . trim($user[8]) . "|" . trim($user[9]) . "|" . $path;
//				array_push($dummyUsers, $modedUser);
//			} else {
//				array_push($dummyUsers, trim($data));
//			}
//		}
//	}
//	fclose($usersFile);
//
//	$usersFile = fopen($users_txt, 'w');
//	for ($i = 0; $i < count($dummyUsers); ++$i) {
//		fwrite($usersFile, $dummyUsers[$i] . "\n");
//	}
//	fclose($usersFile);
//	return true;
//}

function setProPic($path)
{
	return isPreparedStatementExecuted("update users set profilePicture=? where id=?", 'si', $path, getLoggedInUserId());
}

