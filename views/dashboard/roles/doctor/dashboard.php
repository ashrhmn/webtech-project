<?php

echo 'Doctor Dashboard';


?>
<br>
<form action="#" method="POST">
    <a href="/app/views/dashboard/roles/doctor/patientList.php">Patient List</a> |
    <a href="/app/views/dashboard/roles/doctor/patientStatus.php">Patient Status</a> |
    <a href="/app/views/dashboard/roles/doctor/emergencyRequest.php">Emergency Requests</a> |
    <a href="/app/views/dashboard/roles/doctor/OTschedules.php">OT Schedules</a>
</form>

<hr>

<?php

if (isset($_GET['tab'])) {
    include($_GET['tab'] . '/index.php');
    return;
}
