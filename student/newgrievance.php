<?php
session_start();
error_reporting(0);
include('../include/db.php');
//include_once('badwords3.php');
//<script="text/javascript" src="badwords3.php">
if (strlen($_SESSION['login']) == 0) {
	header('location:userlogin.php');
} else {
	if (isset($_POST['submit'])) {
		$uid = $_SESSION['id'];
		$grievance = $_POST['grievance'];
		$complain = $_POST['complain'];
		$name = $_FILES["proof"]["name"];
		$tempname = $_FILES["proof"]["tmp_name"];
		$folder = "assests/images/" . $name;
		move_uploaded_file($tempname, $folder);
		$isAnonymous = isset($_POST['anonymoususer']) ? $_POST['anonymoususer'] : 0;

		$query = mysqli_query($db, "insert into complain(userId,grievanceId,complain,proof,isAnonymous) values('$uid','$grievance','$complain','$name','$isAnonymous')");
		// code for show complaint number
		$sql = mysqli_query($db, "select complaintNumber from complain  order by complaintNumber desc limit 1");
		while ($row = mysqli_fetch_array($sql)) {
			$cmpn = $row['complaintNumber'];
		}
		$complainno = $cmpn;
		echo '<script> alert("Your complain has been successfully filled and your complaintno is  "+"' . $complainno . '")</script>';
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
		<title>Register New Grievance | GrivoTech</title>
		<!-- Bootstrap Core CSS -->
		<link href="assests/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--External CSS -->
		<link rel="stylesheet" href="assests/css/stu_style.css">
		<link href="assets/css/style-responsive.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
		<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />

		<script>
			function check_bad_words() {
				const badwords = ["shit", "ass", "bitch", "bloody", "bastard","fuck"];
				const complain = document.getElementById("complain-text").value;
				var words = complain.split(" ");
				const replacement = "*_*_*_*";
				var isBad = false;
				// console.log("Words were: ", words);
				words = words.map(w => {
					if (badwords.includes(w)) {
						isBad = true;
						return replacement;
					} else {
						return w;
					}
				});
				// console.log("Words became: ", words);
				if (isBad) {
					document.getElementById("complain-text").value = words.join(" ");
					alert("You complain contained some blocked words. We will replace them with " + replacement + ". Please check and submit again!");
					return false;
				} else {
					return true;
				}
			}

			function open_modal() {
				const val = document.getElementById("anonymous_checkbox").checked;
				if (val == true) {
					// Only show the modal when user is checking/ticking the checkbox
					$("#Conditions").modal("show");
				}
			}

			function terms_confirm(val) {
				if (val == false) {
					// The user has not accepted the terms and conditions, so untick the box.
					document.getElementById("anonymous_checkbox").checked = false;
				}
			}
		</script>
	</head>


	<body>
		<?php include('include/header.php'); ?>

		<section id="breadcrumb">
			<div class="container" style="margin-top: 2%; width: 97%;">
				<ol class="breadcrumb">
					<li><input type="button" value="Back" onclick="history.go(-1)"></li>
					<li><a href="dashboard.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
					<li class="active">Register Greivance</li>
				</ol>
			</div>
		</section>

		<!--navigation bar-->
		<section id="main">
			<div class="container" style="width: 97%;">
				<div class="row">
					<div class="col-md-2">
						<div class="list-group">
							<a href="index.php" class="list-group-item "><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard</a>
							<a href="newgrievance.php" class="list-group-item active main-color-bg"><i class="fa fa-plus" aria-hidden="true"></i> Register New Grievance</a>
							<a href="viewgrievance.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View Filed Grievance</a>
							<a href="grpgrievform.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Register Group Grievance</a>
							<a href="grpgrievview.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View Group Grievances</a><a href="stuprofile.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> My Profile</a>
							<a href="feedback.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> My Feedback</a>
						</div>


					</div>
					<div class="col-md-10">
						<div class="panel panel-default">
							<div class="panel-heading main-color-bg">
								<h3 class="panel-title">Register Grievance Form</h3>
							</div>
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
							<form onsubmit="return check_bad_words()" method="post" enctype="multipart/form-data">
								<div class="panel-body" style="min-height: 400px;">
									<br>
									<div class="form-group">
										<label class="col-md-4 control-label labelText">Grievance Type<span class="requerido"> *</span></label>
										<div class="col-md-8">
											<input type="hidden" class="form-control" placeholder="" required="required" name="hiddengrievanceid" val="" id="hiddenGid">
											<select name="grievance" id="grievanceType" class="selectStyle col-md-12" required="">
												<option value="">Select Category</option>
												<?php $sql = mysqli_query($db, "select id,categoryName from category ");
												while ($rw = mysqli_fetch_array($sql)) {
												?>
													<option value="<?php echo htmlentities($rw['id']); ?>"><?php echo htmlentities($rw['categoryName']); ?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
									<br><br>

									<br><br>
									<div class="form-group">
										<label class="col-md-4 control-label labelText" for="grievance">Complaint Details<span class="requerido"> *</span></label>
										<div class="col-md-8">
											<?php if (isset($_POST['complain'])) {
												echo '<textarea class="txtarea col-md-12" id="complain-text" name="complain" required rows="6" value="' . $_POST['complain'] . '"></textarea>';
											} else {
												echo '<textarea class="txtarea col-md-12" id="complain-text" name="complain" required rows="6"></textarea>';
											}
											?>

										</div>
									</div>
									<br><br><br><br><br><br><br>
									<div class="form-group">
										<label class="col-md-4 control-label labelText" for="grievance">Add Supporting Document (If any)</label>
										<div class="col-md-8 control-label">
											<input type="file" name="proof" id="myFile">
										</div>
									</div>
									<br>
									<!-- <div class="col-md-4 control-label">
										<input type="checkbox" name="anonymoususer" value="1" id="anonymoususer"> File Complain Anonymously
										</input>
									</div><br> <br> -->
									<div class="form-group colmd-4 col-md-offset-4">
										<!-- <input type="checkbox" id="anonymous_checkbox" data-toggle="modal" data-target="#Conditions"> File complaint anonymously</input> -->
										<input type="checkbox" id="anonymous_checkbox" onchange="open_modal()"> File complaint anonymously</input>
									</div>
									<div id="Conditions" class="modal fade" tabindex="-1" role="dialog">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Terms and Conditions</h5>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												</div>
												<div class="modal-body">
													<p> Please read the following terms and conditions before going anonymous:</p>
													<p> Now you can file the grievance privately and the other person related to the institution or management won't see your complaint.</p>

													<p>Your following information won't be shown or saved by the college/institution/management (depending on your choice for which you want to be anonymous) :</p>

													<p>• Your Name </p>
													<p>• Address </p>
													<p>• Your other sensitive information entered in this form </p>

													<p> However, your details still will be visible and saved to: </p>
													<p>• The Admin of Grivo-Tech </p>
													<p>• The Secretary/Higher Authorities of The Education Department of Andhra Pradesh </p>
													<p>• The Authorities of the University related to your Institution/ College / Management. </p>


													<p> By clicking the checkbox given here you are agreeing on: That all the information provided by you here, are correct by best of your knowledge.</p>
													<p> That you are fully aware of the seriousness of this grievance. </p>
													<p>Also, that by using abusive words for other, writing hate speeches or trying to humiliate another person by fraud or misrepresentation or the willful and
														knowingly filing a false complaint or any other portion of this may result in several civil and administrative penalties and will be prosecuted to the maximum extent possible under the law.</p>

												</div>
												<div class="modal-footer">
													<!-- <input type="checkbox" name="checkbox" value="check">I agree to terms and conditions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</input> -->
													<button type="button" class="btn btn-warning" name="agreed" data-dismiss="modal" onclick="terms_confirm(true)"> Agree</input>
														<button type="button" class="btn btn-primary" name="disagreed" data-dismiss="modal" onclick="terms_confirm(false)">Disagree</button>
														<!-- remove href and use java script to close modal. -->
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-offset-4 col-md-4 control-label">
											<button class="btn btn-success btn-block" type="submit" name="submit">Submit</button>
										</div>
									</div>
									<br><br>
									<div class="col-md-12">
										<p><STRONG><u>Note:</u></STRONG><br>
											<strong style="color: red;">*</strong></em><i> are mandatory to be filled.<i><br>
													<em><b>Supported Document types:</b> <i>".jpeg, .jpg, .png, .pdf, .mp4, .flv, .mkv"</i>. Please Upload the file of this type only.</em><br>
													<i><b>Don't use Offensive language.</b> If you are found doing so, Strict actions will be taken against you.</i><br>
										</p>
									</div>




							</form>
						</div>
					</div>
				</div>
			</div>
		</section>


		<?php include('include/footer.php');  ?>
		<!-- js placed at the end of the document so the pages load faster -->
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