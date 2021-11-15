<?php

echo 'Manage Session';

require_once('../../repository/SettingsRepo.php');

$sessions = getAllSession();

if (!$sessions) {
	echo 'Not authenticated';
	return;
}
?>

<table border="1">
	<?php
	for ($i = 0; $i < count($sessions); ++$i) {
	?>
		<tr>
			<td><?= $sessions[$i]['token'] ?><?= $sessions[$i]['token'] == $_COOKIE['token'] ? ' (current) ' : ''  ?> <br><br> <?= $sessions[$i]['agent'] ?><br><br> Logged in on : <?= $sessions[$i]['time'] ?></td>
			<td><a href="/app/controllers/AccountSettings/deleteSession.php?token=<?= $sessions[$i]['token'] ?>">Revoke</a></td>
		</tr>
	<?php
	}
	?>
</table>
