<?php

require_once(__DIR__ . '../../../../../repository/UserRepo.php');

$allUsers = OTpatients();
?>
<table border="1">
    <tr>
        <th colspan="10" align="center">OT Patients List</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Name</th>
        <th>Emergency</th>
        <th>Gender</th>
        <th>Operation Date</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>
    <?php

    for ($i = 0; $i < count($allUsers); ++$i) {
    ?>
        <tr>
            <td><?= $allUsers[$i]['id'] ?></td>
            <td><?= $allUsers[$i]['username'] ?></td>
            <td><?= $allUsers[$i]['name'] ?></td>
            <td><?= $allUsers[$i]['emergency'] ?></td>
            <td><?= $allUsers[$i]['gender'] ?></td>
            <td><?= $allUsers[$i]['OPdate'] ?></td>
            <td><?= $allUsers[$i]['phone'] ?></td>
            <td>
                <a href="<?= "/app/views/dashboard/roles/admin/manageUsers/editUser.php?id=" . $allUsers[$i]['id'] ?>">Edit</a> |
                <a href="<?= "/app/controllers/admin/deleteUser.php?id=" . $allUsers[$i]['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>