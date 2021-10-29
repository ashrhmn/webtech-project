<?php

require_once('../../repository/AuthRepo.php');

$user = getLoggedInUser();

if ($user) {
?>
    <ul>
        <li><a href="">Edit Profile</a></li>
        <li><a href="">Change Password</a></li>
        <li><a href="">Manage Session</a></li>
    </ul>
<?php
    return;
}
header('location: login.php');
