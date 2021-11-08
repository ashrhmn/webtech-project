<?php

//require_once('files.php');
require_once('database.php');

//$users_txt = getFsRootDir() . "users.txt";
//$session_txt = getFsRootDir() . "session.txt";

//function isUserLoggedIn()
//{
//    global $session_txt;
//    if (isset($_COOKIE['token'])) {
//        $token = $_COOKIE['token'];
//
//        if ($token != "") {
//
//            $sessionFile = fopen($session_txt, 'r');
//
//            while (!feof($sessionFile)) {
//                $data = fgets($sessionFile);
//                if ($data != "") {
//                    $session = explode('|', $data);
//                    if (trim($session[1]) == trim($token)) {
//                        return true;
//                    }
//                }
//            }
//        }
//        setcookie('token', null, -1, '/');
//        return false;
//    }
//    return false;
//}

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

//function getLoggedInUserId()
//{
//    global $session_txt;
//    if (isset($_COOKIE['token'])) {
//        $token = $_COOKIE['token'];
//        if ($token != "") {
//            $sessionFile = fopen($session_txt, 'r');
//            while (!feof($sessionFile)) {
//                $data = fgets($sessionFile);
//                if ($data != "") {
//                    $session = explode('|', $data);
//                    if (trim($session[1]) == trim($token)) {
//                        return $session[0];
//                    }
//                }
//            }
//        }
//        setcookie('token', null, -1, '/');
//        return null;
//    }
//    return null;
//}
function getLoggedInUserId()
{
	if (!isset($_COOKIE['token'])) {
		return null;
	}
	$token = $_COOKIE['token'];
	if ($token != "") {
		$rows = preparedQueryToAssocArray("select userId from session where token=?", 's', $token);
		if (count($rows) > 0) {
			return $rows[0]['userId'];
		}
		//	$result = query('select userId from session where token=' . $token);
		//	if ($result->num_rows > 0) {
		//		if ($row = $result->fetch_assoc()) {
		//			return $row['userId'];
		//		}
		//	}
	}
	return null;
}

//function getLoggedInUser()
//{
//    global $users_txt;
//    $userId = getLoggedInUserId();
//    if ($userId) {
//        $usersFile = fopen($users_txt, 'r');
//        while (!feof($usersFile)) {
//            $data = fgets($usersFile);
//            if ($data != "") {
//                $user = explode('|', $data);
//                if (trim($user[0]) == $userId) {
//                    return array('id' => $user[0], 'username' => $user[1], 'email' => $user[2], 'name' => $user[3], 'role' => $user[4], 'address' => $user[5], 'gender' => $user[6], 'dateOfBirth' => $user[7], 'phone' => $user[8],'dp' => $user[10]);
//                }
//            }
//        }
//    }
//    setcookie('token', null, -1, '/');
//    return null;
//}

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
	//	$result = query("select * from users where id=" . $userId);
	//	if ($result->num_rows > 0) {
	//		if ($row = $result->fetch_assoc()) {
	//			return $row;
	//		}
	//	}
	return null;
}

//function credsStatus($usernameOrEmail, $password) //-> 1=loginSucc, 0=wrongPassword, -1=userNotFound, 2=sesionError
//{
//    global $users_txt;
//    global $session_txt;
//    $usersFile = fopen($users_txt, 'r');
//    while (!feof($usersFile)) {
//        $data = fgets($usersFile);
//        if ($data != "") {
//            $user = explode('|', $data);
//            if (trim($user[1]) == $usernameOrEmail) {
//                if (trim($user[9]) == $password) {
//                    $sessionFile = fopen($session_txt, 'a');
//                    $token = bin2hex(random_bytes(37));
//                    if (!fwrite($sessionFile, $user[0] . '|' . $token . "|" . $_SERVER['HTTP_USER_AGENT'] . "\n")) {
//                        //sessionError
//                        return 2;
//                    }
//                    //loginSucc
//                    setcookie('token', $token, time() + (365 * 24 * 3600), '/');
//                    return 1;
//                } else {
//                    //wrongPass
//                    return 0;
//                }
//            }
//        }
//    }
//    //userNotFound
//    return -1;
//}
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
//function isSignUpSuccessful($name, $username, $email, $password, $address, $phone, $gender, $dateOfBirth)
//{
//    global $users_txt;
//    $role = "Patient"; //default
//    $dp = "assets/default.png"; //default
//    $id = time() . '-' . $username; //randomGen
//    $user = $id . '|' . $username . '|' . $email . '|' . $name . '|' . $role . '|' . $address . '|' . $gender . '|' . $dateOfBirth . '|' . $phone . '|' . $password . '|' . $dp . "\n";
//    $users_file = fopen($users_txt, 'a');
//    if (!fwrite($users_file, $user)) {
//        return false;
//    }
//    return true;
//}


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
	$profilePicture = 'assets/default.png'; //default
	$sql = "insert into users (username, email, name, password, role, address, phone, gender, dateOfBirth, profilePicture) values(?,?,?,?,?,?,?,?,?,?)";

	if (isPreparedStatementExecuted($sql, 'ssssssssss', $username, $email, $name, $password, $role, $address, $phone, $gender, $dateOfBirth, $profilePicture)) {
		//SignUp Succ
		return 1;
	}
	return 0;
}

//function destroyLoginSession($token)
//{
//	global $session_txt;
//	$flag = false;
//	$sessionFile = fopen($session_txt, 'r');
//	$users = array();
//	while (!feof($sessionFile)) {
//		$data = fgets($sessionFile);
//		if ($data != "") {
//			$userToken = explode('|', $data);
//			if (trim($userToken[1]) != $token) {
//				array_push($users, $data);
//			} else {
//				$flag = true;
//			}
//		}
//	}
//	fclose($sessionFile);
//	$sessionFile = fopen($session_txt, 'w');
//
//	for ($i = 0; $i < count($users); ++$i) {
//		fwrite($sessionFile, $users[$i]);
//	}
//
//	return $flag;
//}
function destroyLoginSession($token)
{
	if (isPreparedStatementExecuted("delete from session where token=?", 's', $token)) {
		return true;
	}
	return false;
}
