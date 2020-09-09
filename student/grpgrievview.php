<?php session_start();
error_reporting(0);
include('../include/db.php');
/* Here, write code for fetching data of group grievance.

if(isset($_POST['ASC'])){
	$asc="SELECT * FROM complain where userId='".$_SESSION['id']."' ORDER by complaintNumber ASC ";
	$result=executeQuery($asc);
}
else if(isset($_POST['DESC'])){
	$desc="SELECT * FROM complain where userId='".$_SESSION['id']."' ORDER by complaintNumber DESC ";
	$result=executeQuery($desc);
}
else{
	$query="SELECT * FROM complain where userId='".$_SESSION['id']."' ORDER BY regDate DESC ";
	$result=executeQuery($query);
}
//include('include/db.php');
function executeQuery($query){
	include('include/db.php');
	$result=mysqli_query($db,$query);
	return $result;
}
if(strlen($_SESSION['login'])==0)
  { 
header('location:userlogin.php');
}

else{  */
$query = "SELECT c.*, cat.categoryName as categoryName FROM complain c JOIN category cat ON c.grievanceId=cat.id where isGroupComplaint=1";
$groupComplaints = mysqli_query($db, $query);
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
	<title>View Petitions | GrivoTech</title>
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

</head>

<body>
	<section id="container">
		<?php include('include/header.php');  ?>

		<section id="breadcrumb">
			<div class="container" style="margin-top: 2% ; width: 97%;">
				<ol class="breadcrumb">
					<li><input type="button" value="Back" onclick="history.go(-1)"></li>
					<li><a href="dashboard.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
					<li class="active">View Petitions</li>
				</ol>
			</div>
		</section>

		<!--navigation bar-->
		<section id="main">
			<div class="container" style="width: 97%;">
				<div class="row">
					<div class="col-md-2">
						<div class="list-group">
							<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard</a>
							<a href="newgrievance.php" class="list-group-item"><i class="fa fa-plus" aria-hidden="true"></i> Register New Grievance</a>
							<a href="viewgrievance.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View Filed Grievances</a>
							<a href="grpgrievform.php" class="list-group-item"><span class="fa fa-plus" aria-hidden="true"></span> Register Petition</a>
							<a href="grpgrievview.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View Petitions</a>
							<a href="stuprofile.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> My Profile</a>
						</div>
					</div>
					<div class="col-md-10">
						<div class="panel panel-default">
							<div class="panel-heading main-color-bg">
								<h3 class="panel-title">View Petitions Details</h3>
							</div>
							<div class="panel-body" style="min-height: 400px;">

								<section id="main-content">
									<section class="wrapper">
										<div class="row mt">
											<div class="col-lg-12">
												<div class="content-panel">
													<section id="unseen">
														<form method="post">
															<input type="submit" name="ASC" value="Oldest" style="float:right;margin-bottom:6px;">
															<input type="submit" name="DESC" value="Newest" style="float:right;">
															<table class="table table-bordered table-striped table-condensed table-responsive">
																<thead>
																	<tr style="text-align: center">
																		<th style="text-align: center">Complaint Category</th>
																		<th style="text-align: center">Complaint Description</th>
																		<th style="text-align: center">Reg Date</th>
																		<th style="text-align: center">Status</th>
																		<th style="text-align: center">View Details</th>

																	</tr>
																</thead>
																<tbody>
																	<?php
																	while ($r = $groupComplaints->fetch_assoc()) {
																	?>
																		<tr>
																			<td><?php echo $r['categoryName']; ?></td>
																			<!-- Show only first 100 characters of the complaint -->
																			<td><?php echo substr($r['complain'], 0, 100); ?></td>
																			<td><?php echo $r['regDate']; ?></td>
																			<td>
																				<?php
																				echo $r["status"];
																				if ($r['status'] == "" || $r['status'] == NULL) {
																					echo "Not started";
																				} else {
																					echo $r['status'];
																				}
																				?>
																			</td>
																			<td>
																				<?php
																				$url = explode('/', $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
																				array_pop($url);
																				$url = implode('/', $url);
																				$url = "http://" . $url . '/view_complaint.php?id=' . $r['complaintNumber'];
																				?>
																				<a href="<?php echo $url; ?>"> View </a>
																			</td>

																		</tr>
																	<?php
																	}
																	?>

																</tbody>
															</table>
														</form>
													</section>
												</div><!-- /content-panel -->
											</div><!-- /col-lg-4 -->
										</div><!-- /row -->



									</section>
									<!---wrapper -->
								</section>
							</div>
						</div>
					</div>

				</div>
			</div>
			<?php include('../include/footer.php');  ?>
		</section>
		<!-- <script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="assets/js/jquery.scrollTo.min.js"></script>
		<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


		<script src="assets/js/common-scripts.js"></script>
		<script>
			CKEDITOR.replace('editor1');
		</script> -->