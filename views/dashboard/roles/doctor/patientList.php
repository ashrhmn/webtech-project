<?php

require_once(__DIR__ . '../../../../../repository/UserRepo.php');

$allUsers = getAllPatients();
?>
<table border="1" align="center">
    <tr>
        <th colspan="10" align="center">Patient List</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Name</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Date Of Birth</th>
        <th>Phone</th>
        <th>Action</th>
        <style>
            th {
                background-color: #04AA6D;
                color: white;
            }
        </style>
    </tr>
    <?php

    for ($i = 0; $i < count($allUsers); ++$i) {
    ?>
        <tr>
            <td><?= $allUsers[$i]['id'] ?></td>
            <td><?= $allUsers[$i]['username'] ?></td>
            <td><?= $allUsers[$i]['email'] ?></td>
            <td><?= $allUsers[$i]['name'] ?></td>
            <td><?= $allUsers[$i]['address'] ?></td>
            <td><?= $allUsers[$i]['gender'] ?></td>
            <td><?= $allUsers[$i]['dateOfBirth'] ?></td>
            <td><?= $allUsers[$i]['phone'] ?></td>
            <td>
                <a href="<?= "/app/views/dashboard/roles/admin/manageUsers/editUser.php?id=" . $allUsers[$i]['id'] ?>">Edit</a> |
                <a href="<?= "/app/controllers/admin/deleteUser.php?id=" . $allUsers[$i]['id'] ?>">Delete</a>
            </td>
            <style>
                a {
                    text-decoration: none;
                }
            </style>
        </tr>
    <?php
    }
    ?>
</table>