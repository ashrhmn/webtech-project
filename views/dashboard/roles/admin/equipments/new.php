<form action="/app/controllers/admin/addEquipment.php" method="POST">
	<table>
		<tr>
			<td>Equipment Name</td>
			<td><input type="text" name="equipmentName"></td>
		</tr>
		<tr>
			<td>Count</td>
			<td><input type="number" step="1" name="equipmentCount"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="addEquipment" value="Add" disabled></td>
		</tr>
	</table>
</form>


<script>
	const validateCount = () => {
		if (isNaN($('input[name="equipmentCount"]').val()) || $('input[name="equipmentCount"]').val() =="") {
			$('input[name="addEquipment"]').attr('disabled', true);
			return;
		}
		$('input[name="addEquipment"]').attr('disabled', false);
	}

	$('input[name="equipmentCount"]').on('keyup', validateCount);
</script>