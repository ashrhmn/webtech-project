<?php

require_once('database.php');

function isUserLoggedIn()
{
	if (isset($_COOKIE['token'])) {
		$token = $_COOKIE['token'];
		if ($token == "") {
			return false;
		}
		if (dataExistsOnPreparedQuery("select userId from session where token=?", 's', $token)) {
			return true;
		}
		//$result = query('select userId from session where token=' . $token);
		//if ($result->num_rows > 0) {
		//	return true;
		//}
		setcookie('token', null, -1, '/');
		return false;
	}
	return false;
}

function getLoggedInUserId()
{
	if (!isset($_COOKIE['token'])) {
		return null;
	}
	$token = $_COOKIE['token'];
	if ($token != "") {
		$row = getSingleRowIfExistsOnPreparedQuery("select userId from session where token=?", 's', $token);
		if ($row) {
			return $row['userId'];
		}
	}
	return null;
}

function getLoggedInUser()
{
	$userId = getLoggedInUserId();
	if (!$userId) {
		return null;
	}
	$rows = preparedQueryToAssocArray("select * from users where id=?", 'i', $userId);
	if (count($rows) > 0) {
		return $rows[0];
	}
	return null;
}

function credsStatus($usernameOrEmail, $password) //-> 1=loginSucc, 0=wrongPassword, -1=userNotFound, -2=sesionError
{
	$rows = preparedQueryToAssocArray("select * from users where username=? or email=?", 'ss', $usernameOrEmail, $usernameOrEmail);
	if (count($rows) > 0) {
		if ($rows[0]['password'] === $password) {
			$token = bin2hex(random_bytes(37));
			$id = $rows[0]['id'];
			$agent = $_SERVER['HTTP_USER_AGENT'];
			$time = (new DateTime('NOW'))->format('c');
			$sql = "insert into session(userId, token, agent, time) values(?,?,?,?)";
			if (!isPreparedStatementExecuted($sql, 'isss', $id, $token, $agent, $time)) {
				//sessionError
				return -2;
			}
			//loginSucc
			setcookie('token', $token, time() + (365 * 24 * 3600), '/');
			return 1;
		}
		//wrong password
		return 0;
	}
	//userNotFound
	return -1;
}

function isAvailable($key, $value)
{
	if (dataExistsOnPreparedQuery("select * from users where " . $key . "=?", 's', $value)) {
		return false;
	}
	return true;
}

function isUsernameAvailable($username)
{
	return isAvailable('username', $username);
}
function isEmailAvailable($email)
{
	return isAvailable('email', $email);
}


function signUpStatus($name, $username, $email, $password, $address, $phone, $gender, $dateOfBirth) // 1=signUpSucc, 0=serverError, -1 = emailNotAvailable , -2 = usernameNotAvailable
{
	if (!IsUsernameAvailable($username)) {
		return -2;
	}
	if (!IsEmailAvailable($email)) {
		return -1;
	}
	$role = 'Patient'; //default
	$profilePicture = 'default.png'; //default
	$sql = "insert into users (username, email, name, password, role, address, phone, gender, dateOfBirth, profilePicture) values(?,?,?,?,?,?,?,?,?,?)";

	if (isPreparedStatementExecuted($sql, 'ssssssssss', $username, $email, $name, $password, $role, $address, $phone, $gender, $dateOfBirth, $profilePicture)) {
		//SignUp Succ
		return 1;
	}
	return 0;
}

function destroyLoginSession($token)
{
	if (isPreparedStatementExecuted("delete from session where token=?", 's', $token)) {
		return true;
	}
	return false;
}
