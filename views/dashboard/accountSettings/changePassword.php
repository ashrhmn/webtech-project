<?php

echo 'Change Password';

?>

<form action="/app/controllers/AccountSettings/changePassword.php" method="POST">
	<table border="1">
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