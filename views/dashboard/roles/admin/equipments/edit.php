<?php

include_once(__DIR__ . '/../secureRoute.php');

$id = $_GET['id'];

if (!$id) {
	echo 'Invalid ID';
	return;
}

require_once(__DIR__ . '/../../../../../repository/EquipmentRepo.php');

$equipment = getEquipmentById($id);

if (!$equipment) {
	echo 'Equipment not found with id=' . $id;
	return;
}

?>
<script src="/app/scripts/jquery.js"></script>

<form action="/app/controllers/admin/editEquipment.php" method="POST">
	<table>
		<tr>
			<td>ID</td>
			<td><input type="text" name="id" value="<?= $equipment['id'] ?>" readonly></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" value="<?= $equipment['name'] ?>"></td>
		</tr>
		<tr>
			<td>Count</td>
			<td><input type="number" step="1" name="count" value="<?= $equipment['count'] + 0 ?>"></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" name="saveEdits" value="Save Edit" disabled></td>
		</tr>
	</table>
</form>

<script>
	const validateCount = () => {
		if (isNaN($('input[name="count"]').val()) || $('input[name="count"]').val() =="") {
			$('input[name="saveEdits"]').attr('disabled', true);
			return;
		}
		$('input[name="saveEdits"]').attr('disabled', false);
	}

	$('input[name="count"]').on('keyup', validateCount);
</script>