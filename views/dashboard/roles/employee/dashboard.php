<?php

echo 'Employee Dashboard';


require('secureRoute.php');

?>
<br>
<form action="#" method="POST">
    <a href="?tab=orders">Orders</a>
    <a href="?tab=createOrder">Create Order</a>
    <a href="?tab=billList">Bill List</a>
    <a href="?tab=createbill">Create Bill</a>
    <a href="?tab=appointment">Appointment</a>
</form>

<hr>

<?php

if (isset($_GET['tab'])) {
    include($_GET['tab'].'/index.php');
    return;
}
include('orders/index.php');
?>