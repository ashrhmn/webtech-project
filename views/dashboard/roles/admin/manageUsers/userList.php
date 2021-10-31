<table border="1">
    <tr>
        <th colspan="10" align="center">All Users</th>
    </tr>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Name</th>
        <th>Role</th>
        <th>Address</th>
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
            <td><?= $allUsers[$i]['username'] ?></td>
            <td><?= $allUsers[$i]['email'] ?></td>
            <td><?= $allUsers[$i]['name'] ?></td>
            <td><?= $allUsers[$i]['role'] ?></td>
            <td><?= $allUsers[$i]['address'] ?></td>
            <td><?= $allUsers[$i]['gender'] ?></td>
            <td><?= $allUsers[$i]['dateOfBirth'] ?></td>
            <td><?= $allUsers[$i]['phone'] ?></td>
            <td>
                <a href="<?= "roles/admin/manageUsers/editUser.php?id=" . $allUsers[$i]['id'] ?>">Edit</a>
                <a href="<?= "/../../../../../controllers/admin/deleteUser.php?id=" . $allUsers[$i]['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>