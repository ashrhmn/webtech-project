<?php

require_once('database.php');

function getAllBill(){
	return queryToAssocArray("select * from bills");
}

function createBill($name, $price, $num){
	return isPreparedStatementExecuted("insert into bills (testName, testPrice, numOfTests) values (?,?,?)",'sdi',$name,$price,$num);
}