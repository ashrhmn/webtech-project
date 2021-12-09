<?php
if (count($equipments) == 0) {
	echo 'No equipments found';
	return;
}

?>

<style>

	table{
		border-collapse: collapse;
	}

	tr{
		border-bottom: 0.5px solid;
	}

	td{
		padding: 5px;
	}
	.btnAction {
		padding: 1px 2px;
		margin: 0 1px;
	}

	.actionSvg {
		width: 18px;
		color: black;
	}

	.editBtn:hover {
		color: #16798f;
		transition: all linear 0.25s;
	}

	.delBtn:hover {
		color: #b81d33;
		transition: all linear 0.25s;
	}

	/* a,
	a:visited {
		color: #fff;
		text-decoration: none;
	} */
</style>

<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Count</th>
		<th>Action</th>
	</tr>
	<?php

	for ($i = 0; $i < count($equipments); ++$i) {
	?>

		<tr>
			<td><?= $equipments[$i]['id'] ?></td>
			<td><?= $equipments[$i]['name'] ?></td>
			<td><?= $equipments[$i]['count'] ?></td>
			<td>
				<a class="btnAction" href="roles/admin/equipments/edit.php?id=<?= $equipments[$i]['id'] ?>">
					<svg xmlns="http://www.w3.org/2000/svg" class="actionSvg editBtn" viewBox="0 0 20 20" fill="currentColor">
						<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
						<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
					</svg>
				</a>
				<a class="btnAction" href="<?= "/app/controllers/admin/deleteEquipment.php?id=" . $equipments[$i]['id'] ?>">
					<svg xmlns="http://www.w3.org/2000/svg" class="actionSvg delBtn" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
					</svg>
				</a>
			</td>
		</tr>

	<?php
	}

	?>
</table>