<?php

require_once('../../repository/OrdersRepo.php');

$orders = getAllOrders();

echo json_encode($orders);
