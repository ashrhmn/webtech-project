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
		justify-content: center;
		align-items: center;
	}

	.container>table {
		background-color: #fff;
		margin: 0 30px;
		border-radius: 15px;
		border-collapse: collapse;
		padding: 20px;
		box-shadow:
			0.3px 0.4px 0.5px -1px rgba(0, 0, 0, 0.017),
			0.7px 0.9px 1px -1px rgba(0, 0, 0, 0.025),
			1.2px 1.5px 1.7px -1px rgba(0, 0, 0, 0.031),
			1.8px 2.3px 2.6px -1px rgba(0, 0, 0, 0.035),
			2.6px 3.3px 3.8px -1px rgba(0, 0, 0, 0.04),
			3.7px 4.6px 5.3px -1px rgba(0, 0, 0, 0.045),
			5.3px 6.5px 7.5px -1px rgba(0, 0, 0, 0.049),
			7.7px 9.5px 11px -1px rgba(0, 0, 0, 0.055),
			11.8px 14.6px 16.9px -1px rgba(0, 0, 0, 0.063),
			21px 26px 30px -1px rgba(0, 0, 0, 0.08);
	}

	td,tr{
		padding: 10px;
	}

	.oddRow{
		background-color: #b6bac7;
		border-radius: 15px;
	}

	.evenRow{
		background-color: #cbcfd6;
	}

	.session {
		word-break: break-all;
	}
</style>
<div class="container">
	<table>
		<?php
		for ($i = 0; $i < count($sessions); ++$i) {
		?>
			<tr class="<?=($i%2==0)?'evenRow':'oddRow'?>">
				<td class="session"><?= $sessions[$i]['token'] ?><?= $sessions[$i]['token'] == $_COOKIE['token'] ? ' (current) ' : ''  ?> <br><br> <?= $sessions[$i]['agent'] ?><br><br> Logged in on : <?= $sessions[$i]['time'] ?></td>
				<td><a href="/app/controllers/AccountSettings/deleteSession.php?token=<?= $sessions[$i]['token'] ?>">Revoke</a></td>
			</tr>
		<?php
		}
		?>
	</table>
</div>