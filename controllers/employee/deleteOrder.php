<?php

require_once('../../repository/OrdersRepo.php');

if(deleteOrderById($_GET['id'])){
    header('location: ../../views/dashboard');
    return;
}
echo 'Deleting order error';
return;
