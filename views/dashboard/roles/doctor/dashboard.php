<?php

echo 'Doctor Dashboard' . "<br/>";


?>
<br>
<form action="#" method="POST">
    <a class="anchor" href="/app/views/dashboard/roles/doctor/patientList.php">Patient List</a>
    <a class="anchor" href="/app/views/dashboard/roles/doctor/patientStatus.php">Patient Status</a>
    <a class="anchor" href="/app/views/dashboard/roles/doctor/emergencyRequest.php">Emergency Requests</a>
    <a class="anchor" href="/app/views/dashboard/roles/doctor/OTschedules.php">OT Schedules</a>

    <style>
        .anchor {
            text-decoration: none;
            background-color: #f44336;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            border-radius: 25px;
            display: inline-block;
        }

        .anchor:hover {
            background-color: blue;
        }
    </style>
</form>

<hr>


<?php

if (isset($_GET['tab'])) {
    include($_GET['tab'] . '/index.php');
    return;
}
