<?php
session_start();
include('../include/db.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:adminlogin.php');
}
else{
if(isset($_POST['submit']))
{
    $univ=$_POST['univ'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$id=intval($_GET['id']);
$sql=mysqli_query($db,"update academy set collegeName='$college',email='$email',password='$password' where id='$id'");
$_SESSION['msg']="College info Updated !!";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit University Details | Admin | GrivoTech</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/theme.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>
<?php include('include/header.php');?>

	<section id="breadcrumb">
		<div class="container" style="margin-top: 2% ; width: 97%;">
			<ol class="breadcrumb">
				<li><input type="button" value="Back" onclick="history.go(-1)"></li>
			 	<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
			 	<li class="active">Edit University</li>
			</ol>
		</div>
	</section>

	<div class="wrapper">
		<div class="container" style="width: 97%;">
			<div class="row">
              <div class="col-md-2">
					<div class="list-group">
						<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard</a>
						<a href="reviewGrievanceSection.php" class="list-group-item "><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> In-Progress Grievance <span class="badge"></span></a>
						<a href="unsolvedGrievanceSection.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Un-Solved Grievance <span class="badge"></span></a>
						<a href="solvedGrievanceSection.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Solved Grievance <span class="badge"></span></a>
						<a href="pushF.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Pushed Grievance <span class="badge"></span></a>
						<a href="petitions.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> View Petitions <span class="badge"></span></a>
						
						<a href="addUniv.php" class="list-group-item"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Add University</a>
						
							<a href="stats.php" class="list-group-item"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Statistics</a>
						<a href="statsfeedback.php" class="list-group-item"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Feedback</a>
						<a href="profile.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a>
					</div>
					
				</div>			
			<div class="col-md-10">
					<div class="content">

						<div class="module">
							<div class="module-head main-color-bg">
								<h3>University</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
                                        {?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
                                       <?php } ?>


									<br />

			<form class="form-horizontal row-fluid" name="Category" method="post" >
<?php
$id=intval($_GET['id']);
$query=mysqli_query($db,"select * from university where id='$id'");
while($row=mysqli_fetch_array($query))
{
?>									
<div class="control-group">
<label class="control-label" for="basicinput">University Name</label>
<div class="controls">
<input type="text" placeholder="Enter University Name"  name="univ" value="<?php echo  htmlentities($row['univName']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Email Id</label>
<div class="controls">
<input type="text" placeholder="Enter Email Id"  name="email" value="<?php echo  htmlentities($row['email']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Password</label>
<div class="controls">
<input type="text" placeholder="Enter Password"  name="password" value="<?php echo  htmlentities($row['password']);?>" class="span8 tip" required>
</div>
</div>
									<?php } ?>	

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Update</button>
											</div>
										</div>
									</form>
							</div>
						</div>


						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->


	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
</html>
<?php } ?>