<?php

echo 'Doctor Dashboard' . "<br/>";


?>
<br>


<form action="#" method="POST">
    <a class="anchor" href="/app/views/dashboard/roles/doctor/patientList.php">Patient List</a>
    <a class="anchor" href="/app/views/dashboard/roles/doctor/patientStatus.php">Patient Status</a>
    <a class="anchor" href="/app/views/dashboard/roles/doctor/emergencyRequest.php">Emergency Requests</a>
    <a class="anchor" href="/app/views/dashboard/roles/doctor/OTschedules.php">OT Schedules</a>

</form>

<hr>

<header>
    <div class="wrapper">
        <div class="welcome-text">
            <h3>
                Welcome To <span>Dashboard!</span></h3>

        </div>
</header>


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

    .wrapper {
        width: 1170px;
        margin: auto;
    }

    .welcome-text {
        /* position: absolute; */
        width: 600px;
        height: 300px;
        margin: 20% 30%;
        text-align: center;
        margin-left: 300px;
    }

    .welcome-text h3 {
        text-align: center;
        color: black;
        text-transform: uppercase;
        font-size: 60px;
    }

    .welcome-text h3 span {
        color: grey;
    }

    @media (max-width:600px) {
        .wrapper {
            width: 100%;
        }

        .welcome-text {
            width: 100%;
            height: auto;
            margin: 30% 0;
        }

        .welcome-text h1 {
            font-size: 30px;
        }
    }
</style>


<?php

if (isset($_GET['tab'])) {
    include($_GET['tab'] . '/index.php');
    return;
}
