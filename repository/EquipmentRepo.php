<?php

require_once('database.php');

function addEquipment($name, $count)
{
	return isPreparedStatementExecuted("insert into equipments (name, count) values (?,?)", 'si', $name, $count);
}
function getAllEquipments()
{
	return queryToAssocArray("select * from equipments");
}
function deleteEquipment($id)
{
	return isPreparedStatementExecuted("delete from equipments where id=?", 'i', $id);
}
function getEquipmentById($id)
{
	return getSingleRowIfExistsOnPreparedQuery("select * from equipments where id=?", 'i', $id);
}
function saveEquipmentEdis($id, $name, $count)
{
	return isPreparedStatementExecuted("update equipments set name=?, count=? where id=?", 'sii', $name, $count, $id);
}

