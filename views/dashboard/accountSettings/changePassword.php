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
		border-radius: 5px;
		padding: 10px;
		box-shadow:
			1.4px 1px 2.8px -37px rgba(0, 0, 0, 0.024),
			3.9px 2.6px 7.8px -37px rgba(0, 0, 0, 0.035),
			9.3px 6.3px 18.7px -37px rgba(0, 0, 0, 0.046),
			31px 21px 62px -37px rgba(0, 0, 0, 0.07);
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