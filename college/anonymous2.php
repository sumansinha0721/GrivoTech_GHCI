<?php
session_start();
include('../include/db.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:cllglogin.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="img/logogrivotech.png">
	<title>Anonymous | In-Process Grievance | Grievance Menu | GrivoTech</title>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--External CSS -->
	<link rel="stylesheet" href="css/fac_style.css">
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+500+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>
<body>
	<!-- NavBar -->
	<?php include('include/header.php'); ?>

	<section id="breadcrumb">
		<div class="container" style="margin-top: 2%; width: 97%;">
			 <ol class="breadcrumb">
			 	<li><input type="button" value="Back" onclick="history.go(-1)"></li>
			 	<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
			 	<li><a href="anonymousGrievance.php" style="text-decoration: none;">Anonymous Overview</a></li>
			 	<li class="active">Anonymous | In-Process Grievance</li>
			 </ol>
		</div>
	</section>

	<section id="main">
		<div class="container" style=" width: 97%;">
			<div class="row">
				<div class="col-md-2">
					<div class="list-group">
						<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard</a>
						<a href="grievance_section.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Grievance Section</a>
						<a href="studentdetails.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Student's Details</a>
						<a href="facultyprofile.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a>
					</div>
				</div>
				<div class="col-md-10">
					<div class="panel panel-default">
						<div class="panel-heading main-color-bg">
							<h3 class="panel-title">Anonymous : In-Process Grievance</h3>
						</div>
						
						<div class="panel-body" style="min-height: 400px;">

							 <!-- Start 2nd Column -->

							  <div class="col-sm-9 col-md-12 mt-5">
							  
							  
							  
							  
							   
							   
							  <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	table-responsive display" >
									<thead>
										<tr>
											<th>Complaint No</th>
											<th>Reg Date</th>
											<th>Status</th>
											
											<th>Action</th>
											
										
										</tr>
									</thead>
								
                                    <tbody>
                              <?php 
							  $status="in Process";
                              // $query=mysqli_query($db,"select complain.*,student.name as name from complain join student on student.student_id=complain.userId where complain.status ='$status' and complain.grievanceId='11' and isAnonymous='1' ORDER BY regDate DESC ");
                                $query=mysqli_query($db,"select * from complain where status ='$status' and isAnonymous='1' ORDER BY regDate DESC ");
                             while($row=mysqli_fetch_array($query))
                              {
                                   ?>										
										<tr>
											<td><?php echo htmlentities($row['complaintNumber']);?></td>
											<td><?php echo htmlentities($row['regDate']);?></td>
										
											<td style="color:orange;">In Process</td>
											
											<td>   <a href="complaint-detailsAnonymous.php?cid=<?php echo htmlentities($row['complaintNumber']);?>"> View Details</a> 
											</td>
											</tr>

										<?php  } ?>
										</tbody>
								</table>
								
								
								
							 </div><!-- End 2nd Column -->
													</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include('../include/footer.php'); ?>
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
	<!-- Bootstrap score JavaScript -->
	<!-- Placed at the end of the document so that the pages loads faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>