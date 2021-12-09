<?php

require_once('../../repository/AuthRepo.php');

$user = getLoggedInUser();

if (!$user) {
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

	.container>form {
		background-color: #fff;
		border-radius: 15px;
		padding: 10px;
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

	td {
		font-size: 24px;
	}

	td>input {
		font-size: 24px;
	}
</style>
<div class="container">
	<form action="/app/controllers/AccountSettings/saveProfileEdits.php" method="POST">
		<table border="0">
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
</div>

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