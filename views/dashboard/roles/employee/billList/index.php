<?php

require_once(__DIR__ . '../../../../../../repository/EmployeeRepo.php');

$bills = getAllBill();

?>

<table border="1">
	<tr>
		<th>Test Name</th>
		<th>Test Price</th>
		<th>Number Of Test</th>
		<th>Total Price</th>
	</tr>
	<?php

	for ($i = 0; $i < count($bills); ++$i) {
	?>
		<tr>
			<td><?= $bills[$i]['testName'] ?></td>
			<td><?= $bills[$i]['testPrice'] ?></td>
			<td><?= $bills[$i]['numOfTests'] ?></td>
			<td><?= $bills[$i]['testPrice']*$bills[$i]['numOfTests'] ?></td>
		</tr>
	<?php
	}
	?>
</table>
