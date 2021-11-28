<?php

$id = $_GET['id'];

if (!$id) {
    echo 'Invalid ID';
    return;
}

require_once('../../repository/UserRepo.php');

toogleAvailabilityPatient($id);

header('location: /app/views/dashboard/roles/doctor/patientStatus.php');
