<?php
session_start();
error_reporting(0);
include('../include/db.php');

if (strlen($_SESSION['alogin']) == 0) {
	header('location:adminlogin.php');
} else {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dashboard | GrivoTech</title>
		<!-- Bootstrap core CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
	</head>

	<body>
		<?php include('include/header.php'); ?>



		<section id="breadcrumb">
			<div class="container" style="margin-top: 2% ; width: 97%;">
				<ol class="breadcrumb">
					<li><span class="glyphicon glyphicon-home" aria-hidden="true"></span></li>
				</ol>
			</div>
		</section>

		<section id="main">
			<div class="container" style="width: 97%;">
				<div class="row">
					<div class="col-md-2">
						<div class="list-group">
							<a href="index.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard</a>
							<a href="reviewGrievanceSection.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> In-Progress Grievance <span class="badge"></span></a>
							<a href="unsolvedGrievanceSection.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Un-Solved Grievance <span class="badge"></span></a>
							<a href="solvedGrievanceSection.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Solved Grievance <span class="badge"></span></a>
							 <a href="pushF.php" class="list-group-item "><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Pushed Grievance <span class="badge"> <?php echo $_SESSION['countpushgriev']; ?></span></a>
							<a href="petitions.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> View Petitions <span class="badge"></span></a>
							<a href="addUniv.php" class="list-group-item"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Add University</a>
							<a href="stats.php" class="list-group-item"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Statistics</a>
							<a href="statsfeedback.php" class="list-group-item"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Feedback</a>
							<a href="profile.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a>
						</div>

					</div>
					<div class="col-md-10">
						<!-- Website Overview -->

						<div class="panel panel-default">
							<div class="panel-heading main-color-bg">
								<h3 class="panel-title">Statistics Overview</h3>
							</div>
							<div class="panel-body" style="min-height: 400px;">
								<div class="col-md-4">
									<div class="well dash-box">
										<h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
											<?php $rt = mysqli_query($db, "SELECT * FROM complain");
											$num1 = mysqli_num_rows($rt);
											echo htmlentities($num1);  ?></h2>

										<h4>Registered Grievance</h4>

									</div>
								</div>

								<div class="col-md-4">
									<div class="well dash-box">
										<h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>

											<?php
											$status = "in Process";
											$rt = mysqli_query($db, "SELECT * FROM complain where status='$status'");
											$num1 = mysqli_num_rows($rt);
											echo htmlentities($num1); ?></h2>
										<h4>In-Process Grievance</h4>

									</div>
								</div>

								<div class="col-md-4">
									<div class="well dash-box">
										<h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>

											<?php
											$rt = mysqli_query($db, "SELECT * FROM complain where status is null");
											$num1 = mysqli_num_rows($rt);
											echo htmlentities($num1); ?>
											<h4>Un-Solved Grievance</h4>

									</div>
								</div>
								<div class="col-md-4">
									<div class="well dash-box">
										<h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>

											<?php
											$status = "closed";
											$rt = mysqli_query($db, "SELECT * FROM complain where status='$status'");
											$num1 = mysqli_num_rows($rt);
											echo htmlentities($num1); ?>
											<h4>Solved Grievance</h4>

									</div>
								</div>
								<div class="col-md-4">
									<div class="well dash-box">
										<h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>

											<?php
											$rt = mysqli_query($db, "SELECT * FROM complain where status is null");
											$num1 = mysqli_num_rows($rt);
											echo htmlentities($num1); ?>
											<h4>Anonymous Grievance</h4>

									</div>
								</div>
								<div class="col-md-4">
									<div class="well dash-box">
										<h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>

											<?php

											$rt = mysqli_query($db, "SELECT * FROM univpush join complain on complain.complaintNumber=univpush.complaintnumber");
											$num1 = mysqli_num_rows($rt);
											echo htmlentities($num1); ?>
											<h4>Pushed Grievance</h4>

									</div>
								</div>

								<?php
								include('stats1.php');
								
								?>

							</div>
							
						</div>
							
								

						
						</div>


					</div>
				</div>
			</div>
		</section>




		<!-- Bootstrap core JavaScript -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script>
			CKEDITOR.replace('editor1');
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>

	</html>
<?php } ?>