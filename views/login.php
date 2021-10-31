<?php

require_once('../repository/AuthRepo.php');

if (isUserLoggedIn()) {
    header('location: dashboard');
    return;
}

include("nav.php");
echo 'Login Page';

?>

<form action="../controllers/login.php" method="POST">
    <table>
        <tr>
            <td>Username or Email</td>
            <td><input type="text" name="usernameOrEmail"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><a href="signup.php">Sign Up</a></td>
            <td><input type="submit" name="login" value="Login"></td>
        </tr>
    </table>
</form>