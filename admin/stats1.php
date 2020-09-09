<!-- Line Chart  of no of grievance registered per day -->

<?php
session_start();
error_reporting(0);
include('../include/db.php');

if (strlen($_SESSION['alogin']) == 0) {
	header('location:adminlogin.php');
} else {
?>
	<!DOCTYPE html>
	<html lang="en">

	<div class="col-md-12">
		<!-- Website Overview -->
		<div class="panel panel-default">
			<div class="panel-heading main-color-bg">
				<h3 class="panel-title">Count of Grievance Registered per day</h3>
			</div>
			<div class="panel-body" style="min-height: 400px;">
				<div class="col-md-12">
					<div class="well dash-box-chart" style="min-height: 350px;">
						<div id="curve_chart" style="min-height: 400px"></div>
					</div>
				</div>

			</div>
		</div>
	</div>


	</html>

	<?php
	$query = "SELECT DATE(regDate) AS dt, COUNT(*) AS newComplaints FROM complain GROUP BY DATE(regDate) ORDER BY dt";
	$ret = mysqli_query($db, $query);
	$newComplaints = array();
	while ($r = $ret->fetch_assoc()) {
		array_push($newComplaints, array($r['dt'], (int)$r['newComplaints']));
	}
	$newComplaints = json_encode($newComplaints);
	$query = "SELECT * FROM category;";
	$categories = mysqli_query($db, $query);
	// echo $newComplaints;
	?>
	<script>
		const x = <?php echo $newComplaints; ?>
	</script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<script type="text/javascript">
		// New complaints per day
		google.charts.load('current', {
			packages: ['corechart', 'line']
		});
		google.charts.setOnLoadCallback(drawCurveTypes);

		function drawCurveTypes() {
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'X');
			data.addColumn('number', 'New grievances');

			data.addRows(<?php echo $newComplaints; ?>)

			var options = {
				hAxis: {
					title: 'Date'
				},
				vAxis: {
					title: 'New grievances'
				},
				series: {
					1: {
						curveType: 'function'
					}
				}
			};

			var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
			chart.draw(data, options);
		}
	</script>





	<!-- Bootstrap core JavaScript -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	</body>

	</html>
<?php } ?>