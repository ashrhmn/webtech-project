<?php

include_once(__DIR__.'/../secureRoute.php');

$id = $_GET['id'];

if (!$id) {
    echo 'Invalid ID';
    return;
}

require_once(__DIR__ . '/../../../../../repository/UserRepo.php');

$user = getUserById($id);

if (!$user) {
    echo 'User not found with id=' . $id;
    return;
}

?>

<form action="../../../../../controllers/admin/editUser.php" method="POST">
    <table border="1">
        <tr>
            <td>ID</td>
            <td><input type="text" name="id" value="<?= $user['id'] ?>" readonly></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" value="<?= $user['username'] ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" value="<?= $user['email'] ?>"></td>
        </tr>
        <tr>
            <td>Full Name</td>
            <td><input type="text" name="name" value="<?= $user['name'] ?>"></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>
                <input type="radio" name="gender" value="Male" <?=$user['gender']=='Male'?'checked':''?>>Male
                <input type="radio" name="gender" value="Female" <?=$user['gender']=='Female'?'checked':''?>>Female
                <input type="radio" name="gender" value="Other" <?=$user['gender']=='Other'?'checked':''?>>Other
            </td>
        </tr>
        <tr>
            <td>User Type</td>
            <td>
                <select name="role">
                    <option value="Patient" <?= $user['role'] == 'Patient' ? 'selected' : '' ?>>Patient</option>
                    <option value="Doctor" <?= $user['role'] == 'Doctor' ? 'selected' : '' ?>>Doctor</option>
                    <option value="Employee" <?= $user['role'] == 'Employee' ? 'selected' : '' ?>>Employee</option>
                    <option value="Admin" <?= $user['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Date Of Birth</td>
            <td><input type="date" name="dateOfBirth" value="<?= $user['dateOfBirth'] ?>"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?= $user['address'] ?>"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone" value="<?= $user['phone'] ?>"></td>
        </tr>
        <tr>
            <td align="center"><a href="../../../../dashboard/">Go Back</a></td>
            <td align="center"><input type="submit" name="editUser" value="Save Edit"></td>
        </tr>
    </table>
</form>