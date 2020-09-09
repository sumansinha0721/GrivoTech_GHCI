<nav class="navbar navbar-default">
	<div class="container" style="width: 97%;">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="nabvar">
				<span class="sr-only">Toggle Navigation</span>
			</button>
			<a class="navbar-brand" href="#" style="font-size: 24px;"> GrivoTech | Student Portal
			</a>
		</div>
		<div id="nabvar" class="collapse navbar-collapse pull-right">
			<div style="display: flex; flex-direction: row;">
				<div style="color:#fff; font-size: 24px; margin-right: 1em;">Welcome, <?php session_start();
																					echo htmlentities($_SESSION['name']); ?></div>
				<button style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden; outline:none;" data-toggle="tooltip" title="Logout" onClick="window.location = 'logout.php'">
					<i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></button>
			</div>
		</div><!-- /.nav-collapse -->
	</div>
</nav>