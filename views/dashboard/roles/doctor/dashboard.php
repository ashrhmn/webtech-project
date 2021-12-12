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
        /* .anchor {
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
        } */
        .anchor:link,
        .anchor:visited {
            margin: 2px;
            padding: 2px;
            color: white;
            background-color: #1ebba3;
            display: inline-block;
            padding: 10px 20px;
            border: 2px solid #099983;
            text-decoration: none;
            text-align: center;
            font: 14px Arial, sans-serif;
        }

        .anchor:hover,
        .anchor:active {
            background-color: #9c6ae1;
            border-color: #7443b6;
        }
    </style>
</form>

<hr>


<?php

if (isset($_GET['tab'])) {
    include($_GET['tab'] . '/index.php');
    return;
}
