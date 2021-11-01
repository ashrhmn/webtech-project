<?php

echo 'Admin Dashboard';

// include('manageUsers/index.php');

?>
<br>
<form action="#" method="POST">
    <!-- <input type="submit" name="manageEquipments" value="Equipments">
    <input type="submit" name="manageOrders" value="Orders">
    <input type="submit" name="manageAvailableDoctors" value="Available Doctors"> -->

    <a href="?tab=manageUsers">Users</a>
    <a href="?tab=equipments">Equipments</a>
    <a href="?tab=orders">Orders</a>
    <a href="?tab=availableDoctors">Available Doctors</a>
</form>

<hr>

<?php

if (isset($_GET['tab'])) {
    include($_GET['tab'].'/index.php');
    return;
}
include('manageUsers/index.php');
