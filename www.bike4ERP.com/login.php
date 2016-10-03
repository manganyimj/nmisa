<?php
	session_start();
	
	$_SESSION["message"] = "";
	if(isset($_POST["login"]))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		require_once('dbConnect.php');
		
		$sql = "select tblusers.idno as idno, tblusers.email uemail, password, name, surname, cellNO,role, schoolid, schoolName, schoolNumber, tblSchool.email as semail, address  from tblusers, tblSchool where tblusers.idno = tblSchool.adminid AND tblusers.email='$email' AND password='$password'";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		if(isset($check))
		{
			$result = $con->query($sql);
				
				if ($result->num_rows > 0)
				{
					if($row = $result->fetch_assoc()) 
					{
						$role = $row["role"];
						
						if($role == 'School Admin')
						{
							
							$_SESSION["idno"] = $row["idno"];
							$_SESSION["email"] = $row["uemail"];
							$_SESSION["password"] = $row["password"];
							$_SESSION["name"] = $row["name"];
							$_SESSION["surname"] = $row["surname"];			
							$_SESSION["cellNO"] = $row["cellNO"];
							
							$_SESSION["schoolID"] = $row["schoolid"];
							$_SESSION["schoolName"] = $row["schoolName"];
							$_SESSION["schoolEmail"] = $row["email"];
							$_SESSION["schoolNumber"] = $row["schoolNumber"];			
							$_SESSION["village"] = $row["address"];
							header("Location:schoolAdmin.php");

						}
						else if($role == 'Epi-Use' || $role == 'Inspector')
						{
							$_SESSION["id"] = $row["idno"];			
							$_SESSION["role"] = $row["role"];
							header("Location:epiuse.php");
						}
						else if($role == 'Inspector' )
						{
							$_SESSION["id"] = $row["idno"];			
							$_SESSION["role"] = $row["role"];
							header("Location:epiuse.php");
						}
						else
						{
							$_SESSION["message"] = "Access denied... You must register first";
							
						}
					}
					else
					{
						
						$_SESSION["message"] = "Access denied... You must register first";
						
					}
				}
				else
				{
					
					$_SESSION["message"] = "Access denied... You must register first";
				}
			}
			else
			{
				
				$_SESSION["message"] = "Access denied... You must register first";

			}
		
		mysqli_close($con);
	}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bikes4ERP</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">
         
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="assets/img/ERP_Logo_TM_Clean Nicolai wit.png" width="40%" height="10%" alt=""/>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                      <form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="email" placeholder="Enter e-mail" type="email"  autofocus/>
                                </div>  
                                <div class="form-group">
                                    <input class="form-control" name="password" placeholder="Password" type="password" > 
                                </div>
                                <div>
                                    <label>
                                        <a href="ForgotPass.html"><u>Forgot Password?</u></a>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" name="login" type="submit" >Login</button>
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
