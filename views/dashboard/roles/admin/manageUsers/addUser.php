<?php
echo 'Add user';
?>
<form action="../../../../../controllers/admin/addUser.php" method="POST">
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
            <td>Gender</td>
            <td>
                <input type="radio" name="gender" value="Male" checked>Male
                <input type="radio" name="gender" value="Female">Female
                <input type="radio" name="gender" value="Other">Other
            </td>
        </tr>
        <tr>
            <td>User Type</td>
            <td>
                <select name="role">
                    <option value="Patient">Patient</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Employee">Employee</option>
                    <option value="Admin">Admin</option>
                </select>
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
            <td align="center" colspan="2"><input type="submit" name="addNewUser" value="Add User"></td>
        </tr>
    </table>
</form>