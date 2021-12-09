<?php

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
	<form action="/app/controllers/AccountSettings/changePassword.php" method="POST">
		<table border="0">
			<tr>
				<td>Old Password : </td>
				<td>
					<input type="password" name="oldPassword">
				</td>
			</tr>
			<tr>
				<td>New Password : </td>
				<td>
					<input type="password" name="newPassword">
					<text id="error"></text>
				</td>
			</tr>
			<tr>
				<td>Confirm New Password : </td>
				<td>
					<input type="password" name="newPassword2">
					<text id="error2"></text>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="savePasswordChanges" value="Save Changes" disabled></td>
			</tr>
		</table>
	</form>
</div>

<script>
	const validate = () => {
		let newPassword = $("input[name='newPassword']").val();
		let newPassword2 = $("input[name='newPassword2']").val();


		if (newPassword.length < 8) {
			$("#error").text("Password must be at least 8 characters");
			return true;
		}


		if (newPassword != newPassword2) {
			$("#error").text("Passwords do not match");
			$("#error2").text("Passwords do not match");
			return true;
		}

		$("#error").text("");
		$("#error2").text("");

		return false;
	}

	const setSubmissionState = () => {
		$("input[name='savePasswordChanges']").attr('disabled', validate());
	}

	$('input[name="newPassword"]').on('keyup', setSubmissionState)
	$('input[name="newPassword2"]').on('keyup', setSubmissionState)
</script>