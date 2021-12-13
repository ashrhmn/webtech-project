<?php

require_once('../repository/AuthRepo.php');

if (isUserLoggedIn()) {
	header('location: dashboard');
	return;
}

include("nav.php");
?>

<div class="wrapper fadeInDown">
	<div id="formContent">
		<h2 class="active"> Sign Up </h2>
		<h2 class="inactive underlineHover"> <a id="anchor" href="login.php">Sign In</a> </h2><br>

		<form action="/app/controllers/signup.php" method="POST">
			<table align="center">
				<tr>
					<!-- <td>Username</td> -->
					<td><input type="text" name="username" placeholder="Username"></td>
				</tr>
				<tr>
					<!-- <td>Email</td> -->
					<td><input type="email" name="email" placeholder="Email"></td>
				</tr>
				<tr>
					<!-- <td>Full Name</td> -->
					<td><input type="text" name="name" placeholder="Full Name"></td>
				</tr>
				<tr>
					<!-- <td>Pasword</td> -->
					<td><input type="password" name="password" placeholder="Password"></td>
				</tr>
				<tr>
					<!-- <td>Confirm Password</td> -->
					<td><input type="password" name="password2" placeholder="Confirm Password"></td>
				</tr>
				<tr>
					<!-- <td>Gender</td> -->
					<!-- <div class="wrapper-dob"> -->
					<td>
						<input type="radio" name="gender" value="Male" id="option-1" checked> Male
						<input type="radio" name="gender" value="Female" id="option-2"> Female
						<input type="radio" name="gender" value="Other" id="option-3"> Others
						<!-- <label for="option-1" class="option option-1">
								<div class="dot"></div>
								<span>Male</span>
							</label>
							<label for="option-2" class="option option-2">
								<div class="dot"></div>
								<span>Female</span>
							</label>
							<label for="option-3" class="option option-3">
								<div class="dot"></div>
								<span>Other</span>
							</label>
					</div> -->
					</td>
				</tr>
				<tr>
					<!-- <td>Date Of Birth</td> -->
					<td><input type="date" name="dateOfBirth"></td>
				</tr>
				<tr>
					<!-- <td>Address</td> -->
					<td><input type="text" name="address" placeholder="Address"></td>
				</tr>
				<tr>
					<!-- <td>Phone</td> -->
					<td><input type="text" name="phone" placeholder="Phone Number"></td>
				</tr>
				<tr>
					<!-- <td><a href="login.php">Login</a></td> -->
					<td><input type="submit" name="signup" value="Sign Up"></td>
				</tr>
			</table>
		</form>
	</div>
</div>

