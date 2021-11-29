<?php

require_once(__DIR__ . '../../../../../repository/UserRepo.php');
$id = '';
$patients = getAllPatients();
$availablePatientIds = getPatientId($id);
?>
<table border="1" align="center">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Status</th>
        <th>Status</th>
        <style>
            th {
                background-color: #04AA6D;
                color: white;
            }
        </style>
    </tr>
    <?php

    for ($i = 0; $i < count($patients); ++$i) {
    ?>
        <tr>
            <td><?= $patients[$i]['id'] ?></td>
            <td><?= $patients[$i]['name'] ?></td>
            <td><?= in_array($patients[$i]['id'], $availablePatientIds) ? 'Keep' : 'Discharge' ?></td>
            <td><a href="<?= "/app/controllers/admin/togglePatientAvailability.php?id=" . $patients[$i]['id'] ?>">Change</a></td>
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