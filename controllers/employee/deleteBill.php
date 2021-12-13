<?php

$id = $_GET['id'];


require_once('../../repository/EmployeeRepo.php');

if (deleteBill($id)) {
    header('location: ../../views/dashboard');
    return;
}
echo 'Deleting bill error';
return;
