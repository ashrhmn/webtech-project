<?php
require_once('../../repository/SettingsRepo.php');

$sessions = getAllSession();

if (!$sessions) {
	echo 'Not authenticated';
	return;
}
?>
<style>
	.container {
		width: 100%;
		height: 100%;
		display: flex;
		flex-direction: column;
		/* justify-content: center; */
		align-items: center;
	}

	.container>table {
		background-color: #fff;
		margin: 0 30px;
		border-radius: 15px;
		border-collapse: collapse;
		padding: 20px;
		box-shadow:
			1.4px 1px 2.8px -37px rgba(0, 0, 0, 0.024),
			3.9px 2.6px 7.8px -37px rgba(0, 0, 0, 0.035),
			9.3px 6.3px 18.7px -37px rgba(0, 0, 0, 0.046),
			31px 21px 62px -37px rgba(0, 0, 0, 0.07);
	}

	td,
	tr {
		padding: 10px;
	}

	.oddRow {
		background-color: #b6bac7;
		border-radius: 15px;
	}

	.evenRow {
		background-color: #cbcfd6;
	}

	.session {
		word-break: break-all;
	}
</style>
<div class="container">
	<h1>Logged in sessions</h1>
	<h4>Where you are logged in</h4>
	<table>
		<?php
		for ($i = 0; $i < count($sessions); ++$i) {
		?>
			<tr class="<?= ($i % 2 == 0) ? 'evenRow' : 'oddRow' ?>">
				<td class="session"><?= $sessions[$i]['token'] ?><?= $sessions[$i]['token'] == $_COOKIE['token'] ? ' (current) ' : ''  ?> <br><br> <?= $sessions[$i]['agent'] ?><br><br> Logged in on : <?= $sessions[$i]['time'] ?></td>
				<td><a href="/app/controllers/AccountSettings/deleteSession.php?token=<?= $sessions[$i]['token'] ?>">Revoke</a></td>
			</tr>
		<?php
		}
		?>
	</table>
</div>