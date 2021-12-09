<?php

include_once('secureRoute.php');


?>

<style>
    nav {
        display: flex;
        align-items: center;
        height: 100px;
        background-color: #d7dae0;
        position: fixed;
        top: 0;
        right: 0;
        width: 100%;
        justify-content: end;
    }

    nav>a {
        text-decoration: none;
        background-color: #2478f1;
        padding: 2px 5px;
        margin: 0 10px;
        /* color: #58609a; */
        border-radius: 5px;
    }

    nav>a:hover {
        /* background-color: #9fa1ab; */
        background-color: #1a54d7;
        /* color: #2a47fb; */
        transition: all linear 0.15s;
    }

    #dashboardView {
        margin-top: 100px;
        background-color: #fff;
		margin-left: 30px;
		margin-right: 30px;
        border-radius: 15px;
        padding: 15px;
        box-shadow:
            0.3px 0.4px 0.5px -1px rgba(0, 0, 0, 0.017),
            0.7px 0.9px 1px -1px rgba(0, 0, 0, 0.025),
            1.2px 1.5px 1.7px -1px rgba(0, 0, 0, 0.031),
            1.8px 2.3px 2.6px -1px rgba(0, 0, 0, 0.035),
            2.6px 3.3px 3.8px -1px rgba(0, 0, 0, 0.04),
            3.7px 4.6px 5.3px -1px rgba(0, 0, 0, 0.045),
            5.3px 6.5px 7.5px -1px rgba(0, 0, 0, 0.049),
            7.7px 9.5px 11px -1px rgba(0, 0, 0, 0.055),
            11.8px 14.6px 16.9px -1px rgba(0, 0, 0, 0.063),
            21px 26px 30px -1px rgba(0, 0, 0, 0.08);
    }
</style>
<br>
<form action="#" method="POST">
    <nav>
        <a href="?tab=manageUsers">Users</a>
        <a href="?tab=equipments">Equipments</a>
        <a href="?tab=orders">Orders</a>
        <a href="?tab=availableDoctors">Available Doctors</a>
    </nav>
</form>

<div id="dashboardView">
    <?php

    if (isset($_GET['tab'])) {
        include($_GET['tab'] . '/index.php');
        return;
    }
    include('manageUsers/index.php');
    ?>
</div>