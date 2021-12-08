<?php
require_once('header.php');
?>

<script src="/app/scripts/jquery.js"></script>

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
<!-- Google Fonts -->


<script>
	$(document).ready(() => {
		console.log('ready')
		const validate = () => {
			if ($('input[name="proPic"]').get(0).files.length == 0) {
				$('input[name="submitProPic"]').attr('disabled', true);
				$('#err').text('');
			} else {
				const fileExt = $('input[name="proPic"]').get(0).files[0].name.split('.')[1].toString().toLowerCase();
				if (!["jpg", "jpeg", "png"].includes(fileExt)) {
					$('input[name="submitProPic"]').attr('disabled', true);
					$('#err').text('Invalid file type');
					$('#discard').attr('hidden', false);
					return;
				}
				$('input[name="submitProPic"]').attr('disabled', false);
				$('#err').text('');

			}
			if ($('input[name="proPic"]').get(0).files.length == 0) {
				$('input[name="submitProPic"]').attr('hidden', true);
				$('#discard').attr('hidden', true);
			} else {
				$('input[name="submitProPic"]').attr('hidden', false);
				$('#discard').attr('hidden', false);
			}

			$('#profileImage').attr('src',
				($('input[name="proPic"]').get(0).files.length > 0) ?
				window.URL.createObjectURL($('input[name="proPic"]').get(0).files[0]) :
				"/assets/<?= $user['profilePicture'] ?>"
			);
		}

		validate();
		$("input[name='proPic']").change(() => {
			validate()
		});

		$('#editImgCont').on('click', (e) => {
			$('input[name="proPic"]').click();
		})

		$('#discard').click((e) => {
			$("input[name='clearProPic']").click()
			validate()
			e.preventDefault()
		})


	})
</script>

<style>
	body {
		font-family: 'Poppins', sans-serif;
	}

	.sidebar {
		position: fixed;
		display: flex;
		flex-direction: column;
		left: 0;
		top: 0;
		height: 100%;
		width: 250px;
		background-color: #0a47fb;
		align-items: center;
		line-height: 0.1;
	}

	.sidebar>form>a>div {
		display: flex;
		width: 240px;
		align-items: center;

	}

	.sidebar>form>a {
		color: white;
		text-decoration: none;
		font-size: 20px;
	}

	.sidebar>form>a>div>img {
		height: 25px;
		width: 25px;
		filter: invert(100%);
	}

	.sidebar>form>a>div>* {
		padding: 15px;
	}

	#profileImage {
		/* profile picture */

		height: 100px;
		width: 100px;
		object-fit: cover;

		border-radius: 50px;
		border: 2px;
		border-color: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 38%, rgba(0, 212, 255, 1) 100%);
		border-style: solid;
	}

	#profile-container {
		margin-top: 20px;
	}

	.content {
		margin-left: 250;
		padding: 10px;
	}

	#editImg {
		width: 15px;
		height: 15px;
		padding: 5px;
		filter: invert(100%);
	}

	#editImgCont {
		border: 1px solid;
		width: 26px;
		height: 26px;
		margin: auto;
		border-radius: 50%;
		background-color: #2b9ce6;
		display: flex;
		align-items: center;
		justify-content: center;
		transform: translate(40px, 100px);
		cursor: pointer;
	}

	/* #imgHandler {
		display: flex;
		justify-content: space-between;
	} */

	.btn {
		height: 30px;
		width: 80px;
		border: 0px;
		border-radius: 30px;
		margin: 5px;
	}

	.btn-blue {
		background-color: rgba(11, 166, 255, 1);
		color: white;
	}

	.btn-blue:hover {
		background-color: rgba(76, 139, 245, 1);
		color: white;
	}

	#name{
		color: white;
		font-size: 28px;
		font-weight: 900;
		line-height: 1;
		text-align: center;
		padding: 0 2px;
	}

	#role{
		color: white;
		font-size: 20px;
		font-weight: 500;
		line-height: 0.1;
	}
</style>

<div>
	<div class="sidebar">
		<div id="profile-container">
			<div id="editImgCont">
				<img id="editImg" src="/app/assets/icons/draw.png" alt="">
			</div>
			<img id="profileImage" src="/assets/<?= $user['profilePicture'] ?>" alt="pro-pic">
		</div>
		<form action="/app/controllers/AccountSettings/changeProPic.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="proPic" hidden>
			<text id="err"></text>
			<br>
			<div id="imgHandler">
				<input class="btn btn-blue" type="submit" name="submitProPic" value="Update" hidden>
				<button class="btn" id="discard" hidden>Discard</button>
			</div>
			<input type="reset" name="clearProPic" value="Clear" hidden>
		</form>

		<p id="name"><?= $user['name'] ?></p>
		<p id="role">Role : <?= $user['role'] ?></p>

		<form action="#" method="POST">
			<a href="?section=main">
				<div>
					<img src="/app/assets/icons/dashboard.png" alt="">
					Dashboard
				</div>
			</a>
			<a href="?section=editProfile">
				<div>
					<img src="/app/assets/icons/edit.png" alt="">
					Edit Profile
				</div>
			</a>
			<a href="?section=changePassword">
				<div>
					<img src="/app/assets/icons/padlock.png" alt="">
					Change Password
				</div>
			</a>
			<a href="?section=manageSession">
				<div>
					<img src="/app/assets/icons/history.png" alt="">
					Manage Session
				</div>
			</a>
			<a href="/app/controllers/logout.php">
				<div>
					<img src="/app/assets/icons/logout.png" alt="">
					Logout
				</div>
			</a>
		</form>
	</div>
</div>

<div class="content">

	<div><?php
			if (!isset($_GET['section'])) {
				include('./roles/' . strtolower($user['role']) . '/dashboard.php');
				return;
			}
			$section = $_GET['section'];
			if ($section == 'main') {
				include('./roles/' . strtolower($user['role']) . '/dashboard.php');
				return;
			} else {
				include('accountSettings/' . $section . '.php');
				return;
			}
			?>
	</div>
</div>


<?php
return;
