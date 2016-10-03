<?php

	session_start();
	$_SESSION['message'] = "";
	$_SESSION['smessage'] = "";
	
	$_SESSION['timeout'] = time();
	
	$sessionTime = $_SESSION['timeout'] + 10 * 60;
	
	if ($sessionTime < time()) 
	{
		header("Location:signin.php");
	}
	else
	{
		$role = $_SESSION["role"];
		
		if($role == 'School Admin')
		{

			if(isset($_POST["edit"]))
			{
				$id = $_SESSION["idno"];
				$name = $_POST['name'];
				$surname = $_POST['surname'];
				$cellNO = $_POST['cellNO'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				
				require_once('dbConnect.php');
				
				//$_SESSION["message"] = $id . " " . $name . " " . $surname . " " . $cellNO . " " . $email . " " . $password;
				
				$sql = "UPDATE tblUsers SET name ='$name', surname ='$surname', cellNO ='$cellNO', email='$email', password ='$password' WHERE idno='$id'";
					
				if ($con->query($sql) == TRUE) 
				{
					?>
						<script>
							alert("Admin details successfully changed");
						</script>
					<?php
					
					$_SESSION["name"] = $name;	
					$_SESSION["surname"] = $surname;	
					$_SESSION["cellNO"] = $cellNO;	
					$_SESSION["email"] = $email;	
				} 
				else
				{
					?>
						<script>
							alert("OOOPsss an error ask for help...!!!!!!!!!!!!");
						</script>
					<?php
					
				}
			}
			else if(isset($_POST["updateSchool"]))
			{
				$schoolid = $_SESSION["schoolID"];
				$schoolName = $_POST['schoolName'];
				$schoolNumber = $_POST['schoolNumber'];
				$village = $_POST['village'];
				$schoolEmail = $_POST['schoolEmail'];
	
				require_once('dbConnect.php');
					
				$sql = "SELECT * FROM tblschool WHERE schoolid != '$schoolid' AND schoolNumber = '$schoolNumber'";
					
				$check = mysqli_fetch_array(mysqli_query($con,$sql));
					
				$sqlEmail = "SELECT * FROM tblschool WHERE schoolid != '$schoolid' AND email = '$schoolEmail'";
				
				$checkEmail = mysqli_fetch_array(mysqli_query($con,$sqlEmail));
				
				if(isset($check))
				{
					?>
						<script>
							alert("School with the same phone number already exist");
						</script>
					<?php
					
				}
				else if(isset($checkEmail))
				{
					$_SESSION["smessage"] = "School with the same email already exist";
				}
				else
				{	
					$sql = "UPDATE tblschool SET schoolname ='$schoolName', email = '$schoolEmail', schoolNumber ='$schoolNumber',address = '$village' WHERE $schoolid='$schoolid'";
					
					if ($con->query($sql) == TRUE) 
					{
						?>
							<script>
								alert("School details successfully changed");
							</script>
						<?php
							
					} 
					else
					{
						?>
							<script>
								alert("OOOPsss an error ask for help...!!!!!!!!!!!!");
							</script>
						<?php
					}
				}
			}
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
	<script type="text/javascript" src="adminValidation.js"></script>
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
					<li>
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
                <div class="col-lg-12">
                    <h1 class="page-header">Update The following Details</h1>
                </div>
				
				<article>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading"><h5 class="thin text-center">Update The following Details</h5></div>
							<div class="panel-body">
								<div class="col-md-6 col-md-offset-0 col-sm-8 col-sm-offset-0">
									<div class="panel panel-primary">
											<div class="panel-heading">Update Admin Details</div>
											<div class="panel-body">	
												<center><h4><?php echo $_SESSION["message"] ?></h4></center>
												<hr>
												
												<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" onsubmit="return validateEitForm()" method="POST">
														<div class="col-md-12 col-md-offset-0 col-sm-8 col-sm-offset-2">
															<div class="row top-margin">
																<div class="col-md-12 col-sm-12">
																	<label>Enter Name</label>
																	<span class="text-danger"></span>
																	<input type="text" name="name" id="name" onkeyup="validateName()" value="<?php echo $_SESSION["name"];?>"placeholder="Name" required="required()" class="form-control">
																	<label id="lblName"></label>
																</div>
																<div class="col-sm-12">
																	<label>Enter Surname</label>
																	<span class="text-danger"></span>
																	<input type="text" name="surname" id="surname" onkeyup="validateSurname()" value="<?php echo $_SESSION["surname"];?>" placeholder="Surname"required="required()" class="form-control">
																	<label id="lblLastname"></label>
																</div>
														
																<div class="col-md-12 col-sm-6">
																	<label>Enter Email</label>
																	<span class="text-danger"></span>
																	<input type="email" name="email" id="email" placeholder="Email" onkeyup="validateEmail()" value="<?php echo $_SESSION["email"];?>" required="required()" class="form-control">
																	<label id="lblEmail"></label>
																</div>
																					
																<div class="col-sm-12">
																	<label>Enter Cell Number </label>
																	<span class="text-danger"></span>
																	<input type="number" name="cellNO" id="cellNO" placeholder="Cell Number" onkeyup="validateCellNO()" required="required()" value="<?php echo $_SESSION["cellNO"];?>" class="form-control">
																	<label id="lblCellNO"></label>
																</div>
																<div class="col-md-6 col-sm-6">
																	<label>Enter Password</label>
																	<span class="text-danger"></span>
																	<input type="password" name="password" id="password" placeholder="Password" onkeyup="validatePassword()" required="required()" class="form-control">
																	<label id="lblPassword"></label>
																</div>
																					
																<div class="col-sm-6">
																	<label>Confirm Password</label>
																	<span class="text-danger"></span>
																	<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" onkeyup="validatePasswordMatch()" required="required" class="form-control">
																	<label id="lblConfirm"></label>
																</div>
												
															</div>
															<div class="col-lg-12 text-right">
																<button class="btn btn-primary" name="edit" onClick="validateEitForm()" type="submit">Update Details</button>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
										<div class="col-md-6 col-md-offset-0 col-sm-8 col-sm-offset-0">
										<div class="panel panel-primary">
											<div class="panel-heading">Update School details</div>
											<div class="panel-body">
											<center><h4><?php echo $_SESSION["smessage"] ?></h4></center>
											<hr>
											<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" onsubmit="return validateSchoolForm()" method="POST">
												<div class="row top-margin">
													<div class="col-md-6">
														<label>Enter School name</label>
														<span class="text-danger"></span>
														<input type="text" name="schoolName" id="schoolName" onkeyup="validateSchoolName()" value="<?php echo $_SESSION["schoolName"];?>"placeholder="School Name" required="required()" class="form-control">
														<label id="lblSchoolName"><label>
													</div>
													<div class="col-sm-6">
														<label>Enter School numbers</label>
														<span class="text-danger"></span>
														<input type="number" name="schoolNumber" id="schoolNumber" onkeyup="validateSchoolNumber()" value="<?php echo $_SESSION["schoolNumber"];?>" placeholder="School cell numbers"required="required()" class="form-control">
														<label id="lblSchoolNO"><label>
													</div>
														
													<div class="col-md-6">
														<label>Enter Email</label>
														<span class="text-danger"></span>
														<input type="email" name="schoolEmail" id="schoolEmail" placeholder="School Email" onkeyup="validateSchoolEmail()" value="<?php echo $_SESSION["schoolEmail"];?>" required="required()" class="form-control">
														<label id="lblSchoolEmail"><label>
													</div>
													<div class="col-md-6">
														<label>Enter Village Name</label>
														<span class="text-danger"></span>
														<input type="text" name="village" id="village" placeholder="Village name" onkeyup="validateVillage()" value="<?php echo $_SESSION["village"];?>" required="required()" class="form-control">
														<label id="lblVillage"><label>
													</div>
													<div class="col-sm-12 text-right">
														<button class="btn btn-primary" name="updateSchool" onClick="validateSchoolForm()" type="submit">Update Details</button>
													</div>
												</div>
											</form>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				</article>	
            </div>
        </div>
        <!-- end page-wrapper -->
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

<?php
		}
		else
		{
			header("Location:login.php");
		}
	}
?>
