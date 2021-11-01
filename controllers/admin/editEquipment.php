<?php

$id = $_POST['id'];
$name = $_POST['name'];
$count = $_POST['count']+0;


require_once('../../repository/EquipmentRepo.php');

if (saveEquipmentEdis($id,$name,$count)) {
    header('location: ../../views/dashboard?tab=equipments');
    return;
}
echo 'Editing Error';
return;
