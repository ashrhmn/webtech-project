<?php

echo 'Admin Dashboard';

// include('manageUsers/index.php');

?>
<br>
<form action="#" method="POST">
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
