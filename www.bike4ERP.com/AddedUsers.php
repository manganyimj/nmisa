<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bikes4ERP-Manage Students</title>
    <!-- Core CSS - Include with every page -->
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
                    <img src="assets/img/ERP_Logo_TM_Clean Nicolai wit.png"  alt="" />
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
                        <a href="schoolAdmin.html"><i class="fa fa-home fa-fw"></i><b>Home</b></a>
                    </li>
					<li >
                        <a href="AddUser.html.html"><i class="fa fa-dashboard fa-fw"></i><b>Add/Manage users</b><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
                            <li>
                                <a href="AddUser.html">Add new user</a>
                            </li>
                            <li>
                                <a href="AddSchool.html">Update/delete users</a>
                            </li>
                          
                        </ul>
                    </li>
					<li >
                        <a href="Epiuse.html"><i class="fa fa-dashboard fa-fw"></i><b>Manage schools/students</b><span class="fa arrow"></span></a>
						 <ul class="nav nav-second-level">
     
                            <li>
                                <a href="AddSchool.html">Add School</a>
                            </li>
                            <li>
                                <a href="AddStudent.html">Add Student</a>
                            </li>
                            <li>
                                <a href="ManageSchool.html">Manage students</a>
                            </li>
                          
                        </ul>
                    </li>
                    <li>
                        <a href="EpiuseReports.html"><i class="fa fa-flask fa-fw"></i><b>Reports</b></a>
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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--End Page Header -->
            </div>

			
			
			<div class="row">
				<div class="col-lg-12">
						<!--Pill Tabs   -->
						<div class="panel panel-info">
							<div class="panel-heading">
								Manage Users
							</div>
							<div class="panel-body">
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											
										</div>
											<div class="panel-body">
												<div class="table-responsive">
													<table class="table table-striped table-bordered table-hover" id="dataTables-example">
														<thead>
															<tr>
																<th>Select </th>
																<th>Name</th>
																<th>Surname</th>
																<th>ID Number</th>
																<th>Email</th>
																<th>Cell Number</th>
																<th>Role</th>
															</tr>
														</thead>
														<tbody>		
															<tr class="gradeA">
																<td><input type="Checkbox"> </td>
																<td>Rudzani</td>
																<td>Nedzamba</td>
																<td class="center">1234567890</td>
																<td >Rnedzamba@gmail.com</td>
																<td >0987766544</td>
																<td class="center">Inspector</td>
																
															</tr>
														</tbody>
													</table>
													<div class="col-lg-4 col-md-offset-1">
													<span>
								<a href="UpdateUser.html"><button class="btn btn-info" name="register" href="UpdateStudent.html" type="submit">Update</button></a>
								<button class="btn btn-info" name="register" type="submit">Dowload list</button>
								<a href="AddUser.html"><button class="btn btn-info" name="register" href="Registration.html" type="submit">Add new</button></a>
								</span>
							</div>
												</div>
											</div>
									</div>	
							
								</div>
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
