<?php

include(__DIR__ . '/../secureRoute.php');
?>

<?php

require_once(__DIR__ . '../../../../../../repository/UserRepo.php');
require_once(__DIR__ . '../../../../../../repository/DoctorRepo.php');

$doctors = getAllDoctor();
$availableDoctorIds = getAvailableDoctorsId();
?>
<table border="1">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Available</th>
		<th>Action</th>
	</tr>
	<?php

	for ($i = 0; $i < count($doctors); ++$i) {
	?>
		<tr>
			<td><?= $doctors[$i]['id'] ?></td>
			<td><?= $doctors[$i]['name'] ?></td>
			<td><?= in_array($doctors[$i]['id'], $availableDoctorIds) ? 'Yes' : 'No' ?></td>
			<td><a href="<?= "/app/controllers/admin/toogleDocAvailability.php?id=" . $doctors[$i]['id'] ?>">Toogle</a></td>
		</tr>
	<?php
	}

	?>
</table>
