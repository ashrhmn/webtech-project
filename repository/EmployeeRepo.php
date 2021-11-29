<?php

require_once('database.php');

function getAllBill(){
	return queryToAssocArray("select * from bills");
}