<?php
session_start();
error_reporting(0);
include('../include/db.php');
// echo $_SERVER['HTTP_HOST'];
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
		$isAnonymous = 0;
		$isGroupComplaint = 1;

		$query = mysqli_query($db, "insert into complain(userId,grievanceId,complain,proof,isAnonymous, isGroupComplaint) values('$uid','$grievance','$complain','$name','$isAnonymous', $isGroupComplaint)");
		// code for show complaint number
		$sql = mysqli_query($db, "select complaintNumber from complain  order by complaintNumber desc limit 1");
		while ($row = mysqli_fetch_array($sql)) {
			$cmpn = $row['complaintNumber'];
		}
		$complainno = $cmpn;
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
		<!-- JQUERY -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Bootstrap Core CSS -->
		<link href="assests/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!--External CSS -->
		<link rel="stylesheet" href="assests/css/stu_style.css">
		<link href="assets/css/style-responsive.css" rel="stylesheet">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


		<script>
			function check_bad_words() {
				const badwords = ["shit", "ass", "bitch", "bloody", "bastard"];
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
				} else {
					document.getElementById("submit").disabled = true;
				}
			}

			function terms_confirm(val) {
				if (val == false) {
					// The user has not accepted the terms and conditions, so untick the box.
					document.getElementById("anonymous_checkbox").checked = false;
					document.getElementById("submit").disabled = true;
				} else {
					document.getElementById("submit").disabled = false;
				}
			}
		</script>
	</head>


	<body>
		<?php include('include/header.php'); ?>

		<section id="breadcrumb">
			<div class="container" style="margin-top: 2% ; width: 97%;">
				<ol class="breadcrumb">
					<li><input type="button" value="Back" onclick="history.go(-1)"></li>
					<li><a href="dashboard.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
					<li class="active">Register Group Grievance</li>
				</ol>
			</div>
		</section>

		<!--navigation bar-->
		<section id="main">
			<div class="container" style="width: 97%;">
				<div class="row">
					<div class="col-md-2">
						<div class="list-group">
							<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard</a>
							<a href="newgrievance.php" class="list-group-item"><i class="fa fa-plus" aria-hidden="true"></i> Register New Grievance</a>
							<a href="viewgrievance.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View Filed Grievances</a>
							<a href="grpgrievform.php" class="list-group-item  active main-color-bg"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Register Petition</a>
							<a href="grpgrievview.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View Petitions</a>
							<a href="stuprofile.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> My Profile</a>
						</div>
						<!--I will work on it later, it will be used to show the no.s of filed grievances and no. of solved grievances-->
					</div>

					<?php
					if (!isset($complainno)) {
					?>
						<div class="col-md-10">
							<div class="panel panel-default">
								<div class="panel-heading main-color-bg">
									<h3 class="panel-title">Register Petition Form</h3>
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
													<?php
													$sql = mysqli_query($db, "select id, categoryName from category ");
													while ($rw = mysqli_fetch_array($sql)) {
														echo $rw['categoryName'];
													?>
														<option value="<?php echo htmlentities($rw['id']); ?>"><?php echo htmlentities($rw['categoryName']); ?></option>
													<?php
													}
													?>
												</select>
											</div>
										</div>
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

										<div class="form-group colmd-4 col-md-offset-4">
											<!-- <input type="checkbox" id="anonymous_checkbox" data-toggle="modal" data-target="#Conditions"> File complaint anonymously</input> -->
											<input type="checkbox" id="anonymous_checkbox" onchange="open_modal()"> I agree to the terms of group grievance. </input>
										</div>
										<div id="Conditions" class="modal fade" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Terms and Conditions</h5>
													</div>
													<div class="modal-body">
														<p>
															Petitions are a way to bring the grievances of the masses directly to the attention of the State's education council.
														</p>
														<p>Once this petition gets 200+ vote, it will be prompted for action from higher authorities (University, or State's education council members.)</p>
														<p>Please file only the grievances which are faced by many users in your department, institute, or university. </p>
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
												<button class="btn btn-success btn-block" type="submit" name="submit" id="submit" disabled>Submit</button>
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
					<?php
					} else {
						$url = explode('/', $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
						array_pop($url);
						$url = implode('/', $url);
						$url = "http://" . $url . '/view_complaint.php?id=' . $complainno;
						$title = urlencode("View our petition on GrivoTech portal");
						$twitter_params =
							'?text=' . $title . '+-' .
							'&amp;url=' . urlencode($url) .
							'&amp;counturl=' . urlencode($url) .
							'';
					?>
						<div class='col-md-10'>
							<div class='panel panel-default'>
								<div class='panel-heading main-color-bg'>
									<h3 class='panel-title'> Group complaint registered successfully. </h3>
								</div>
								<div class='panel-body'>
									<p> You can view and share your group complaint at: <a href="<?php echo $url ?> "><?php echo $url ?></a> </p>
									<p> Share on your social network to get more votes:
										<p>
											<button style="margin: 1em;" class='btn btn-success' onclick="location.href ='https://api.whatsapp.com/send?phone=&text=<?php echo $url; ?>';"><i class='fa fa-whatsapp' style='font-size:48px;'></i></button>
											<button style="margin: 1em;" class='btn btn-info' onclick="location.href ='http://twitter.com/share<?php echo $twitter_params; ?>';"><i class='fa fa-twitter' style='font-size:48px;'></i></button>
											<button style="margin: 1em;"class='btn btn-primary' onclick="location.href ='https://www.facebook.com/sharer.php?u=<?php echo $twitter_params; ?>&t=<?php echo $title; ?>';"><i class='fa fa-facebook' style='font-size:48px;'></i></button>
										</p>
									</p>
								</div>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</section>


		<?php include('include/footer.php');  ?>

	</body>

	</html>
<?php } ?>