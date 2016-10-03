<?php

                session_start();

                $_SESSION["message"]= "";



                if(isset($_POST["register"]))

                {

				
				
								$name = $_POST['name'];
								$lastname = $_POST['lastname'];
                                $idno = $_POST['idnum'];
								$email = $_POST['email'];
								$cellNO = $_POST['cellNO'];
                                $password = "P@ssw0rd";
								$role = $_POST['role'];

                               
            require_once('dbConnect.php');

	$sqlEmail = "SELECT * FROM tblUsers WHERE email = '$email'";
	$checkEmail = mysqli_fetch_array(mysqli_query($con,$sqlEmail));
	$sqlPhoneNO = "SELECT * FROM tblUsers WHERE cellNO = '$cellNO'";



    $checkPhoneNO = mysqli_fetch_array(mysqli_query($con,$sqlPhoneNO));
	$sqlIdNO = "SELECT * FROM tblUsers WHERE idno = '$idno'";

	$checkIdNO = mysqli_fetch_array(mysqli_query($con,$sqlIdNO));



     if(isset($checkEmail))

        {

             $_SESSION["message"]="User with the same email already exist";

        }

    else if(isset($checkIdNO))

        {

            $_SESSION["message"]= "User with the same id number already exist";

        }

    else if($checkPhoneNO)

       {

		$_SESSION["message"] = "User with the same phone number already exist";

        }

    else

        {

            $sql = "INSERT INTO tblUsers(idno,name,surname,email,cellNO,password,role)VALUES('$idno','$name','$lastname','$email','$cellNO','$password','$role')";



        if(mysqli_query($con,$sql))

            {


         /*$to      = $email;


         $subject = 'SUCCESSFULLY REGISTERED';


         $message = "Dear " .$name ." " .$lastname . "\n\n\nWelcome to
mydo here is your Username: " .$email . " and password is : " .
$password . "\n\n Kind Regards \n\n Mabasa Ntshuxeko J(Admin)";


         $headers = 'From: no_reply@mydo.co.za' . "\r\n" .


         'Reply-To: no_reply@mydo.co.za' . "\r\n" .


         'X-Mailer: PHP/' . phpversion();




         mail($to, $subject, $message, $headers);*/




         $_SESSION["message"] = "User successfully registered";



            }

        else

            {


		$_SESSION["message"] = "User unsuccessfully registered";

			}

        }



      mysqli_close($con);

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
	<script type="text/javascript" src="validationAddUser.js">  </script>
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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
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
                    <h1 class="page-header">Add new user</h1>
                </div>
                <!--End Page Header -->
            </div>

			<div class="row">
				<div class="col-lg-12">
						<!--Pill Tabs   -->
						
									<article class="col-xs-12 maincontent">
				
										<div class="col-md-0 col-md-offset-0 col-sm-8 col-sm-offset-0">
											<div class="panel panel-primary">
											<div class="panel-heading"><h4 class="thin text-center">User Details</h4></div>
												<div class="panel-body">
													<?php
														if($_SESSION["message"] == 'User successfully registered')
														{
													?>
															<span style="color:Green;text-align:center;"> <?php echo $_SESSION["message"] ?></span>
													<?php
														}
														else
														{
													?>
															<span style="color:Red;text-align:center;"> <?php echo $_SESSION["message"] ?></span>
													<?php	
														}
													?> 
													</h5>
													
													<form action="" onsubmit="return validateForm()"  method="POST">
														<div class="col-md-12 col-md-offset-0 col-sm-8 col-sm-offset-2">
															<div class="top-margin">
															<label id="lblName">First Name</label>
																<span class="text-danger"></span>
																<input type="input" name="name" id="name" onkeyup=""  required="required"  class="form-control">
																<label id="lblFname"></label>
															</div>	
															<div class="top-margin">
															<label id="lblsurname">Last Name</label>
																<span class="text-danger"></span>
																
																<input type="input" name="lastname" id="sname" onkeyup=""  required="required"  class="form-control">
																<label id="lblSname"></label>
															</div>	
																		<div class="top-margin">
																			<label id="lblID">ID Number</label>
																		<span class="text-danger"></span>
																		<input type="input" name="idnum" id="idnum"  maxlength="13" onkeyup="" required="required" class="form-control">
																		<label id="lblIDnumber"></label>
																		</div>
																		
																	<div class="top-margin">
																	<label id="lblEmail">Email Address</label>
																		<span class="text-danger"></span>
																		<input type="input" name="email" id="email"  onkeyup="validateEmail()" required="required" class="form-control">
																		<label id="lblEmailAdd"></label>
																	</div>
																	<div class="top-margin">
																	<label id="lblCell">Cellphone Number</label>
																		<span class="text-danger"></span>
																		<input type="input" name="cellNO" id="cell"  maxlength="10" onkeyup="" required="required" class="form-control">
																		<label id="lblCellNo"></label>
																	</div>
															<div class="top-margin">
																<label id="lblPassword">Role</label>
																<select id="role"  name="role" style="width:100%;"class="form-control">
																	  <option>Select Role</option>
																	  <option>Inspector</option>
																	  <option>School Admin</option>
																	  <option>Committee Member</option>
																	
																</select>
																
															</div>
															<hr>
															
															
												
														</div>
														<div class="col-lg-12 text-right">
																<button class="btn btn-info" name="register" onClick="validateForm()" type="submit"> Save </button>
															</div>
															
													</form>
												</div>
											</div>

										</div>
									

									</article>	
																		
								
						
					</div>
                     <!--End Pill Tabs   -->
                </div>
            </div>
			

        </div>
        <!-- end page-wrapper -->
    </div>
	
	
    <!-- end wrapper -->
	
	<script type="text/javascript">
			  var prof_pic = 'm';
			 
			 function change(){
			    var image = document.getElementById('social');
				if(prof_pic == 'm'){
				   image.src = 'assets/img/slide2.jpg';
				   prof_pic = 'v';
				}
				else if(prof_pic == 'v')
				{
					image.src = 'assets/img/slide3.jpg';
					prof_pic = 'j';
				}else if(prof_pic == 'j')
				{
					image.src = 'assets/img/slide1.jpg';
					prof_pic = 'm';
				}

			  }
			  var timer = setInterval('change()',5000);

	</script>
	
	

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
