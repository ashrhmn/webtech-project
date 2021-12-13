<?php

require_once('../../repository/UserRepo.php');

$patients = getAllPatient();

echo json_encode($patients);
