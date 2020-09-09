<?php
session_start();
error_reporting(0);
include("../include/db.php");
if (isset($_POST['submit'])) {
	$ret = mysqli_query($db, "SELECT * FROM student WHERE email='" . $_POST['email'] . "' and password='" . $_POST['password'] . "'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$_SESSION['login'] = $_POST['email'];
		$_SESSION['id'] = $num['student_id'];
		$_SESSION['name'] = $num['name'];
		$_SESSION['showFeedback'] = true;
		$status = 1;
		$log = mysqli_query($db, "insert into userlog(uid,username,userip,status) values('" . $_SESSION['id'] . "','" . $_SESSION['login'] . "','$uip','$status')");
		header("location:index.php");
		exit();
	} else {
		$_SESSION['login'] = $_POST['username'];
		$status = 0;
		mysqli_query($db, "insert into userlog(username,userip,status) values('" . $_SESSION['login'] . "','$uip','$status')");
		$errormsg = "Invalid username or password";
		header("location:userlogin.php");
	}
}



if (isset($_POST['change'])) {
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];
	$query = mysqli_query($db, "SELECT * FROM student WHERE email='$email' and mobile='$mobile'");
	$num = mysqli_fetch_array($query);
	if ($num > 0) {
		mysqli_query($db, "update student set password='$password' WHERE email='$email' and mobile='$mobile' ");
		$msg = "Password Changed Successfully";
	} else {
		$errormsg = "Invalid email id or Contact no";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<link rel="icon" type="image/png" href="logogrivotech.png">
	<title>Login | GrivoTech</title>
	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<!--external css-->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

	<!-- Custom styles for this template -->
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/style-responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
	<link rel="stylesheet" href="assests/css/userlogin.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function valid() {
			if (document.forgot.password.value != document.forgot.confirmpassword.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.forgot.confirmpassword.focus();
				return false;
			}
			return true;
		}
	</script>
</head>

<body>

	<article class="login-page">
		<section class="form">

			<form class="student-form" method="post">

				<fieldset>
					<legend>User | Login | GrivoTech</legend>
					<p style="padding-left:4%; padding-top:2%;  color:red">
						<?php if ($errormsg) {
							echo htmlentities($errormsg);
						} ?></p>

					<p style="padding-left:4%; padding-top:2%;  color:green">
						<?php if ($msg) {
							echo htmlentities($msg);
						} ?></p>
					<label for="username">User Id <i class="fa fa-user-circle" aria-hidden="true"></i><br><input type="text" name="email" id="fullname-user" placeholder="Enter Email Id" required value="student1@gmail.com" autofocus></label><br>

					<label for="password-registration-user">Password <i class="fa fa-key" aria-hidden="true"></i><br><input type="password" name="password" id="txtPassword" value="12345" placeholder="Enter your Password here"></label><br>
					<label class="checkbox">
						<span class="pull-right">
							<a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>

						</span>
					</label>
					<button type="submit" name="submit">Log In</button>
					<hr>
	
				</fieldset>
			</form>

			<!-- modal -->
			<form class="form-login" name="forgot" method="post">
				<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Forgot Password ?</h4>
							</div>
							<div class="modal-body">
								<p>Enter your details below to reset your password.</p>
								<input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control" required><br>
								<input type="text" name="mobile" placeholder="contact No" autocomplete="off" class="form-control" required><br>
								<input type="password" class="form-control" placeholder="New Password" id="password" name="password" required><br />
								<input type="password" class="form-control unicase-form-control text-input" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" required>


							</div>
							<div class="modal-footer">
								<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
								<button class="btn btn-theme" type="submit" name="change" onclick="return valid();">Submit</button>
							</div>
						</div>
					</div>
				</div>
				<!-- modal -->
			</form>


		</section>
	</article>



</body>

</html>