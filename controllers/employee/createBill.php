<?php

$name = $_POST['test'];
$numoftest = $_POST['numoftest'];
$test_price = $_POST['test_price'];


require_once('../../repository/EmployeeRepo.php');

if(createBill($name,$test_price, $numoftest)){
    header('location: ../../views/dashboard');
    return;
}
echo 'Adding bill error';
return;