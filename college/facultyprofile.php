<?php 
session_start();
error_reporting(0);
include('../include/db.php');

if(strlen($_SESSION['alogin'])==0)
  { 
header('location:cllglogin.php');
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="img/logogrivotech.png">
	<title>Profile | GrivoTech</title>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--External CSS -->
	<link rel="stylesheet" href="css/fac_style.css">
</head>
<body>
	<!-- NavBar -->
	<?php include('include/header.php'); ?>

	<section id="breadcrumb">
		<div class="container" style="margin-top: 2%; width: 97%;">
			 <ol class="breadcrumb">
			 	<li><input type="button" value="Back" onclick="history.go(-1)"></li>
			 	<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
			 	<li class="active">Profile</li>
			 </ol>
		</div>
	</section>

	<section id="main">
		<div class="container" style=" width: 97%;">
			<div class="row">
				<div class="col-md-2">
					<div class="list-group">
						<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard</a>
						<a href="grievance_section.php" class="list-group-item"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Grievance Section</a>
						<a href="studentdetails.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Student's Details</a>
						<a href="facultyprofile.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a>
					</div>
				</div>
				<div class="col-md-10">
					<div class="panel panel-default">
						<div class="panel-heading main-color-bg">
							<h3 class="panel-title">Profile</h3>
						</div>
						<div class="panel-body" style="min-height: 400px;">
							<strong>College Profile</strong>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<?php include('../include/footer.php'); ?>
	<!-- Bootstrap score JavaScript -->
	<!-- Placed at the end of the document so that the pages loads faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>