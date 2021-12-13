<?php

require_once('database.php');

function getAllBill()
{
	return queryToAssocArray("select * from bills");
}

function getBillById($id)
{
	return getSingleRowIfExistsOnPreparedQuery('select * from bills where id=?', 'i', $id);
}

function createBill($name, $price, $num)
{
	return isPreparedStatementExecuted("insert into bills (testName, testPrice, numOfTests) values (?,?,?)", 'sdi', $name, $price, $num);
}

function saveBillEdits($id, $name, $price, $num)
{
	return isPreparedStatementExecuted("update bills set testName=?, testPrice=?, numOfTests=? where id=?", 'sdii', $name, $price, $num, $id);
}

function deleteBill($id)
{
	return isPreparedStatementExecuted('delete from bills where id=?', 'i', $id);
}
