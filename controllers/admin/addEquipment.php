<?php

if(isset($_POST['addEquipment'])){
    $name = $_POST['equipmentName'];
    if($name==""){
        echo 'Name can not be empty';
        return;
    }
    $count = $_POST['equipmentCount'];
    if(!is_numeric($count)){
        echo 'Count has to be a number';
        return;
    }

    // echo $name;

    require_once('../../repository/EquipmentRepo.php');

    $status = addEquipment($name, $count);

    // echo $status;

    if($status){
        header('location: ../../views/dashboard?tab=equipments');
        return;
    }

    echo 'Adding failed';
    return;
}
echo 'submission error';