<?php
echo 'Add user';
?>
<form action="/app/controllers/admin/addUser.php" method="POST">
	<table border="1">
		<tr>
			<td>Username</td>
			<td><input type="text" name="username"><text></text></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email"><text></text></td>
		</tr>
		<tr>
			<td>Full Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>
				<input type="radio" name="gender" value="Male" checked>Male
				<input type="radio" name="gender" value="Female">Female
				<input type="radio" name="gender" value="Other">Other
			</td>
		</tr>
		<tr>
			<td>User Type</td>
			<td>
				<select name="role">
					<option value="Patient">Patient</option>
					<option value="Doctor">Doctor</option>
					<option value="Employee">Employee</option>
					<option value="Admin">Admin</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Date Of Birth</td>
			<td><input type="date" name="dateOfBirth"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="address"></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><input type="text" name="phone"></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" name="addNewUser" value="Add User"></td>
		</tr>
	</table>
</form>

<button id="test">test</button>

<script>
	function enableSubmission() {
		$('input[name="addNewUser"]').prop('disabled', false);
	}

	function disableSubmission() {
		$('input[name="addNewUser"]').prop('disabled', true);
	}
	const checkUsernameAndEmail = () => {
		let usernameEl = $('input[name="username"]');
		let emailEl = $('input[name="email"]');

		var xmlhttp = new XMLHttpRequest();
		var url = "/app/controllers/admin/addUserValidate.php";
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
		// 	url: '/app/controllers/admin/addUserValidate.php',
		// 	type: 'POST',
		// 	data: {
		// 		username: usernameEl.val(),
		// 		email: emailEl.val()
		// 	},

		// 	success: function(response) {
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