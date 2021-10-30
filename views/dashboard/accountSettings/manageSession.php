<?php

echo 'Manage Session';

require_once('../../repository/SettingsRepo.php');

$sessions = getAllSession();

if (!$sessions) {
    echo 'Not authenticated';
    return;
}
?>

<table>
    <?php
    for ($i = 0; $i < count($sessions); ++$i) {
    ?>
        <tr>
            <td><?= $sessions[$i]['token'] ?><?= $sessions[$i]['token'] == $_COOKIE['token'] ? ' (current) ' : ''  ?> <br> <?= $sessions[$i]['agent'] ?></td>
            <td><a href="../../../controllers/AccountSettings/deleteSession.php?token=<?= $sessions[$i]['token'] ?>">Revoke</a></td>
        </tr>
    <?php
    }
    ?>
</table>