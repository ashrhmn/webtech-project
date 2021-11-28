<?php

require_once(__DIR__ . '../../../../../repository/UserRepo.php');

$allUsers = emergencyPatients();
?>
<table border="1">
    <tr>
        <th colspan="10" align="center">Patient List</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Emergency</th>
        <th>Gender</th>
        <th>Date Of Birth</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>
    <?php

    for ($i = 0; $i < count($allUsers); ++$i) {
    ?>
        <tr>
            <td><?= $allUsers[$i]['id'] ?></td>
            <td><?= $allUsers[$i]['name'] ?></td>
            <td><?= $allUsers[$i]['emergency'] ?></td>
            <td><?= $allUsers[$i]['gender'] ?></td>
            <td><?= $allUsers[$i]['dateOfBirth'] ?></td>
            <td><?= $allUsers[$i]['phone'] ?></td>
            <td>
                <a href="<?= "/app/views/dashboard/roles/admin/manageUsers/approveUser.php?id=" . $allUsers[$i]['id'] ?>">Approve</a> |
                <a href="<?= "/app/views/dashboard/roles/admin/manageUsers/declineUser.php?id=" . $allUsers[$i]['id'] ?>">Decline</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>