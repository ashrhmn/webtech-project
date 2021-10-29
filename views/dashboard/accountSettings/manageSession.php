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
            <td><?= $sessions[$i] ?><?= $sessions[$i]==$_COOKIE['token']?' (current) ':''  ?></td>
            <td><a href="../../../controllers/AccountSettings/deleteSession.php?token=<?= $sessions[$i] ?>">Revoke</a></td>
        </tr>
    <?php
    }
    ?>
</table>