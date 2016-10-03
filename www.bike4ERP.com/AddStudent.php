<?php
	session_start();
	$_SESSION["message"]= "";

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bikes4ERP-Update Student</title>
		<!-- Core CSS - Include with every page -->
		<link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
		<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
		<link href="assets/css/style.css" rel="stylesheet" />
		<link href="assets/css/main-style.css" rel="stylesheet" />
		<!-- Page-Level CSS -->
		<link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
		<script type="text/javascript" src="validationAddStudent.js">  </script>
	</head>
	
	<body>
	<!--  wrapper -->
	<div id="wrapper">
		<!-- navbar top -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
		<!-- navbar-header -->
		<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="epiuse.html">
		<img src="assets/img/ERP_Logo_TM_Clean Nicolai wit.png" alt="" />
		</a>
		</div>
		<!-- end navbar-header -->
		<!-- navbar-top-links -->
		<ul class="nav navbar-top-links navbar-right">
		<!-- main dropdown -->

		<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		<span class="top-label label label-warning">5</span>  <i class="fa fa-bell fa-3x"></i>
		</a>
		<!-- dropdown alerts-->
		<ul class="dropdown-menu dropdown-alerts">
		<li>
		<a href="#">
		<div>
		<i class="fa fa-comment fa-fw"></i>New Comment
		<span class="pull-right text-muted small">4 minutes ago</span>
		</div>
		</a>
		</li>
		<li class="divider"></li>
		<li>
		<a href="#">
		<div>
		<i class="fa fa-twitter fa-fw"></i>3 New Followers
		<span class="pull-right text-muted small">12 minutes ago</span>
		</div>
		</a>
		</li>
		<li class="divider"></li>
		<li>
		<a href="#">
		<div>
		<i class="fa fa-envelope fa-fw"></i>Message Sent
		<span class="pull-right text-muted small">4 minutes ago</span>
		</div>
		</a>
		</li>
		<li class="divider"></li>
		<li>
		<a href="#">
		<div>
		<i class="fa fa-tasks fa-fw"></i>New Task
		<span class="pull-right text-muted small">4 minutes ago</span>
		</div>
		</a>
		</li>
		<li class="divider"></li>
		<li>
		<a href="#">
		<div>
		<i class="fa fa-upload fa-fw"></i>Server Rebooted
		<span class="pull-right text-muted small">4 minutes ago</span>
		</div>
		</a>
		</li>
		<li class="divider"></li>
		<li>
		<a class="text-center" href="#">
		<strong>See All Alerts</strong>
		<i class="fa fa-angle-right"></i>
		</a>
		</li>
		</ul>
		<!-- end dropdown-alerts -->
		</li>

		<li class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		<i class="fa fa-user fa-3x"></i>
		</a>
		<!-- dropdown user-->
		<ul class="dropdown-menu dropdown-user">
		<li><a href="#"><i class="fa fa-user fa-fw"></i>Edit Profile</a>
		</li>

		<li class="divider"></li>
		<li><a href="#"><i class="fa fa-users fa-fw"></i>Settings</a>
		</li>
		<li class="divider"></li>
		<li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
		</li>
		</ul>
		<!-- end dropdown-user -->
		</li>
		<!-- end main dropdown -->
		</ul>
		<!-- end navbar-top-links -->

		</nav>
		<!-- end navbar top -->

		<!-- navbar side -->
		<nav class="navbar-default navbar-static-side" role="navigation">
		<!-- sidebar-collapse -->
		<div class="sidebar-collapse">
		<!-- side-menu -->
		<ul class="nav" id="side-menu">
		<ul class="nav" id="side-menu">
		<li>
		<!-- user image section-->
		<div class="user-section">
		<
		<div class="user-info">

		<div class="user-text-online">

		</div>
		</div>
		</div>
		<!--end user image section-->
		</li>

		<li class="selected">
		<a href="Epiuse.php"><i class="fa fa-home fa-fw"></i><b>Home</b></a>
		</li>
		<li >
		<a href="Epiuse.php"><i class="fa fa-dashboard fa-fw"></i><b>Add/Manage users</b><span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
		<li>
		<a href="AddUser.php">Add new user</a>
		</li>
		<li>
		<a href="ManageUsers.php">Update/delete users</a>
		</li>

		</ul>
		</li>
		<li >
		<a href="Epiuse.php"><i class="fa fa-dashboard fa-fw"></i><b>Manage schools/students</b><span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">

		<li>
		<a href="AddSchool.php">Add School</a>
		</li>
		<li>
		<a href="AddStudent.php">Add Student</a>
		</li>
		<li>
		<a href="ManageStudentEpiuse.php">Manage students</a>
		</li>

		</ul>
		</li>
		<li>
		<a href="EpiuseReports.php"><i class="fa fa-flask fa-fw"></i><b>Reports</b></a>
		</li>

		</ul>
		<!-- end side-menu -->
		</div>
		<!-- end sidebar-collapse -->
		</nav>
		<!-- end navbar side -->
		<!--  page-wrapper -->
		<div id="page-wrapper">

		<div class="row">
		<!-- Page Header -->
		<div class="col-lg-12">
		<h1 class="page-header">Add new student</h1>
		</div>
		<!--End Page Header -->
		</div>

		<article>
		<div class="col-lg-12">
		<!--Pill Tabs   -->

		<article class="col-xs-12 maincontent">

		<div class="col-md-0 col-md-offset-0 col-sm-8 col-sm-offset-0">
		<div class="panel panel-primary">
		<div class="panel-heading"><h4 class="thin text-center">Student Details</h4></div>
		<div class="panel-body">

		<h3> <?php echo $_SESSION["message"] ?></h3>

		</h5>

		<form action="addStudentPage.php" enctype="multipart/form-data"  method="POST">
		<div class="col-md-12 col-md-offset-0 col-sm-8 col-sm-offset-2">
			<div class="col-md-6 col-sm-6">
				<label id="lblFName">First Name</label>
				<input type="text" name="studname" id="name" onkeyup=""  required="required"  class="form-control">
				<label id="lblName"></label>
			</div>
			<div class="col-md-6 col-sm-6">
				<label id="lblName">Last Name</label>
				<input type="input" name="surname" id="surname" onkeyup=""  required="required"  class="form-control">
				<label id="lblSname"></label>
			</div>
			<div class="col-md-6 col-sm-6">
				<label id="lblPassword">ID Number</label>
				<span class="text-danger"></span>
				<input type="input" name="student_idno" id="idno"  maxlength="13" onkeyup="" required="required" class="form-control">
				<label id="lblIDNO"></label>
			</div>
			<div class="col-md-6 col-sm-6">
				<label id="lblPassword">Grade</label>
				<span class="text-danger"></span>
				<input type="input" name="grade" id="grade"  onkeyup="" maxlength="2" required="required" class="form-control">
				<label id="lblGrade"></label>
			</div>
			<div class="col-md-6 col-sm-6">
				<label id="lblPassword">Previous Mark</label>
				<span class="text-danger"></span>
				<input type="input" name="previousMark" id="previousMark" maxlength="3" onkeyup="" required="required" class="form-control">
				<label id="lblPassword"></label>
			</div>
			<div class="col-md-6 col-sm-6">
				<label id="lblPassword">Bike No.</label>
				<span class="text-danger"></span>
				<input type="input" name="bikeNO" id="bike"  maxlength="6" onkeyup="" required="required" class="form-control">
				<label id="lblBike"></label>
			</div>
			<div class="col-md-6 col-sm-6">
				<label id="lblPassword">Distance Travelled(km)</label>
				<span class="text-danger">*</span>
				<input type="input" name="distance" id="distance"  maxlength="2" onkeyup="" required="required" class="form-control">
				<label id="lblDistance"></label>
			</div>
				<div class="col-md-6 col-sm-6">
					<label>School</label>
					<select id="schoolid"  name="schoolid" style="width:100%;"class="form-control">
						 <option >Select School</option>'
						<?php
						$conn = new mysqli('localhost', 'root', '', 'bikes4erp')
						or die ('Cannot connect to db');
						$result = $conn->query("SELECT schoolid,schoolname FROM tblschool");
						while ($row =$result->fetch_assoc() ){
						unset ($name);
						unset ($id);
						$id= $row['schoolid'];
						$name= $row['schoolname'];

						echo '<option value='.$id.'>'.$name.'</option>';
						}
						?>

					</select>
				</div>
				<div class="col-sm-6">
													<label>Select Picture of a student</label>
													<input type="file" size="10" id="file" name="file"><br><br>
												</div>

		</div>
		<div class="col-lg-12 text-right">
		<button class="btn btn-info" name="register" onClick="validateForm()" type="submit">Register Student</button>
		</div>
		
		</form>

		</div>
		</div>

		</div>


		</article>
		</div>
		</div>
		<!--End Pill Tabs   -->
	</div>
	<!-- Core Scripts - Include with every page -->
	<script src="assets/plugins/jquery-1.10.2.js"></script>
	<script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
	<script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="assets/plugins/pace/pace.js"></script>
	<script src="assets/scripts/siminta.js"></script>
	<!-- Page-Level Plugin Scripts-->
	<script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
	<script src="assets/plugins/morris/morris.js"></script>
	<script src="assets/scripts/dashboard-demo.js"></script>

	</body>

</html>
