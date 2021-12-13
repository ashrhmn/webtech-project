<?php

require_once('../../repository/OrdersRepo.php');

$patientId = $_POST['patientId'];
$billId = $_POST['billId'];
$paidAmount = $_POST['paidAmount'];

if (createOrder($patientId, $billId, $paidAmount)) {
    header('location: ../../views/dashboard');
    return;
}
echo 'Adding order error';
return;
