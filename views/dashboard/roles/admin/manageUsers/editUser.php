<?php

include_once(__DIR__ . '/../secureRoute.php');

$id = $_GET['id'];

if (!$id) {
	echo 'Invalid ID';
	return;
}

require_once(__DIR__ . '/../../../../../repository/UserRepo.php');

$user = getUserById($id);

if (!$user) {
	echo 'User not found with id=' . $id;
	return;
}

?>

<script src="/app/scripts/jquery.js"></script>

<form action="/app/controllers/admin/editUser.php" method="POST">
	<table border="1">
		<tr>
			<td>ID</td>
			<td><input type="text" name="id" value="<?= $user['id'] ?>" readonly></td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" value="<?= $user['username'] ?>"><text></text></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email" value="<?= $user['email'] ?>"><text></text></td>
		</tr>
		<tr>
			<td>Full Name</td>
			<td><input type="text" name="name" value="<?= $user['name'] ?>"></td>
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
			<td>User Type</td>
			<td>
				<select name="role">
					<option value="Patient" <?= $user['role'] == 'Patient' ? 'selected' : '' ?>>Patient</option>
					<option value="Doctor" <?= $user['role'] == 'Doctor' ? 'selected' : '' ?>>Doctor</option>
					<option value="Employee" <?= $user['role'] == 'Employee' ? 'selected' : '' ?>>Employee</option>
					<option value="Admin" <?= $user['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
				</select>
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
			<td align="center"><a href="../../../../dashboard/">Go Back</a></td>
			<td align="center"><input type="submit" name="editUser" value="Save Edit"></td>
		</tr>
	</table>
</form>


<script>
	function enableSubmission() {
		$('input[name="editUser"]').prop('disabled', false);
	}

	function disableSubmission() {
		$('input[name="editUser"]').prop('disabled', true);
	}
	const checkUsernameAndEmail = () => {
		let idEl = $('input[name="id"]');
		let usernameEl = $('input[name="username"]');
		let emailEl = $('input[name="email"]');

		var xmlhttp = new XMLHttpRequest();
		var url = "/app/controllers/admin/editUserValidate.php";
		xmlhttp.open("POST", url, true);
		xmlhttp.setRequestHeader("Content-type", "application/json");
		xmlhttp.send(JSON.stringify({
			id: idEl.val(),
			username: usernameEl.val(),
			email: emailEl.val()
		}));
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				let res = JSON.parse(this.responseText);
				$('input[name="username"]').next().text(res.usernameMsg);
				$('input[name="email"]').next().text(res.emailMsg);

				if (res.usernameMsg == "" && res.emailMsg == "") {
					$('input[name="username"]').css('border', '1px solid green');
					$('input[name="email"]').css('border', '1px solid green');
					enableSubmission()
				} else {
					disableSubmission()
					if (res.usernameMsg != "") {
						$('input[name="username"]').css('border', '1px solid red');
					}
					if (res.emailMsg != "") {
						$('input[name="email"]').css('border', '1px solid red');
					}
				}
			}
		}

		// $.ajax({
		// 	url: '/app/controllers/admin/editUserValidate.php',
		// 	type: 'POST',
		// 	data: {
		// 		username: usernameEl.val(),
		// 		email: emailEl.val()
		// 	},

		// 	success: function(response) {
		// 		console.log(response);
		// 		let res = JSON.parse(response);
		// 		$('input[name="username"]').next().text(res.usernameMsg);
		// 		$('input[name="email"]').next().text(res.emailMsg);

		// 		if (res.usernameMsg == "" && res.emailMsg == "") {
		// 			$('input[name="username"]').css('border', '1px solid green');
		// 			$('input[name="email"]').css('border', '1px solid green');
		// 			enableSubmission()
		// 		} else {
		// 			disableSubmission()
		// 			if (res.usernameMsg != "") {
		// 				$('input[name="username"]').css('border', '1px solid red');
		// 			}
		// 			if (res.emailMsg != "") {
		// 				$('input[name="email"]').css('border', '1px solid red');
		// 			}
		// 		}
		// 	},
		// 	error: function(error) {
		// 		console.log(error);
		// 	}
		// });
	}

	$('input[name="username"]').on('keyup', checkUsernameAndEmail);
	$('input[name="email"]').on('keyup', checkUsernameAndEmail);
</script>