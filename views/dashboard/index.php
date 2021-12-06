<?php
require_once('header.php');
?>

<script src="/app/scripts/jquery.js"></script>

<h1>Welcome <?= $user['name'] ?></h1>
<img width="80" height="80" src="/assets/<?= $user['profilePicture'] ?>" alt="pro-pic">
<form action="/app/controllers/AccountSettings/changeProPic.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="proPic">
	<input type="submit" name="submitProPic" value="Change Picture">
	<text></text>
</form>
<hr>
<br>
<form action="#" method="POST">
	<input type="submit" name="dashboard" value="Dashboard">
	<input type="submit" name="editProfile" value="Edit Profile">
	<input type="submit" name="changePassword" value="Change Password">
	<input type="submit" name="manageSession" value="Manage Session">
	<a href="/app/controllers/logout.php">Logout</a>
</form>

<div><?php
		if (isset($_POST['editProfile'])) {
			include('accountSettings/editProfile.php');
			return;
		}
		if (isset($_POST['changePassword'])) {
			include('accountSettings/changePassword.php');
			return;
		}
		if (isset($_POST['manageSession'])) {
			include('accountSettings/manageSession.php');
			return;
		}
		if (isset($_POST['dashboard'])) {
			include('./roles/' . strtolower($user['role']) . '/dashboard.php');
			return;
		}
		include('./roles/' . strtolower($user['role']) . '/dashboard.php');
		?></div>

<script>
	const validate = () => {
		if ($('input[name="proPic"]').get(0).files.length == 0) {
			$('input[name="submitProPic"]').attr('disabled', true);
		} else {
			console.log($('input[name="proPic"]').get(0).files[0].name.split('.')[1]);
			const fileExt = $('input[name="proPic"]').get(0).files[0].name.split('.')[1].toString().toLowerCase();
			if (!["jpg", "jpeg", "png"].includes(fileExt)) {
				// alert('Invalid file type');
				$('input[name="submitProPic"]').attr('disabled', true);
				$('input[name="submitProPic"]').next().text('Invalid file type');
				return;
			}
			$('input[name="submitProPic"]').attr('disabled', false);
			$('input[name="submitProPic"]').next().text('');
		}
	}
	validate()
	$("input[name='proPic']").change(validate);
</script>
<?php
return;
