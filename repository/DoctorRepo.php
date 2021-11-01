<?php

require_once('files.php');

$users_txt = getFsRootDir() . "users.txt";
$avDoctors_txt = getFsRootDir() . "availableDoctors.txt";

function getAvailableDoctorsId(){
    global $avDoctors_txt;
    $docs = array();
    $docFile = fopen($avDoctors_txt,'r');
    while(!feof($docFile)){
        $docId = fgets($docFile);
        if($docId!=""){
            array_push($docs,trim($docId));
        }
    }
    return $docs;
}

function toogleAvailability($id){
    global $avDoctors_txt;
    $docs = array();
    $isAvailable = false;
    $docFile = fopen($avDoctors_txt,'r');
    while(!feof($docFile)){
        $docId = fgets($docFile);
        if($docId!=""){
            if(trim($docId)==$id){
                $isAvailable = true;
            }
            else{
                array_push($docs,trim($docId));
            }
        }
    }
    fclose($docFile);
    if($isAvailable){
        $docFile = fopen($avDoctors_txt,'w');
        for($i=0;$i<count($docs);++$i){
            fwrite($docFile,$docs[$i]."\n");
        }
        fclose($docFile);
        return true;
    }
    else{
        $docFile = fopen($avDoctors_txt,'a');
        fwrite($docFile,$id."\n");
        fclose($docFile);
        return true;
    }
}