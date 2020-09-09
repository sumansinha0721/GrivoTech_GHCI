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
	<title>Statistics Overview | GrivoTech</title>
	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>
	<?php include('include/header.php'); ?>



	<section id="breadcrumb">
		<div class="container" style="margin-top: 2%; width: 97%;">
			<ol class="breadcrumb">
				<li><input type="button" value="Back" onclick="history.go(-1)"></li>
			 	<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
			 	<li class="active">Overall Statistics Overview</li>
			</ol>
		</div>
	</section>

	<section id="main">
		<div class="container" style="width: 97%;">
			<div class="row">
				<div class="col-md-2">
					<div class="list-group">
						<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard</a>
						<a href="reviewGrievanceSection.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> In-Progress Grievacne <span class="badge"></span></a>
						<a href="unsolvedGrievanceSection.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Un-Solved Grievance <span class="badge"></span></a>
						<a href="solvedGrievanceSection.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Solved Grievance <span class="badge"></span></a>
						<a href="pushF.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Pushed Grievance <span class="badge"></span></a>
						<a href="petitions.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> View Petitions <span class="badge"></span></a>
						
						<a href="addUniv.php" class="list-group-item"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Add University</a>
						<a href="stats.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Statistics</a>
						<a href="statsfeedback.php" class="list-group-item"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Feedback</a>
						<a href="profile.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a>
					</div>
					
				</div>
				<div class="col-md-10">
          <!-- Website Overview -->
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Overall Statistics Overview</h3>
            </div>
            <div class="panel-body" style="min-height: 400px;">
              <div class="col-md-6">
                <div class="well dash-box-chart">
                  <?php 
                  $query = "SELECT   cat.categoryName, count(c.complaintNumber) as count FROM  complain c JOIN category cat ON cat.id=c.grievanceId  WHERE status is null GROUP BY grievanceId";
                  $res = $db->query($query);

                  ?>
                  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                          ['categoryName', 'count'],
                          <?php 

                          while($row = $res->fetch_assoc()){
                           echo "['".$row['categoryName']."',".$row['count']."],";
                          }

                          ?>

                        ]);

                        var options = {
                          title: 'Number of Complaints which are in Not Started Yet status',
                          is3D: true,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart_new'));

                        chart.draw(data, options);
                      }
                    </script>
                    <div id="piechart_new" style="min-height: 300px;"></div>

                </div>
              </div>
              <div class="col-md-6">
                <div class="well dash-box-chart">
                  <?php 
				  $status='in process';
                  $query = "SELECT   cat.categoryName, count(c.complaintNumber) as count FROM  complain c JOIN category cat ON cat.id=c.grievanceId  WHERE status='$status' GROUP BY grievanceId";
                  $res = $db->query($query);

                  ?>
                  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                          ['categoryName', 'count'],
                          <?php 

                          while($row = $res->fetch_assoc()){
                            echo "['".$row['categoryName']."',".$row['count']."],";
                          }

                          ?>

                        ]);

                        var options = {
                          title: 'Number of Complaints which are in In-Process status',
                          is3D: true,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart_inprocess'));

                        chart.draw(data, options);
                      }
                    </script>
                    <div id="piechart_inprocess" style="min-height: 300px;"></div>

                </div>
              </div>

              <div class="col-md-6">
                <div class="well dash-box-chart">
                  <?php 
				  $status='closed';
                  $query = "SELECT   cat.categoryName, count(c.complaintNumber) as count FROM  complain c JOIN category cat ON cat.id=c.grievanceId  WHERE status='$status' GROUP BY grievanceId";
                  $res = $db->query($query);

                  ?>
                  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                          ['categoryName', 'count'],
                          <?php 

                          while($row = $res->fetch_assoc()){
                            echo "['".$row['categoryName']."',".$row['count']."],";
                          }

                          ?>

                        ]);

                        var options = {
                          title: 'Number of Complaints which are Solved status',
                          is3D: true,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart_solved'));

                        chart.draw(data, options);
                      }
                    </script>
                    <div id="piechart_solved" style="min-height: 300px;"></div>

                </div>
              </div>
              <div class="col-md-6">
                <div class="well dash-box-chart">
                  <?php 
                  $query = "SELECT   cat.categoryName, count(c.complaintNumber) as count FROM  complain c JOIN category cat ON cat.id=c.grievanceId  WHERE status is null GROUP BY grievanceId";
                  $res = $db->query($query);

                  ?>
                  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                           ['categoryName', 'count'],
                          <?php 

                          while($row = $res->fetch_assoc()){
                           echo "['".$row['categoryName']."',".$row['count']."],";
                          }

                          ?>

                        ]);

                        var options = {
                          title: 'Number of Complaints which are in Closed status (by the Student)',
                          is3D: true,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart_closed'));

                        chart.draw(data, options);
                      }
                    </script>
                    <div id="piechart_closed" style="min-height: 300px;"></div>

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
<?php } ?>