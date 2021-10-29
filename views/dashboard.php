<?php

require_once('../repository/AuthRepo.php');

$user = getLoggedInUser();

if ($user) {
    print_r($user);
?>

    <h1>Welcome <?= $user['name'] ?></h1>
    <a href="accountSettings">Account Settings</a>
    
    <?php
    include('./roles/' . strtolower($user['role']) . '/dashboard.php');
    ?>


    <a href="../controllers/logout.php">Logout</a>

<?php
    return;
}
setcookie('token', null, -1, '/');
header('location: login.php');
