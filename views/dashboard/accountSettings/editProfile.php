<?php

echo 'Edit Profile';

require_once('../../repository/AuthRepo.php');

$user = getLoggedInUser();

if (!$user) {
	echo 'Not authenticated';
	return;
}

?>

<form action="/app/controllers/AccountSettings/saveProfileEdits.php" method="POST">
	<table border="1">
		<input type="text" name="id" hidden value="<?= $user['id'] ?>">
		<input type="text" name="role" hidden value="<?= $user['role'] ?>">
		<tr>
			<td>Username : </td>
			<td><input type="text" name="username" value="<?= $user['username'] ?>"><text></text></td>
		</tr>
		<tr>
			<td>Full Name : </td>
			<td><input type="text" name="name" value="<?= $user['name'] ?>"></td>
		</tr>
		<tr>
			<td>Email : </td>
			<td><input type="text" name="email" value="<?= $user['email'] ?>"><text></text></td>
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

<script>
	function enableSubmission() {
		$('input[name="save"]').prop('disabled', false);
	}

	function disableSubmission() {
		$('input[name="save"]').prop('disabled', true);
	}
	const checkUsernameAndEmail = () => {
		let usernameEl = $('input[name="username"]');
		let emailEl = $('input[name="email"]');

		var xmlhttp = new XMLHttpRequest();
		var url = "/app/controllers/admin/editUserValidate.php";
		xmlhttp.open("POST", url, true);
		xmlhttp.setRequestHeader("Content-type", "application/json");
		xmlhttp.send(JSON.stringify({
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