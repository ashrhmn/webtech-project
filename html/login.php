<?php

include("nav.php");
echo 'Login Page';

?>

<form action="../handlers/login.php" method="POST">
    <table>
        <tr>
            <td>Username or Email</td>
            <td><input type="text" name="usernameOrEmail"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password"></td>
        </tr>
        <tr>
            <td><a href="signup.php">Sign Up</a></td>
            <td><input type="submit" name="login" value="Login"></td>
        </tr>
    </table>
</form>