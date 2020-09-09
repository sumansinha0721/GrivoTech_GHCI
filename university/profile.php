<?php 
session_start();
error_reporting(0);
include('../include/db.php');

if(strlen($_SESSION['alogin'])==0)
  { 
header('location:adminlogin.php');
}
else{
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>University Profile | GrivoTech</title>
	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>
	<?php include("include/header.php"); ?>

	<section id="breadcrumb">
		<div class="container" style="margin-top:2%; width: 97%;">
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
						<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard</a>
						<a href="reviewGrievanceSection.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> In-Progress Grievance <span class="badge"></span></a>
						<a href="unsolvedGrievanceSection.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Un-Solved Grievance <span class="badge"></span></a>
						<a href="solvedGrievanceSection.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Solved Grievance <span class="badge"></span></a>
						<a href="pushF.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Pushed Grievance <span class="badge"></span></a>
						<a href="addCollege.php" class="list-group-item"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Add College</a>
						<a href="profile.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a>
					</div>
				</div>
				<div class="col-md-10">
					<!-- Website Overview -->

					<div class="panel panel-default">
						<div class="panel-heading main-color-bg">
							<h3 class="panel-title">Profile</h3>
						</div>
						<div class="panel-body" style="min-height: 400px;">
<form class="form-horizontal style-form" method="post" name="profile">


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Full Name</label>
<div class="col-sm-4">
<input type="text" name="name" required="required" value="Write Name" class="form-control" readonly>
 </div>
<label class="col-sm-2 col-sm-2 control-label">User Email </label>
 <div class="col-sm-4">
<input type="email" name="email" required="required" value="Write Email" class="form-control" readonly>
</div>
 </div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Contact</label>
 <div class="col-sm-4">
<input type="text" name="mobile" required="required" value="Write Mobile" class="form-control" required maxlength="10" readonly>
</div>
<label class="col-sm-2 col-sm-2 control-label">Aadhar</label>
<div class="col-sm-4">
<input type="text"  name="aadhar" required="required" class="form-control" value="Write Aadhar" required maxlength="12"  readonly>
</div>
</div>

<div class="form-group">

 <label class="col-sm-2 col-sm-2 control-label">College</label>
<div class="col-sm-4">
<input type="text"  name="college" required="required" class="form-control" readonly value="College Name">
</div>
 
<label class="col-sm-2 col-sm-2 control-label">Course</label>
 <div class="col-sm-4">
<input type="text" name="course" required="required" value="Course offered" class="form-control" readonly>
</div>
 </div>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Branch</label>
<div class="col-sm-4">
<input type="text" name="branch" maxlength="6" required="required" value="Branch" class="form-control" readonly>
</div>
<label class="col-sm-2 col-sm-2 control-label">Session</label>
<div class="col-sm-4">
<input type="text" name="start" required="required" value="Session" class="form-control" readonly>
 </div>

 </div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">End Year</label>
 <div class="col-sm-4">
<input type="text" name="end" required="required" value="Start Year" class="form-control" required maxlength="4" readonly>
</div>
<label class="col-sm-2 col-sm-2 control-label">City</label>
<div class="col-sm-4">
<input type="text" name="city" required="required" value="End Year" class="form-control"  readonly>
 </div>

 </div>

<div class="form-group">

<label class="col-sm-2 col-sm-2 control-label">State</label>
 <div class="col-sm-4">
<input type="text" name="state" required="required" value="State" class="form-control" readonly>
</div>
<label class="col-sm-2 col-sm-2 control-label">Reg Date </label>
<div class="col-sm-4">
<input type="text" name="regdate" required="required" value="Reg Date" class="form-control" readonly>
 </div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">CollegeId</label>
 <div class="col-sm-4">
<input type="text" name="registration" required="required" value="College ID" class="form-control" required readonly>
</div>
</div>




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
<?php  } ?>