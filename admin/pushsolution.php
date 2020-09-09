<?php
session_start();
include('../include/db.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:cllglogin.php');
}
else {
  if(isset($_POST['update']))
  {
$complaintnumber=$_GET['cid'];
$reason=$_POST['reason'];
$query=mysqli_query($db,"insert into univsolution(complaintnumber,reason) values('$complaintnumber','$reason')");


echo "<script>alert('answer pushed Successfully');</script>";

  }

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Profile</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="pushcomplaint" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Complaint Number</b></td>
      <td><?php echo htmlentities($_GET['cid']); ?></td>
    </tr>
    


      <tr height="50">
      <td><b>Enter Your Solution</b></td>
      <td><textarea name="reason" cols="50" rows="10" required="required"></textarea></td>
    </tr>
    


        <tr height="50">
      <td>&nbsp;</td>
      <td><input type="submit" name="update" value="Submit"></td>
    </tr>



       <tr><td colspan="2">&nbsp;</td></tr>
    
    <tr>
  <td></td>
      <td >   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
   

 
</table>
 </form>
</div>

</body>
</html>

     <?php } ?>