<style>
	html {
		background-color: #56baed;
	}

	body {
		font-family: "Poppins", sans-serif;
		height: 100vh;
	}

	a {
		color: #92badd;
		display: inline-block;
		text-decoration: none;
		font-weight: 400;
	}

	#anchor {
		color: #0d0d0d;
		text-decoration: none;
		font-weight: bold;
	}

	h2 {
		text-align: center;
		font-size: 16px;
		font-weight: 600;
		text-transform: uppercase;
		display: inline-block;
		margin: 40px 8px 10px 8px;
		color: #cccccc;
	}

	.wrapper {
		display: flex;
		align-items: center;
		flex-direction: column;
		justify-content: center;
		width: 100%;
		min-height: 100%;
		padding: 20px;
	}

	#formContent {
		-webkit-border-radius: 10px 10px 10px 10px;
		border-radius: 10px 10px 10px 10px;
		background: #fff;
		padding: 30px;
		width: 90%;
		max-width: 450px;
		position: relative;
		padding: 0px;
		-webkit-box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
		box-shadow: 0 30px 60px 0 rgba(0, 0, 0, 0.3);
		text-align: center;
	}

	#formFooter {
		background-color: #f6f6f6;
		border-top: 1px solid #dce8f1;
		padding: 25px;
		text-align: center;
		-webkit-border-radius: 0 0 10px 10px;
		border-radius: 0 0 10px 10px;
	}

	h2.inactive {
		color: #cccccc;
	}

	h2.active {
		color: #0d0d0d;
		border-bottom: 2px solid #5fbae9;
	}

	input[type=button],
	input[type=submit],
	input[type=reset] {
		background-color: #56baed;
		border: none;
		color: white;
		padding: 15px 80px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		text-transform: uppercase;
		font-size: 13px;
		-webkit-box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
		box-shadow: 0 10px 30px 0 rgba(95, 186, 233, 0.4);
		-webkit-border-radius: 5px 5px 5px 5px;
		border-radius: 5px 5px 5px 5px;
		margin: 5px 20px 40px 20px;
		-webkit-transition: all 0.3s ease-in-out;
		-moz-transition: all 0.3s ease-in-out;
		-ms-transition: all 0.3s ease-in-out;
		-o-transition: all 0.3s ease-in-out;
		transition: all 0.3s ease-in-out;
	}

	input[type=button]:hover,
	input[type=submit]:hover,
	input[type=reset]:hover {
		background-color: #39ace7;
	}

	input[type=button]:active,
	input[type=submit]:active,
	input[type=reset]:active {
		-moz-transform: scale(0.95);
		-webkit-transform: scale(0.95);
		-o-transform: scale(0.95);
		-ms-transform: scale(0.95);
		transform: scale(0.95);
	}

	input[type=text],
	input[type=password],
	input[type=email],
	input[type=date] {
		background-color: #f6f6f6;
		border: none;
		color: #0d0d0d;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 5px;
		width: 85%;
		border: 2px solid #f6f6f6;
		-webkit-transition: all 0.5s ease-in-out;
		-moz-transition: all 0.5s ease-in-out;
		-ms-transition: all 0.5s ease-in-out;
		-o-transition: all 0.5s ease-in-out;
		transition: all 0.5s ease-in-out;
		-webkit-border-radius: 5px 5px 5px 5px;
		border-radius: 5px 5px 5px 5px;
	}

	input[type=text]:focus {
		background-color: #fff;
		border-bottom: 2px solid #5fbae9;
	}

	input[type=text]:placeholder {
		color: #cccccc;
	}


	input[type=password]:focus {
		background-color: #fff;
		border-bottom: 2px solid #5fbae9;
	}

	input[type=password]:placeholder {
		color: #cccccc;
	}

	.fadeInDown {
		-webkit-animation-name: fadeInDown;
		animation-name: fadeInDown;
		-webkit-animation-duration: 1s;
		animation-duration: 1s;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
	}


	@-webkit-keyframes fadeInDown {
		0% {
			opacity: 0;
			-webkit-transform: translate3d(0, -100%, 0);
			transform: translate3d(0, -100%, 0);
		}

		100% {
			opacity: 1;
			-webkit-transform: none;
			transform: none;
		}
	}

	@keyframes fadeInDown {
		0% {
			opacity: 0;
			-webkit-transform: translate3d(0, -100%, 0);
			transform: translate3d(0, -100%, 0);
		}

		100% {
			opacity: 1;
			-webkit-transform: none;
			transform: none;
		}
	}

	@-webkit-keyframes fadeIn {
		from {
			opacity: 0;
		}

		to {
			opacity: 1;
		}
	}

	@-moz-keyframes fadeIn {
		from {
			opacity: 0;
		}

		to {
			opacity: 1;
		}
	}

	@keyframes fadeIn {
		from {
			opacity: 0;
		}

		to {
			opacity: 1;
		}
	}

	.fadeIn {
		opacity: 0;
		-webkit-animation: fadeIn ease-in 1;
		-moz-animation: fadeIn ease-in 1;
		animation: fadeIn ease-in 1;

		-webkit-animation-fill-mode: forwards;
		-moz-animation-fill-mode: forwards;
		animation-fill-mode: forwards;

		-webkit-animation-duration: 1s;
		-moz-animation-duration: 1s;
		animation-duration: 1s;
	}

	.fadeIn.first {
		-webkit-animation-delay: 0.4s;
		-moz-animation-delay: 0.4s;
		animation-delay: 0.4s;
	}

	.fadeIn.second {
		-webkit-animation-delay: 0.6s;
		-moz-animation-delay: 0.6s;
		animation-delay: 0.6s;
	}

	.fadeIn.third {
		-webkit-animation-delay: 0.8s;
		-moz-animation-delay: 0.8s;
		animation-delay: 0.8s;
	}

	.fadeIn.fourth {
		-webkit-animation-delay: 1s;
		-moz-animation-delay: 1s;
		animation-delay: 1s;
	}

	.underlineHover:after {
		display: block;
		left: 0;
		bottom: -10px;
		width: 0;
		height: 2px;
		background-color: #56baed;
		content: "";
		transition: width 0.2s;
	}

	.underlineHover:hover {
		color: #0d0d0d;
	}

	.underlineHover:hover:after {
		width: 100%;
	}

	*:focus {
		outline: none;
	}

	#icon {
		width: 60%;
	}

	* {
		box-sizing: border-box;
	}
</style>