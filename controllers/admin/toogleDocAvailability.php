<?php

$id = $_GET['id'];

if(!$id){
    echo 'Invalid ID';
    return;
}

require_once('../../repository/DoctorRepo.php');

toogleAvailability($id);

header('location: ../../views/dashboard?tab=availableDoctors');