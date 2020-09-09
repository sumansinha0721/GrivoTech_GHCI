<?php
session_start();
error_reporting(0);
include('../include/db.php');
if (strlen($_SESSION['login']) == 0) {
	header('location:index.php');
} else {
	date_default_timezone_set('Asia/Kolkata');
	$currentTime = date('d-m-Y h:i:s A', time());


	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$aadhar = $_POST['aadhar'];
		$college = $_POST['college'];
		$course = $_POST['course'];
		$branch = $_POST['branch'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$registration = $_POST['registration'];
		$query = mysqli_query($db, "update student set name='$name',mobile='$mobile',aadhar='$aadhar',college='$college',course='$course',branch='$branch',start='$start',end='$end',city='$city',state='$state',registration='$registration' where email='" . $_SESSION['login'] . "'");
		if ($query) {
			$successmsg = "Profile Successfully updated!!";
		} else {
			$errormsg = "Profile not updated !!";
		}
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Dashboard">
		<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
		<title>Profile | GrivoTech</title>
		<!-- Bootstrap Core CSS -->
		<link href="assests/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--External CSS -->
		<link rel="stylesheet" href="assests/css/stu_style.css">


	</head>

	<body>

		<?php include('include/header.php');  ?>

		<section id="breadcrumb">
			<div class="container" style="margin-top: 2% ; width: 97%;">
				<ol class="breadcrumb">
					<li><input type="button" value="Back" onclick="history.go(-1)"></li>
					<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
					<li class="active">Profile</li>
				</ol>
			</div>
		</section>


		<section id="main">
			<div class="container" style="width: 97%;">
				<div class="row">
					<div class="col-md-2">
						<div class="list-group">
							<a href="index.php" class="list-group-item "><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard</a>
							<a href="newgrievance.php" class="list-group-item"><i class="fa fa-plus" aria-hidden="true"></i> Register New Grievance</a>
							<a href="viewgrievance.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View Filed Grievances</a>
							<a href="grpgrievform.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Register Petition</a>
							<a href="grpgrievview.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View Petitions</a>
							<a href="stuprofile.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> My Profile</a>
						</div>

					</div>

					<div class="col-md-10">
						<div class=" panel panel-default">
							<div class="panel-heading main-color-bg">
								<h3 class="panel-title">Profile</h3>
							</div>

							<div class="panel-body">


								<?php if ($successmsg) { ?>
									<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<b>Well done!</b> <?php echo htmlentities($successmsg); ?></div>
								<?php } ?>

								<?php if ($errormsg) { ?>
									<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<b>Oh snap!</b> </b> <?php echo htmlentities($errormsg); ?></div>
								<?php } ?>
								<?php $query = mysqli_query($db, "select * from student where student_id='" . $_SESSION['id'] . "'");
								while ($row = mysqli_fetch_array($query)) {
								?>


									<form class="form-horizontal style-form" method="post" name="profile">


										<div class="form-group">

											<div class="col-sm-4 col-sm-offset-4">
												<?php $userphoto = $row['userImage'];
												if ($userphoto == "") :
												?>
													<img src="userimages/pic.png" width="156" height="156">
													<a href="update-image.php">Change Photo</a>
												<?php else : ?>
													<img src="userimages/<?php echo htmlentities($userphoto); ?>" width="156" height="156">
													<a href="update-image.php">Change Photo</a>
												<?php endif; ?>
											</div>

										</div>
										<div class="form-group">
											<label class="col-sm-2 col-sm-2 control-label">Full Name</label>
											<div class="col-sm-4">
												<input type="text" name="name" required="required" value="<?php echo htmlentities($row['name']); ?>" class="form-control" readonly>
											</div>
											<label class="col-sm-2 col-sm-2 control-label">User Email </label>
											<div class="col-sm-4">
												<input type="email" name="email" required="required" value="<?php echo htmlentities($row['email']); ?>" class="form-control" readonly>
											</div>
										</div>


										<div class="form-group">
											<label class="col-sm-2 col-sm-2 control-label">Contact</label>
											<div class="col-sm-4">
												<input type="text" name="mobile" required="required" value="<?php echo htmlentities($row['mobile']); ?>" class="form-control" required maxlength="10" readonly>
											</div>
											<label class="col-sm-2 col-sm-2 control-label">Aadhar</label>
											<div class="col-sm-4">
												<input type="text" name="aadhar" required="required" class="form-control" value="<?php echo htmlentities($row['aadhar']); ?>" required maxlength="12" readonly>
											</div>
										</div>

										<div class="form-group">


											<label class="col-sm-2 col-sm-2 control-label">College</label>
											<div class="col-sm-4">
												<select name="college" required="required" class="form-control" readonly>
													<option value="<?php echo htmlentities($row['college']); ?>"><?php echo htmlentities($st = $row['college']); ?></option>
													<?php $sql = mysqli_query($db, "select collegeName from academy ");
													while ($rw = mysqli_fetch_array($sql)) {
														if ($rw['collegeName'] == $st) {
															continue;
														} else {
													?>
															<option value="<?php echo htmlentities($rw['collegeName']); ?>"><?php echo htmlentities($rw['collegeName']); ?></option>
													<?php
														}
													}
													?>

												</select>
											</div>

											<label class="col-sm-2 col-sm-2 control-label">Course</label>
											<div class="col-sm-4">
												<input type="text" name="course" required="required" value="<?php echo htmlentities($row['course']); ?>" class="form-control" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 col-sm-2 control-label">Branch</label>
											<div class="col-sm-4">
												<input type="text" name="branch" maxlength="6" required="required" value="<?php echo htmlentities($row['branch']); ?>" class="form-control" readonly>
											</div>
											<label class="col-sm-2 col-sm-2 control-label">Session</label>
											<div class="col-sm-4">
												<input type="text" name="start" required="required" value="<?php echo htmlentities($row['start']); ?>" class="form-control" readonly>
											</div>

										</div>

										<div class="form-group">
											<label class="col-sm-2 col-sm-2 control-label">End Year</label>
											<div class="col-sm-4">
												<input type="text" name="end" required="required" value="<?php echo htmlentities($row['end']); ?>" class="form-control" required maxlength="4" readonly>
											</div>
											<label class="col-sm-2 col-sm-2 control-label">City</label>
											<div class="col-sm-4">
												<input type="text" name="city" required="required" value="<?php echo htmlentities($row['city']); ?>" class="form-control" readonly>
											</div>

										</div>

										<div class="form-group">

											<label class="col-sm-2 col-sm-2 control-label">State</label>
											<div class="col-sm-4">
												<input type="text" name="state" required="required" value="<?php echo htmlentities($row['state']); ?>" class="form-control" readonly>
											</div>
											<label class="col-sm-2 col-sm-2 control-label">Reg Date </label>
											<div class="col-sm-4">
												<input type="text" name="regdate" required="required" value="<?php echo htmlentities($row['regDate']); ?>" class="form-control" readonly>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 col-sm-2 control-label">CollegeId</label>
											<div class="col-sm-4">
												<input type="text" name="registration" required="required" value="<?php echo htmlentities($row['registration']); ?>" class="form-control" required readonly>
											</div>
										</div>





									<?php } ?>

									<div class="form-group">
										<div class="col-sm-10 col-sm-offset-3" style="padding-left:25% ">
											<button type="submit" name="submit" class="btn btn-primary">Submit</button>
										</div>
									</div>

									</form>



							</div>



						</div>
					</div>




				</div>
			</div>
		</section>


		<?php include('../include/footer.php');  ?>
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="assets/js/jquery.scrollTo.min.js"></script>
		<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


		<!--common script for all pages-->
		<script src="assets/js/common-scripts.js"></script>

		<!--script for this page-->
		<script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

		<!--custom switch-->
		<script src="assets/js/bootstrap-switch.js"></script>

		<!--custom tagsinput-->
		<script src="assets/js/jquery.tagsinput.js"></script>

		<!--custom checkbox & radio-->

		<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

		<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


		<script src="assets/js/form-component.js"></script>


		<script>
			//custom select box

			$(function() {
				$('select.styled').customSelect();
			});
		</script>

	</body>

	</html>
<?php } ?>