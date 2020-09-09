<?php
session_start();
error_reporting(0);
include('../include/db.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:userlogin.php');
}
else{
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$imgfile=$_FILES["image"]["name"];

$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");

// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$imgnewfile=md5($imgfile).$extension;
// Code for move image into directory
move_uploaded_file($_FILES["image"]["tmp_name"],"userimages/".$imgnewfile);
// Query for insertion data into database
$query=mysqli_query($db,"update student set userImage='$imgnewfile' where email='".$_SESSION['login']."'");
if($query)
{
$successmsg="Profile photo updated Successfully !!";
}
else
{
$errormsg="Profile photo not updated !!";
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Profile Photo | Grivotech </title>

    <!-- Bootstrap core CSS -->
<link href="assests/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--External CSS -->
	<link rel="stylesheet" href="assests/css/stu_style.css">
  
  </head>

  <body>

  <section id="container" >
     <?php include("include/header.php");?>
	

	<section id="breadcrumb">
		<div class="container" style="margin-top: 2% ; width: 97%;">
			 <ol class="breadcrumb">
			 	<li><input type="button" value="Back" onclick="history.go(-1)"></li>
			 	<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
			 	<li class="active">Profile photo</li>
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
      
			
			
          	<!-- BASIC FORM ELELEMNTS -->
          	
          		<div class="col-md-9">
				<div class=" panel panel-default">
						<div class="panel-heading main-color-bg">
							<h3 class="panel-title">Profile Photo</h3>
						</div>
                  <div class="form-panel" style="min-height: 400px;">
                  	

                      <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>
 <?php $query=mysqli_query($db,"select * from student where email='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>                     

    
                      <form class="form-horizontal style-form" enctype="multipart/form-data"  method="post" name="profile" style="margin-top: 2%;">







<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">User Photo</label>
<div class="col-sm-4">
<?php $userphoto=$row['userImage'];
if($userphoto==""):
?>
<img src="userimages/pic.png" width="156" height="156" >
<?php else:?>
	<img src="userimages/<?php echo htmlentities($userphoto);?>" width="156" height="156">

<?php endif;?>
</div>

</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Upload New Photo</label>
<div class="col-sm-4">
<input type="file" name="image"  required />
</div>

</div>







<?php } ?>

                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>

                          </form>
                          </div>
                          </div>
                          </div>
                          
          	
          	


  </section>
  </div></div></section>
    <?php include("../include/footer.php");?>
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

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
