<?php
require_once('header.php');

$rightArrow = '
	<svg xmlns="http://www.w3.org/2000/svg" class="rightArrow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
	<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
  </svg>
  ';
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
				const fileNameArr = $('input[name="proPic"]').get(0).files[0].name.split('.');
				const fileExt = fileNameArr[fileNameArr.length - 1].toString().toLowerCase();
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
	.rightArrow {
		height: 25px;
		width: 25px;
		color: #414583;
	}

	body {
		font-family: 'Poppins', sans-serif;
		background-color: #d7dae0;
		/* background-image: linear-gradient(to right, #0a47fb, #054efc, #0454fd, #065afe, #0c60ff, #2b62ff, #3c63ff, #4965ff, #5f63ff, #7260ff, #835dff, #9259ff); */
	}

	.sidebar {
		position: fixed;
		display: flex;
		flex-direction: column;
		left: 0;
		top: 0;
		height: 100%;
		width: 300px;
		/* background-color: #0a47fb; */
		/* background-color: #d7dae0; */
		background-color: #c3c7d1;
		align-items: center;
		z-index: 10;
		/* line-height: 0.1; */
	}

	.sidenavicon {
		height: 25px;
		width: 25px;
		/* filter: invert(40%); */
		filter: brightness(0.4) invert(.1) sepia(.3) hue-rotate(100deg) saturate(300%);
	}


	#profileImage {
		/* profile picture */

		height: 150px;
		width: 150px;
		object-fit: cover;
		border-radius: 50%;
	}


	#proPic-border {
		border: 2px solid;
		border-color: #2b9ce6;
		border-radius: 50%;
	}

	.content {
		margin-left: 300;
		/* padding: 10px; */
	}

	#editImg {
		width: 15px;
		height: 15px;
		padding: 5px;
		filter: invert(100%);
	}

	#editImgCont {
		border: 1px solid;
		width: 28px;
		height: 28px;
		margin: auto;
		border-radius: 50%;
		background-color: #2b9ce6;
		display: flex;
		align-items: center;
		justify-content: center;
		transform: translate(50px, 150px);
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

	#name {
		/* color: white; */
		font-size: 28px;
		font-weight: 900;
		line-height: 1;
		text-align: center;
		padding: 0 2px;
		/* background-color: #2747e9; */
	}

	#role {
		/* color: white; */
		font-size: 20px;
		font-weight: 500;
		/* background-color: #2b9ce6; */
	}

	.sidenav {
		display: flex;
		flex-direction: column;
	}

	.sidenav>a {
		/* background-color: #2747e9; */
		padding: 10px;
		display: flex;
		align-items: center;
		font-size: 20px;
		text-decoration: none;
		border-radius: 10px;
	}

	.sidenav>a:hover {
		background-color: #e7ebfe;
		transition: all linear 0.5s;
	}

	.activenav {
		background-color: #dfe2ee;
	}

	.sidenav>a>div {
		width: 35px;
	}

	.sidenav>a>span {
		color: #525a96;
	}

	.sidenav>a>span:hover {
		color: #2e4dfb;
		transition: all linear 0.5s;
	}

	/* a:visited {
		color: inherit;
	} */
</style>

<div>
	<div class="sidebar">
		<div id="profile-container">
			<div id="editImgCont">
				<img id="editImg" src="/app/assets/icons/draw.png" alt="">
			</div>
			<div id="proPic-border">
				<img id="profileImage" src="/assets/<?= $user['profilePicture'] ?>" alt="pro-pic">
			</div>
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

		<span id="name"><?= $user['name'] ?></span>
		<span id="role">Role : <?= $user['role'] ?></span>

		<form class="sidenav" action="#" method="POST">
			<a class="<?= (!isset($_GET['section']) || $_GET['section'] == 'main') ? 'activenav' : '' ?>" href="?section=main">
				<div>
					<img class="sidenavicon" src="/app/assets/icons/dashboard.png" alt="">
				</div>
				<span>
					Dashboard
				</span>
				<?= (!isset($_GET['section']) || $_GET['section'] == 'main') ? $rightArrow : '' ?>
			</a>
			<a class="<?= (isset($_GET['section']) && $_GET['section'] == 'editProfile') ? 'activenav' : '' ?>" href="?section=editProfile">
				<div>
					<img class="sidenavicon" src="/app/assets/icons/edit.png" alt="">
				</div>
				<span>
					Edit Profile
				</span>
				<?= (isset($_GET['section']) && $_GET['section'] == 'editProfile') ? $rightArrow : '' ?>
			</a>
			<a class="<?= (isset($_GET['section']) && $_GET['section'] == 'changePassword') ? 'activenav' : '' ?>" href="?section=changePassword">
				<div>
					<img class="sidenavicon" src="/app/assets/icons/padlock.png" alt="">
				</div>
				<span>
					Change Password
				</span>
				<?= (isset($_GET['section']) && $_GET['section'] == 'changePassword') ? $rightArrow : '' ?>
			</a>
			<a class="<?= (isset($_GET['section']) && $_GET['section'] == 'manageSession') ? 'activenav' : '' ?>" href="?section=manageSession">
				<div>
					<img class="sidenavicon" src="/app/assets/icons/history.png" alt="">
				</div>
				<span>
					Manage Session
				</span>
				<?= (isset($_GET['section']) && $_GET['section'] == 'manageSession') ? $rightArrow : '' ?>
			</a>
			<a href="/app/controllers/logout.php">
				<div>
					<img class="sidenavicon" src="/app/assets/icons/logout.png" alt="">
				</div>
				<span>
					Logout
				</span>
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
