<?php

require_once('../repository/AuthRepo.php');

if (isUserLoggedIn()) {
    header('location: dashboard');
    return;
}

include("nav.php");
?>

<form action="../controllers/signup.php" method="POST">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td>Full Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Pasword</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td><input type="password" name="password2"></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
                <input type="radio" name="gender" value="Male" checked>Male
                <input type="radio" name="gender" value="Female">Female
                <input type="radio" name="gender" value="Other">Other
            </td>
        </tr>
        <tr>
            <td>Date Of Birth</td>
            <td><input type="date" name="dateOfBirth"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone"></td>
        </tr>
        <tr>
            <td><a href="login.php">Login</a></td>
            <td><input type="submit" name="signup" value="Sign Up"></td>
        </tr>
    </table>
</form>