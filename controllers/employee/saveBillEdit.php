<?php

$id = $_GET['id'];
$name = $_POST['test'];
$numoftest = $_POST['numoftest'];
$test_price = $_POST['test_price'];


require_once('../../repository/EmployeeRepo.php');

if (saveBillEdits($name, $test_price, $numoftest, $id)) {
    header('location: ../../views/dashboard');
    return;
}
echo 'Saving bill error';
return;
