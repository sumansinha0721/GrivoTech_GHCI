<?php
session_start();
error_reporting(0);
include("../include/db.php");
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
$ret=mysqli_query($db,"SELECT * FROM university WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['alogin']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['univName'] = $num['univName'];
header("location:index.php");
exit();
}
else
{
$_SESSION['errmsg']="Invalid email or password";
header("location:adminlogin.php");
exit();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="assets/img/logogrivotech.png">
	<title>Login | University | GrivoTech</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="assets/css/foot.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/adminlogin.css" type="text/css">
</head>
<body>
<?php include("include/navbar.php"); ?>
	<article class="login-page">
		<section class="form">
			<form class="student-form" method="post">
                       
				<fieldset>
					<legend>University | Login | GrivoTech</legend><br>
					<span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
					<label for="email">Email-Id <i class="fa fa-envelope" aria-hidden="true"></i><br><input type="email" name="email" id="email_id" placeholder="Enter your registered Email-Id" required></label><br>
					<label for="password-registration-admin">Password <i class="fa fa-key" aria-hidden="true"></i><br><input type="password" name="password" id="txtpassword" placeholder="Enter your Password here" required></label><br><br>
					<button type="submit" name="submit">Log In</button>

					<p class="message">Forgot Password? <a href="#"> Reset Password <i class="fa fa-unlock" aria-hidden="true"></i></a></p>
				
				</fieldset>
			</form>
			<form class="reset-password">
				<fieldset>
					<legend>Admin | Reset Password | GrivoTech</legend><br>
					<label for="email">Email-Id <i class="fa fa-envelope" aria-hidden="true"></i><br><input type="email" name="email" id="email_id" placeholder="Enter your registered Email-Id" required></label><br><br>
					<button type="button">Send OTP </button><br><br>
					<label for="verifyotp">OTP <i class="fa fa-unlock-alt" aria-hidden="true"></i><br><input type="text" name="otpverify" id="otp-verify" placeholder="Enter OTP" required></label><br>
					<label for="password">New Password <i class="fa fa-key" aria-hidden="true"></i><br><input type="password" name="password" id="password" placeholder="Enter your new Password here" required></label><br>
					<label for="password">Confirm New Password <i class="fa fa-key" aria-hidden="true"></i><br><input type="password" name="password" id="password" placeholder="Re-Enter your new Password here" required></label><br><br>
					<button type="button">Change Password</button>
					<p class="message">Login? <a href="#"> Login <i class="fa fa-sign-in" aria-hidden="true"></i></a></p>
				</fieldset>
			</form>
		</section>
	</article>
	</article>
	<script>
		$('.message a').click(function(){
			$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
		});
	</script>
<?php include("include/foot.php"); ?>
</body>
</html>
