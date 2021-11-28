<?php

// include(__DIR__ . 'app/views/dashboard/roles/admin/orders/secureRoute.php');
// 
?>

// <?php

    require_once('UserRepo.php');
    // require_once(__DIR__ . '../../../../../../repository/DoctorRepo.php');

    $patients = getAllUser();
    $availablePatientIds = getUserById($id);
    ?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php

    for ($i = 0; $i < count($patients); ++$i) {
    ?>
        <tr>
            <td><?= $patients[$i]['id'] ?></td>
            <td><?= $patients[$i]['name'] ?></td>
            <td><?= in_array($patients[$i]['id'], $availablePatientIds) ? 'Keep' : 'Discharge' ?></td>
            <td><a href="<?= "/app/controllers/admin/toogleDocAvailability.php?id=" . $patients[$i]['id'] ?>">Toogle</a></td>
        </tr>
    <?php
    }

    ?>
</table>