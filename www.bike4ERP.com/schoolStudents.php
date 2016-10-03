<?php
	session_start();
	$role = $_SESSION["role"];
	
	$_SESSION['timeout'] = time();
	$_SESSION["message"] = "";
	
	$sessionTime = $_SESSION['timeout'] + 10 * 60;
	
	if ($sessionTime < time()) 
	{
		header("Location:login.php");
		
		
	}
	else
	{
		if($role == 'School Admin')
		{
			if(isset($_POST["update"]))
			{
				if(isset($_POST["id"]))
				{
					require_once('dbConnect.php');
					
					$id = $_POST["id"];
					
					$sql = "select * from tblStudent where idno='$id'";
			
					$check = mysqli_fetch_array(mysqli_query($con,$sql));
					
					if(isset($check))
					{
						$result = $con->query($sql);
							
						if ($result->num_rows > 0)
						{
							if($row = $result->fetch_assoc()) 
							{
									
								$_SESSION["student_idno"] = $row["idno"];
								$_SESSION["sname"] = $row["name"];
								$_SESSION["ssurname"] = $row["surname"];
								$_SESSION["bikeNO"] = $row["bikeNO"];
								$_SESSION["grade"] = $row["grade"];			
								$_SESSION["distance"] = $row["distance"];
								$_SESSION["previousMarks"] = $row["previousMarks"];
								$_SESSION["image"] = $row['image'];
								
								header("Location:updateStudent.php");
		
							}
						}
					}
				}
				else
				{
					?>
						<script>
							alert("Please select atleast one student :(");
						</script>
					<?php
				}
			}
		
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bikes4ERP</title>
    <!-- Core CSS - Include with every page -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="schoolAdmin.html">
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
                        <li><a href="editSchoolAdmin.php"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
						 <li class="divider"></li>
						<li><a href="#"><i class="fa fa-users fa-fw"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
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
                          
                            <div class="user-info">
                               
                                <div class="user-text-online">
                                    
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
					<li>
                        <a href="schoolAdmin.php"><i class="fa fa-home fa-fw"></i>Home</a>
                    </li>
					<li>
                        <a href="markAttendance.php"><i class="fa fa-dashboard fa-fw"></i>Attendance</a>
                    </li>
                    <li>
                        <a href="uploadMarks.php"><i class="fa fa-flask fa-fw"></i>Marks</a>
                    </li>
					<li class="selected">
                        <a href="schoolStudents.php"><i class="fa fa-flask fa-fw"></i>Manage Students</a>
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
                    <h1 class="page-header">Update Marks</h1>
                </div>
                <!--End Page Header -->
            </div>
			
			<div class="row">
                <!-- Page Header -->
       
				<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								Check students' bikes
							</div>
							
							<center><h3><?php echo $_SESSION["message"]; ?></h3></center>
							
							<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
								<?php
									require_once('dbConnect.php');
								
									$adminID = $_SESSION["idno"];
									$date = date("d-m-Y");
									
									require_once('dbConnect.php');
								
									$sql = "Select tblStudent.name as name, tblStudent.surname as surname , tblStudent.grade as grade , tblStudent.previousMarks as marks, tblStudent.distance as distance ,tblStudent.image as image, tblStudent.idno as id, tblStudent.bikeNO as bike from tblStudent, tblSchool where tblStudent.schoolid = tblSchool.schoolid AND tblSchool.adminid = '$adminID'";
										
									$check = mysqli_fetch_array(mysqli_query($con,$sql));
										
									$result = array();
									
									if(isset($check))
									{
										$result = $con->query($sql);
										
										if ($result->num_rows > 0)
										{
							?>
										<div class="panel-body">
											<div class="col-lg-12">
												<div class="panel panel-default">
														<div class="panel-body">
								
																<hr></hr>
															<div class="table-responsive">
																<table class="table table-striped table-bordered table-hover" id="dataTables-example">
																	<thead>
																		<tr>
																			<th>Select Student</th>
																			<th>Name</th>
																			<th>Surname</th>
																			<th>Grade</th>
																			<th>ID Number</th>
																			<th>Distanace(km)</th>
																			<th>Bike Number</th>
																			<th>Marks Before Bike</th>
																		
																		</tr>
																	</thead>
																	<tbody>
													
																	<?php
																				while($row = $result->fetch_assoc()) 
																				{
																					$name = $row["name"];
																					$surname = $row["surname"];
																					$grade = $row["grade"];
																					$idno = $row["id"];
																					$distance = $row["distance"];
																					$bike = $row["bike"];
																					$prev = $row["marks"];
																					$image = $row["image"];
																					
																					print "<tr class='gradeA'><td><input type=radio name='id' value=$idno></td>";
																					print "</td> <td>$name</td>";
																					print "<td>$surname</td>";
																					print "<td>$grade</td>";
																					print "<td>$idno</td>";
																					print "<td>$distance</td>";
																					print "<td>$bike</td>";
																					print "<td>$prev</td>";
																				
											
									
																				}
																				'</tbody>';
																	 print "</table>";
														?>
														<div class="col-md-12 col-md-offset-0 col-sm-8 col-sm-offset-0">
														
															<div class="row">
																<div class="col-sm-2">
																	<button class="btn btn-info" name="register" onClick="validateForm()" type="submit">Clear Selection</button>
																</div>
																<div class="col-sm-10 text-right">
																	<button class="btn btn-success" name="update" onClick="validateForm()" type="submit">Update Student</button>
																</div>
																			
															</div>
														</div>
														<?php
																}
																else
																{
																	print "No students";
																}
															}
															else
															{
																print "No Students";
															}

														?>
													
													
												</div>
											</div>		
										</div>
									</div>
								</div>
							</form>				
						</div>
						<div class="row">
				<div class="col-lg-12">
						<!--Pill Tabs   -->
						<div class="panel panel-primary">
							<div class="panel-heading">
								About Us
							</div>
							<div class="panel-body">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							
							</div>
						</div>
                     <!--End Pill Tabs   -->
                </div>
            </div>
				</div>
			</div>
		</div>
        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->
	

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


<?php
		}
		else
		{
			header("Location:login.php");
		}
	}
?>
