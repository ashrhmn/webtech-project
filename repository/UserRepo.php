<?php
require_once('AuthRepo.php');
require_once('database.php');

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

	return (isPreparedStatementExecuted("update users set username=?, name=?, email=?, address=?, gender=?, role=?, dateOfBirth=?, phone=? where id=?", 'ssssssssi', $user['username'], $user['name'], $user['email'], $user['address'], $user['gender'], $user['role'], $user['dateOfBirth'], $user['phone'], $oldUser['id'])) ? 1 : -2;
}
function getAllUser()
{
	return queryToAssocArray("select * from users");
}

function addUser($name, $username, $email, $role, $address, $phone, $gender, $dateOfBirth)
{
	$profilePicture = 'default.png'; //default
	return isPreparedStatementExecuted("insert into users (name, username, email, role, address, phone, gender, dateOfBirth, password, profilePicture) values(?,?,?,?,?,?,?,?,?,?)", 'ssssssssss', $name, $username, $email, $role, $address, $phone, $gender, $dateOfBirth, $username, $profilePicture);
}

function getUserById($id)
{
	return getSingleRowIfExistsOnPreparedQuery("select * from users where id=?", 'i', $id);
}

function deleteUser($id)
{
	return isPreparedStatementExecuted("delete from users where id=?", 'i', $id);
}

function getAllDoctor()
{
	$role = 'Doctor';
	return preparedQueryToAssocArray("select * from users where role=?", 's', $role);
}


function setProPic($path)
{
	return isPreparedStatementExecuted("update users set profilePicture=? where id=?", 'si', $path, getLoggedInUserId());
}
