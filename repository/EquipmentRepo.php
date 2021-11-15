<?php

require_once('files.php');
require_once('database.php');

$equipment_txt = getFsRootDir() . "equipments.txt";


//function addEquipment($name, $count)
//{
//    global $equipment_txt;
//    $eqFile = fopen($equipment_txt, 'a');
//    $id = time() . '-' . strtolower($name);
//    if (!fwrite($eqFile, $id . '|' . $name . '|' . $count . "\n")) {
//        return false;
//    }
//    return true;
//}
function addEquipment($name, $count)
{
	return isPreparedStatementExecuted("insert into equipments (name, count) values (?,?)", 'si', $name, $count);
}


//function getAllEquipments()
//{
//    global $equipment_txt;
//    $eqFile = fopen($equipment_txt, 'r');
//    $eqs = array();
//    while (!feof($eqFile)) {
//        $data = fgets($eqFile);
//        if ($data != "") {
//            $eq = explode('|', $data);
//            array_push($eqs, array('id' => $eq[0], 'name' => $eq[1], 'count' => $eq[2]));
//        }
//    }
//    return $eqs;
//}
function getAllEquipments()
{
	return queryToAssocArray("select * from equipments");
}


//function deleteEquipment($id)
//{
//	global $equipment_txt;
//	$eqFile = fopen($equipment_txt, 'r');
//	$eqs = array();
//	$isEqFound = false;
//	while (!feof($eqFile)) {
//		$data = fgets($eqFile);
//		if ($data != "") {
//			$eq = explode('|', $data);
//			if ($id == $eq[0]) {
//				$isEqFound = true;
//			} else {
//				array_push($eqs, trim($data));
//			}
//		}
//	}
//	fclose($eqFile);
//	if (!$isEqFound) {
//		echo 'Selected equipment not found';
//		return false;
//	}
//	$eqFile = fopen($equipment_txt, 'w');
//	for ($i = 0; $i < count($eqs); ++$i) {
//		fwrite($eqFile, $eqs[$i] . "\n");
//	}
//	return true;
//}
function deleteEquipment($id)
{
	return isPreparedStatementExecuted("delete from equipments where id=?", 'i', $id);
}


//function getEquipmentById($id)
//{
//	global $equipment_txt;
//	$eqsFile = fopen($equipment_txt, 'r');
//	while (!feof($eqsFile)) {
//		$data = fgets($eqsFile);
//		if ($data != "") {
//			$user = explode('|', $data);
//			if (trim($user[0]) == $id) {
//				return array('id' => $user[0], 'name' => $user[1], 'count' => $user[2]);
//			}
//		}
//	}
//	return null;
//}
function getEquipmentById($id)
{
	return getSingleRowIfExistsOnPreparedQuery("select * from equipments where id=?", 'i', $id);
}


//function saveEquipmentEdis($id, $name, $count)
//{
//	global $equipment_txt;
//	$eqFile = fopen($equipment_txt, 'r');
//	$eqs = array();
//	$isEqFound = false;
//	while (!feof($eqFile)) {
//		$data = fgets($eqFile);
//		if ($data != "") {
//			$eq = explode('|', $data);
//			if ($id == $eq[0]) {
//				array_push($eqs, $id . '|' . $name . '|' . $count);
//				$isEqFound = true;
//			} else {
//				array_push($eqs, trim($data));
//			}
//		}
//	}
//	fclose($eqFile);
//	if (!$isEqFound) {
//		echo 'Selected equipment not found';
//		return false;
//	}
//	$eqFile = fopen($equipment_txt, 'w');
//	for ($i = 0; $i < count($eqs); ++$i) {
//		fwrite($eqFile, $eqs[$i] . "\n");
//	}
//	return true;
//}
function saveEquipmentEdis($id, $name, $count)
{
	return isPreparedStatementExecuted("update equipments set name=?, count=? where id=?", 'sii', $name, $count, $id);
}

