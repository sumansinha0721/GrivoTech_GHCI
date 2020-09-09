<?php
session_start();
error_reporting(0);
include_once('../include/db.php');

if (strlen($_SESSION['login']) == 0) {
	header('location:userlogin.php');
} else if (isset($_SESSION['showFeedback']) && $_SESSION['showFeedback'] == true) {
	include('feedback.php');
	$_SESSION['showFeedback'] = false;
}
?>
<!--to make coonection and include header in this page-->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<link href="assests/css/bootstrap.min.css" rel="stylesheet">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<title>Dashboard | GrivoTech</title>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assests/css/stu_style.css">
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--External CSS -->
	<link rel="stylesheet" href="css/stu_style.css">
	<link href="assets/css/style-responsive.css" rel="stylesheet">
	<script>
		function sitaModal(val) {
			document.getElementById("help").style.display = val;
		}
	</script>
</head>

<body>
	<?php include_once('include/header.php'); ?>


	<section id="breadcrumb">
		<div class="container" style="margin-top: 2%; width: 97%;">
			<ol class="breadcrumb">
				<li><span class="glyphicon glyphicon-home" aria-hidden="true"></span></li>
				<li class="pull-right" onclick="sitaModal('block');"><span class="glyphicon glyphicon-question-sign" style="font-size: 22px;" aria-hidden="true"></span></li>
			</ol>
		</div>
	</section>

	<!--navigation bar-->
	<section id="main">
		<div class="container" style="width: 97%;">


			<div class="row">


				<?php include('include/sidebar.php'); ?>

				<div class="col-md-10">
					<div id="help" class="panel panel-default">
						<panel class="panel-body">
							<div style="display: flex; flex-direction: row; font-family:helvetica;">
								<img src=" ../assets/img/lady-image.png" style="margin-left: 0.5em; margin-right: 0.5em; height: 100%" />
								<div>
									<i>
										<p><strong>Hello <?php echo $_SESSION['name'] ?>,</strong></p>
										<p>I am Sita.
											I can help you get a solution for your <a href="newgrievance.php">grievances</a>, or <a href="viewgrievance.php">track</a> previous grievances using this portal. </p>
										<p>Your educational institute and state are very concerned about the grievances you face as a student, and we would like to resolve them at the earliest.</p>
										<p>We provide an option for you to go anonymous in case you are not comfortable revealing your identity.
											If you and your colleagues want to raise attention towards some common grievances, then you can also start a
											<a href="grpgrievform.php">petition</a>. Once this petition is voted by 200+ users,
											it will be directly sent to the State's education council, and you will be able to <a href="grpgrievview.php">track</a>
											how the government is taking steps to resolve your concerns.
										</p>
										<p> You can click the help icon <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> on top of this page to open this dialog again.</p>
									</i>

								</div>
								<button class="btn btn-primary" onclick="sitaModal('none');" style="margin-right: 0.2em; height: 30px; "><i class="fa fa-close"></i> </button>
							</div>
						</panel>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading main-color-bg">
							<h3 class="panel-title"> Statistics of grievances </h3>
						</div>
						<div class="panel-body" style="height:400px;">
							<div class="col-md-4">
								<div class="well dash-box" style="height:150px;">
									<h2>
										<center><span class="glyphicon glyphicon-list" aria-hidden="true"></span> <?php

																													$rt = mysqli_query($db, "SELECT * FROM complain where userId='" . $_SESSION['id'] . "' and status is null");
																													$num1 = mysqli_num_rows($rt); { ?>
												<?php echo htmlentities($num1); ?>
									</h2>
									<h4>
										<center>Unsolved Grievances</center>
									</h4>
									</center>
								</div>

							</div>
						<?php } ?>
						<div class="col-md-4">
							<div class="well dash-box" style="height:150px;">
								<h2>
									<center><span class="glyphicon glyphicon-list" aria-hidden="true"></span> <?php
																												$status = "in process";
																												$rt = mysqli_query($db, "SELECT * FROM complain where userId='" . $_SESSION['id'] . "' and  status='$status'");
																												$num1 = mysqli_num_rows($rt); { ?>
											<?php echo htmlentities($num1); ?></center>
								</h2>
								<h4>
									<center>In-Progress</center>
								</h4>



							</div>

						</div>
					<?php } ?>

					<div class="col-md-4">
						<div class="well dash-box" style="height:150px;">
							<h2>
								<center><span class="glyphicon glyphicon-list" aria-hidden="true"></span> <?php
																											$status = "closed";
																											$rt = mysqli_query($db, "SELECT * FROM complain where userId='" . $_SESSION['id'] . "' and  status='$status'");
																											$num1 = mysqli_num_rows($rt); { ?>
										<?php echo htmlentities($num1); ?></center>
							</h2>
							<h4>
								<center>Solved Grievances</center>
							</h4>

						</div>

					</div>
				<?php } ?>

						</div>
					</div>
				</div>

			</div>
		</div>
	</section>


	<?php include('../include/footer.php');  ?>
	<!-- Bootstrap score JavaScript -->
	<!-- Placed at the end of the document so that the pages loads faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- js placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery-1.8.3.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="assets/js/jquery.scrollTo.min.js"></script>
	<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
	<script src="assets/js/jquery.sparkline.js"></script>


	<!--common script for all pages-->
	<script src="assets/js/common-scripts.js"></script>

	<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="assets/js/gritter-conf.js"></script>

	<!--script for this page-->
	<script src="assets/js/sparkline-chart.js"></script>
	<script src="assets/js/zabuto_calendar.js"></script>
</body>

</html>