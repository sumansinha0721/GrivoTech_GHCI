<!--to make coonection and include header in this page-->
<?php
session_start();
if(!isset($_SESSION['username']))
{
	$_SESSION['msg']="You must log in to view this page";
	header('location:userlogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard | GrivoTech</title>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--External CSS -->
	<link rel="stylesheet" href="css/stu_style.css">
</head>
<body>
<?php include_once('include/header.php'); ?>
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><i class="fa fa-cog" aria-hidden="true"></i> Success Confirmation <small>Track status with this number</small></h1> 
				</div>
			</div>
		</div>
	</header>

	<section id="breadcrumb">
		<div class="container">
			 <ol class="breadcrumb">
			 	<li><a href="newgrievance.php">Register New Grievance</a></li>
			 	<li class="active">Grievance filed Successfully</li>
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
						<a href="viewgrievance.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View Filed Grievances</a>
						<a href="groupcomplaint/massgrievform.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Register Petition</a>
						<a href="groupcomplaint/massgrievview.php" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> View Petitions</a>
						<a href="stuprofile.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> My Profile</a>
					</div>
					<!--I will work on it later, it will be used to show the no.s of filed grievances and no. of solved grievances-->
					<div class="well">
                       <h4>Solved Grievance</h4><br><br><br>
						<!--<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50
							</div>
						</div>-->
						<h4>In-Review Grievance</h4><br>
						<!--<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50
							</div>
						</div>-->
					</div>
				</div>
				<div class="col-md-10">
					<div class="panel panel-default">
						<div class="panel-heading main-color-bg">
							<h3 class="panel-title">Tracking number</h3>
						</div>
						<div class="panel-body" style="height:380px;">
							<div class="col-md-12">
								<div class="well dash-box">

								</div>
							</div>
							<div class="col-md-offset-4 col-md-4 control-label">
								<button class="btn btn-success btn-block" type="submit"> <a href="viewgrievance.php"><font color="#000000"><center>Redirect Me to View Grievance</center></font></a></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


<?php include('../include/footer.php');  ?>
</body></html>