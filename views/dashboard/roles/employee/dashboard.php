<?php

echo 'Employee Dashboard';


require('secureRoute.php');

// include('manageUsers/index.php');

?>
<br>
<form action="#" method="POST">
    <a href="?tab=appointment">Appointment</a>
    <a href="?tab=createbill">Create Bill</a>
    <a href="?tab=createbill2">Create Bill</a>
</form>

<hr>

<?php

if (isset($_GET['tab'])) {
    include($_GET['tab'].'/index.php');
    return;
}
include('appointment/index.php');
?>
<!-- <a href="../../../../../views/dashboard/roles/employee/createbill.php"> Bill</a>
<a href="appointment.php">Patient Appointment</a> -->
