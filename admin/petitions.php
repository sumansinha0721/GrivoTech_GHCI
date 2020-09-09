<?php
session_start();
error_reporting(0);
include('../include/db.php');

if (strlen($_SESSION['alogin']) == 0) {
	header('location:adminlogin.php');
} else {
	$query = "SELECT c.*, cat.categoryName as categoryName, COUNT(s.userId) as count FROM complain c JOIN category cat ON c.grievanceId=cat.id LEFT OUTER JOIN supporters s ON s.complaintId=c.complaintNumber where isGroupComplaint=1";
	$groupComplaints = mysqli_query($db, $query);
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>View Petition | GrivoTech</title>
		<!-- Bootstrap core CSS -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
	</head>

	<body>
		<?php include("include/header.php"); ?>


		<section id="breadcrumb">
			<div class="container" style="margin-top: 2% ; width: 97%;">
				<ol class="breadcrumb">
					<li><input type="button" value="Back" onclick="history.go(-1)"></li>
					<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
					<li class="active">Petition Grievance</li>
				</ol>
			</div>
		</section>

		<section id="main">
			<div class="container" style="width: 97%;">
				<div class="row">
					<div class="col-md-2">
						<div class="list-group">
							<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard</a>
							<a href="reviewGrievanceSection.php" class="list-group-item  "><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> In-Progress Grievance <span class="badge"></span></a>
							<a href="unsolvedGrievanceSection.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Un-Solved Grievance <span class="badge"></span></a>
							<a href="solvedGrievanceSection.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Solved Grievance <span class="badge"></span></a>
							<a href="pushF.php" class="list-group-item "><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Pushed Grievance <span class="badge"></span></a>
							<a href="petitions.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> View Petitions <span class="badge"></span></a>
							<a href="addUniv.php" class="list-group-item"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Add University</a>
							<a href="stats.php" class="list-group-item"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Statistics</a>
							<a href="statsfeedback.php" class="list-group-item"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Feedback</a>
							<a href="profile.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a>
						</div>
					</div>
					<div class="col-md-10">
						<!-- Website Overview-->
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
																		<th style="text-align: center">Votes</th>
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
																			<th style="text-align: center"><?php echo $r['count']; ?></th>
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