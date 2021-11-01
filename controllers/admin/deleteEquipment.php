<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['id'];

require_once('../../repository/EquipmentRepo.php');

if (deleteEquipment($id)) {
    header('location: ../../views/dashboard?tab=equipments');
    return;
}
echo 'Deleting equipment Error';
return;
