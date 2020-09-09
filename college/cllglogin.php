<?php
session_start();
error_reporting(0);
include("../include/db.php");
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$ret = mysqli_query($db, "SELECT * FROM academy WHERE email='$email' and password='$password'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$_SESSION['alogin'] = $_POST['email'];
		$_SESSION['id'] = $num['id'];
		$_SESSION['collegeName']=$num['collegeName'];
		header("location:index.php");
		exit();
	} else {
		$_SESSION['errmsg'] = "Invalid email or password";
		header("location:cllglogin.php");
		exit();
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="logogrivotech.png">
	<title>Login | GrivoTech</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="foot.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
	<link rel="stylesheet" href="css/userlogin.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
	<?php include("navbar.php"); ?>
	<article class="login-page">
		<section class="form">
			<form class="college-login-form" method="post">

				<fieldset>
					<legend>College | Login | GrivoTech</legend><br>
					<span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg'] = ""); ?></span>
					<label for="email">College Email Id <i class="fa fa-envelope" aria-hidden="true"></i><br><input type="text" name="email" id="fullname-user" value="college@grivo.com" placeholder="Enter UserName"></label><br>
					<label for="password-registration-user">Password <i class="fa fa-key" aria-hidden="true"></i><br><input type="password" name="password" value="12345" id="txtPassword" placeholder="Enter your Password here"></label><br>
					<button type="submit" name="submit">Log In</button>

					<p class="message">Forgot Password? <a href="#"> Reset Password <i class="fa fa-unlock" aria-hidden="true"></i></a></p>

				</fieldset>
			</form>
		</section>
	</article>
	<?php include("foot.php"); ?>
</body>

</html>