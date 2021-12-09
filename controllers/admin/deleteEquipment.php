<?php

$id = $_GET['id'];

require_once('../../repository/EquipmentRepo.php');

if (deleteEquipment($id)) {
    header('location: ../../views/dashboard?tab=equipments');
    return;
}
echo 'Deleting equipment Error';
return;
