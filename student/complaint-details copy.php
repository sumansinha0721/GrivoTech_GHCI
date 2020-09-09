<?php
session_start();
include('../include/db.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:cllglogin.php');
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="img/logogrivotech.png">
	<title>Complaint Details | Grievance Section | GrivoTech</title>
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
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}
</script>
</head>
<body>
<?php include('include/header.php');?>
	<section id="breadcrumb">
		<div class="container" style="margin-top: 2% ; width: 97%;">
			 <ol class="breadcrumb">
			 	<li><input type="button" value="Back" onclick="history.go(-1)"></li>
			 	<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
			 	<li><a href="grievance_section.php" style="text-decoration: none;">Grievance Menu</a></li>
			 	<li class="active">Complaint Details | Grievance Section</li>
			 </ol>
		</div>
	</section>
	<section id="main">
		<div class="container" style="width: 97%;">
			<div class="row">
				<div class="col-md-3">
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
							<h3 class="panel-title">Complaint Details</h3>
						</div>
                         <div class="panel-body" style="min-height: 400px;">
							 <!-- Start 2nd Column -->
							  <div class="col-sm-9 col-md-12 mt-5">
<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	table-responsive display" width="100%">
									<tbody>
<?php $st='closed';
$query=mysqli_query($db,"select complain.*,student.name as name,category.categoryName
 as catname from complain join student on student.student_id=complain.userId 
join category on category.id=complain.grievanceId 
where complain.complaintNumber='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{
?>
										<tr>
											<td><b>Complaint Number</b></td>
											<td><?php echo htmlentities($row['complaintNumber']);?></td>
											<td><b>Complainant Name</b></td>
										
											
																						<td> 
											<a href="javascript:void(0);" onClick="popUpWindow('userprofile.php?uid=<?php echo htmlentities($row['userId']);?>');" title="User detail">
											 <?php echo htmlentities($row['name']);?></a></td>
											
											
											<td><b>Reg Date</b></td>
											<td><?php echo htmlentities($row['regDate']);?>
											</td>
										</tr>
                                               <tr>
											<td><b>Grievance Type </b></td>
											<td><?php echo htmlentities($row['catname']);?></td>
										</tr>
                                             <tr>
											<td><b>Complaint Details </b></td>
											<td colspan="5"> <?php echo htmlentities($row['complain']);?></td>
										</tr>
                                               <tr>
											<td><b>File(if any) </b></td>
	  									 <td colspan="5"> <?php $cfile=$row['proof'];
if($cfile=="" || $cfile=="NULL")
{
  echo "File NA";
}
else{?>
<a href="../user/assests/images/<?php echo htmlentities($row['proof']);?>" target="_blank"/> View File</a>
<?php } ?></td>
</tr>
<tr>
<td><b>Final Status</b></td>
											<td colspan="5"><?php if($row['status']=="")
											{ echo "Not Process Yet";
} else {
										 echo htmlentities($row['status']);
										 }?></td>	
										</tr>
<?php $ret=mysqli_query($db,"select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join complain on complain.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");
while($rw=mysqli_fetch_array($ret))
{
?>
<tr>
<td><b>Remark</b></td>
<td colspan="5"><?php echo  htmlentities($rw['remark']); ?> <br><br><b>Remark Date :</b><?php echo  htmlentities($rw['rdate']); ?></td>
</tr>

<tr>
<td><b>Status</b></td>
<td colspan="5"><?php echo  htmlentities($rw['sstatus']); ?></td>
</tr>
<?php }?>


<?php $rets=mysqli_query($db,"select pushcomplaint.reason as reason,pushcomplaint.status as sstatus,pushcomplaint.pushdate as rdate from pushcomplaint join complain on complain.complaintNumber=pushcomplaint.complaintnumber where pushcomplaint.complaintnumber='".$_GET['cid']."'");
while($rws=mysqli_fetch_array($rets))
{
?>
<tr>
<td><b>Reason (to admin)</b></td>
<td colspan="5"><?php echo  htmlentities($rws['reason']); ?> <br><br><b>Remark Date :</b><?php echo  htmlentities($rws['rdate']); ?></td>
</tr>
<tr>
<td><b>Status</b></td>
<td colspan="5"><?php echo  htmlentities($rws['sstatus']); ?></td>
</tr>
<?php }?>
<?php $ret=mysqli_query($db,"select pushsolution.reason as reason,pushsolution.pushdate as rdate from pushsolution join complain on complain.complaintNumber=pushsolution.complaintnumber where pushsolution.complaintnumber='".$_GET['cid']."'");
while($rw=mysqli_fetch_array($ret))
{
?>
<tr>
<td><b>Solution (to faculty)</b></td>
<td colspan="5"><?php echo  htmlentities($rw['reason']); ?> <br><br><b>Remark Date :</b><?php echo  htmlentities($rw['rdate']); ?></td>
</tr>
<?php }?>
                                          <tr>
											<td><b>Action</b></td>
											
											<td colspan="6"> 
											<?php if($row['status']=="closed"){?>
                                             <b style="color:red;">case solved</b>    
											<?php } else{ ?>
                                             <a href="javascript:void(0);" onClick="popUpWindow('updatecomplaint.php?cid=<?php echo htmlentities($row['complaintNumber']);?>');" title="Update order">
											 <button type="button" class="btn btn-primary">Take Action</button></a>
											 <a href="javascript:void(0);" onClick="popUpWindow('pushcomplain.php?cid=<?php echo htmlentities($row['complaintNumber']);?>');" title="push">
											<button type="button" class="btn btn-warning">Push To Admin</button><?php } ?></a>
											 </td>
											 
                                             
										</tr>
									<?php } ?>
											 
										
								</table>
							 </div><!-- End 2nd Column -->
													</div>
						
						
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include('../include/footer.php');?>

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
</body></html>
<?php } ?>