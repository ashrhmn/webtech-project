<?php

include_once('secureRoute.php');


?>

<style>
    nav {
        display: flex;
        align-items: center;
        height: 100px;
        /* background-color: #1727fa; */
        position: absolute;
        top: 0;
        left: 250;
        width: 100%;
    }

    nav>a {
        text-decoration: none;
        background-color: #2478f1;
        padding: 2px 5px;
        margin: 0 10px;
        color: white;
        border-radius: 5px;
    }
    #dashboardView{
        margin-top: 100px;
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
    <hr>
    <?php

    if (isset($_GET['tab'])) {
        include($_GET['tab'] . '/index.php');
        return;
    }
    include('manageUsers/index.php');
    ?>
</div>