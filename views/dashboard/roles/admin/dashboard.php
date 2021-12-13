<?php

include_once('secureRoute.php');


?>

<style>
    nav {
        display: flex;
        align-items: center;
        height: 100px;
        /* background-color: #d7dae0; */
        background-color: #ccd0d8;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        justify-content: center;
    }

    nav>a {
        text-decoration: none;
        background-color: #2478f1;
        padding: 10px 50px;
        margin: 0 10px;
        /* color: #58609a; */
        color: #eff2ff;
        border-radius: 5px;
    }

    nav>a:hover {
        /* background-color: #9fa1ab; */
        background-color: #1a54d7;
        /* color: #2a47fb; */
        transition: all linear 0.15s;
    }

    #dashboardView {
        margin-top: 200px;
        background-color: #fff;
        margin-left: 30px;
        margin-right: 30px;
        border-radius: 10px;
        padding: 15px;
        overflow: scroll;
        box-shadow:
            1.4px 1px 2.8px -37px rgba(0, 0, 0, 0.024),
            3.9px 2.6px 7.8px -37px rgba(0, 0, 0, 0.035),
            9.3px 6.3px 18.7px -37px rgba(0, 0, 0, 0.046),
            31px 21px 62px -37px rgba(0, 0, 0, 0.07);
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