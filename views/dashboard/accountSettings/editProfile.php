<?php

echo 'Edit Profile';

require_once('../../repository/AuthRepo.php');

$user = getLoggedInUser();

if (!$user) {
	echo 'Not authenticated';
	return;
}

?>

<form action="../../controllers/AccountSettings/saveProfileEdits.php" method="POST">
	<table border="1">
		<input type="text" name="role" hidden value="<?= $user['role'] ?>">
		<tr>
			<td>Username : </td>
			<td><input type="text" name="username" value="<?= $user['username'] ?>"></td>
		</tr>
		<tr>
			<td>Full Name : </td>
			<td><input type="text" name="name" value="<?= $user['name'] ?>"></td>
		</tr>
		<tr>
			<td>Email : </td>
			<td><input type="text" name="email" value="<?= $user['email'] ?>"></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>
				<input type="radio" name="gender" value="Male" <?= $user['gender'] == 'Male' ? 'checked' : '' ?>>Male
				<input type="radio" name="gender" value="Female" <?= $user['gender'] == 'Female' ? 'checked' : '' ?>>Female
				<input type="radio" name="gender" value="Other" <?= $user['gender'] == 'Other' ? 'checked' : '' ?>>Other
			</td>
		</tr>
		<tr>
			<td>Date Of Birth</td>
			<td><input type="date" name="dateOfBirth" value="<?= $user['dateOfBirth'] ?>"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address" value="<?= $user['address'] ?>"></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><input type="text" name="phone" value="<?= $user['phone'] ?>"></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" name="save" value="Save Edits"></td>
		</tr>
	</table>
</form>
