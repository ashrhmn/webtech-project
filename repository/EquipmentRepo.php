<?php

require_once('files.php');

$equipment_txt = getFsRootDir() . "equipments.txt";

function addEquipment($name, $count){
    global $equipment_txt;
    $eqFile = fopen($equipment_txt,'a');
    $id = time().'-'.strtolower($name);
    if(!fwrite($eqFile,$id.'|'.$name.'|'.$count."\n")){
        return false;
    }
    return true;
}

function getAllEquipments(){
    global $equipment_txt;
    $eqFile = fopen($equipment_txt,'r');
    $eqs = array();
    while(!feof($eqFile)){
        $data = fgets($eqFile);
        if($data!=""){
            $eq = explode('|',$data);
            array_push($eqs,array('id'=>$eq[0],'name'=>$eq[1],'count'=>$eq[2]));
        }
    }
    return $eqs;
}

function deleteEquipment($id){
    global $equipment_txt;
    $eqFile = fopen($equipment_txt,'r');
    $eqs = array();
    $isEqFound = false;
    while(!feof($eqFile)){
        $data = fgets($eqFile);
        if($data!=""){
            $eq = explode('|',$data);
            if($id==$eq[0]){
                $isEqFound = true;
            }
            else{
                array_push($eqs,trim($data));
            }
        }
    }
    fclose($eqFile);
    if(!$isEqFound){
        echo 'Selected equipment not found';
        return false;
    }
    $eqFile = fopen($equipment_txt,'w');
    for($i=0;$i<count($eqs);++$i){
        fwrite($eqFile,$eqs[$i]."\n");
    }
    return true;

}