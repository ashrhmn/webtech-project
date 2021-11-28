<?php

echo 'Doctor Dashboard';


?>
<br>
<form action="#" method="POST">
    <a href="/app/views/dashboard/roles/doctor/patientList.php">Patient List</a>
    <a href="/app/views/dashboard/roles/doctor/patientStatus.php">Patient Status</a>
    <a href="?tab=orders">Orders</a>
    <a href="?tab=availableDoctors">Available Doctors</a>
</form>

<hr>

<?php

if (isset($_GET['tab'])) {
    include($_GET['tab'] . '/index.php');
    return;
}
