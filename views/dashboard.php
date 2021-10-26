<?php

require_once('../repository/UserRepo.php');

$user = getLoggedInUser();

if ($user) {
    print_r($user);
    include('./roles/' . strtolower($user['role']) . '/dashboard.php');
?>

<a href="../controllers/logout.php">Logout</a>

<?php
    return;
}
setcookie('token', null, -1, '/');
header('location: login.php');
