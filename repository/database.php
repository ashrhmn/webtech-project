<?php
mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
//mysqli_report(MYSQLI_REPORT_INDEX);
function alertMsg($msg)
{
	echo '<script>alert("' . $msg . '")</script>';
}

function getConnection()
{
	$db_host = 'db';
	// $db_port = 3307;
	$db_name = 'dcms';
	$db_user = 'dcms';
	$db_password = 'ash';
	$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
	if ($connection->connect_error) {
		die('Connection Failed' . $connection->connect_error);
	}
	return $connection;
}

function mutate($sql)
{
	$con = getConnection();
	if ($con->query($sql) === TRUE) {
		return true;
	}
	alertMsg($con->error);
	return false;
}

function query($sql)
{
	try {
		$con = getConnection();
		return $con->query($sql);
	} catch (Exception $error) {
		alertMsg($error->getMessage());
		return null;
	}
}
function queryToAssocArray($sql)
{
	try {
		$con = getConnection();
		return $con->query($sql)->fetch_all(MYSQLI_ASSOC);
	} catch (Exception $error) {
		alertMsg($error->getMessage());
		return null;
	}
}


function dataExistsOnQuery($sql)
{
	$result = query($sql);
	if (!$result) {
		return false;
	}
	if ($result->num_rows > 0) {
		return true;
	} else {
		return false;
	}
}

function execPreparedStatement($sql, $types, ...$args)
{
	try {
		$con = getConnection();
		$stm = $con->prepare($sql);
		$stm->bind_param($types, ...$args);
		$stm->execute();
		return $stm;
	} catch (Exception $error) {
		alertMsg($error->getMessage());
		return null;
	}
}

function isPreparedStatementExecuted($sql, $types, ...$args)
{
	$stm = execPreparedStatement($sql, $types, ...$args);
	if (!$stm) {
		return false;
	}
	if ($stm->affected_rows < 1) {
		return false;
	}
	return true;
}

function execPreparedQuery($sql, $types, ...$args)
{
	try {
		$con = getConnection();
		$stm = $con->prepare($sql);
		$stm->bind_param($types, ...$args);
		$stm->execute();
		return $stm->get_result();
	} catch (Exception $error) {
		alertMsg($error->getMessage());
		return null;
	}
}

function preparedQueryToAssocArray($sql, $types, ...$args)
{
	$result = execPreparedQuery($sql, $types, ...$args);
	if (!$result) {
		return null;
	}
	return $result->fetch_all(MYSQLI_ASSOC);
}

function dataExistsOnPreparedQuery($sql, $types, ...$args)
{
	$res_array = preparedQueryToAssocArray($sql, $types, ...$args);
	if (count($res_array) > 0) {
		return true;
	}
	return false;
}

function getSingleRowIfExistsOnPreparedQuery($sql, $types, ...$args)
{
	$rows = preparedQueryToAssocArray($sql, $types, ...$args);
	if (count($rows) > 0) {
		return $rows[0];
	}
	return null;
}

//$sql = "insert into session(userId, token, agent, time) values(?,?,?,?)";
//
////$con = getConnection();
//
//
////$st = $con->prepare("insert into session(userId, token, agent, time) values(?,?,?,?)");
//
//$userId = 11;
//$token = "uascnljasnlcjhwenoiucweoi";
//$agent = "Mozilla funfox";
//$time = (new DateTime('NOW'))->format('c');
////
////$st->bind_param('isss',$userId,$token,$agent,$time);
$un = 'Male';
$sql2 = "select * from users where gender=?";
//
//$stm = execPreparedStatement($sql2,'s',$un);
$res = dataExistsOnPreparedQuery($sql2, 's', $un);
//print_r($res);

//echo 'Here';

//$st = execPreparedStatement($sql,'isss',$userId,$token,$agent,$time);
//print_r(isPreparedStatementExecuted($sql,'isss',$userId,$token,$agent,$time));
//$st->execute();
//if($st===TRUE){
//	echo 'T';
//}
//else{
//	echo '<script>alert("'.$con->error.'")</script>';
//}
//print_r($st);

//mutate("insert into session(userId,token,agent,time) values(11,'222222qw','qcqwmozila','".(new DateTime('NOW'))->format('c')."')");
