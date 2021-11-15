<?php

require_once('AuthRepo.php');
require_once('database.php');

function changePassword($oldPassword, $newpassword) //notAuthenticated=-1, wrongPassword=0, successfull=1, serverError=-2, userNotFound = -3
{
	$userId = getLoggedInUserId();
	if (!$userId) {
		return -1;
	}

	$row = getSingleRowIfExistsOnPreparedQuery("select * from users where id=?", 'i', $userId);
	if ($row) {
		if ($row['password'] == $oldPassword) {
			if (isPreparedStatementExecuted("update users set password=? where id=?", 'si', $newpassword, $userId)) {
				//changeSuccessfull
				return 1;
			}
			//serverError
			return -2;
		}
		//wrongPassword
		return 0;
	}
	//userNotFound
	return -3;
}

function getAllSession()
{
	$userId = getLoggedInUserId();
	if (!$userId) {
		return null;
	}
	return preparedQueryToAssocArray("select * from session where userId=?", 'i', $userId);
}


function deleteSession($token) // notAuthenticated = -1, notAuthorized = 0, deleteSuccess = 1
{
	$userId = getLoggedInUserId();
	if (!$userId) {
		return -1;
	}

	if (isPreparedStatementExecuted("delete from session where token=? and userId=?", 'si', $token, $userId)) {
		return 1;
	}
	return 0;
}
