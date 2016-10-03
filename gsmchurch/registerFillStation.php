<?php
if(isset($_POST["submit"]))
{
		$name = $_POST['name'];
		$cellnumber = $_POST['cellnumber'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$province = $_POST['province'];
		$city = $_POST['city'];
	
		require_once('dbConnect.php');
			
	    $sql = "SELECT * FROM tblgarageinfo WHERE email ='$email' || cellnumber ='$cellnumber'";
			
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
			
		if(isset($check))
		{
			echo 'cell phone or email address used alredy exist';
		}
		else
		{
						
			$sql = "INSERT INTO tblgarageinfo(name,cellnumber,email,password,province,city) VALUES('$name','$cellnumber','$email','$password','$province','$city')";
					
			if(mysqli_query($con,$sql))
			{
				echo 'User successfully register';
			}else
			{
				echo 'oops! Please try again!';
			}
		}	
		mysqli_close($con);
	
}
else
{
echo 'error';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register | MDT</title>
    
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
    
	<script type="text/javascript" src="registerFillStationValidation.js"></script>
<body>

      <!--<header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i> 072 212 5445</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                            </ul>
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
       <!-- </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
						<li><a href="services.html">Services</a></li>
                        <li><a href="about-us.html">About Us</a></li>
						<li><a href="ourteam.html">Our Team</a></li>
						<!--<li><a href="register.html">Register</a></li>-->
                        <li><a href="contact-us.html">Contact</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->

    <section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2>Register your filling Station</h2>
                <p class="lead">By providing us with all required information you be able to use our application FillmaTankO, After registering download the Application and login..</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form  method="post" action="<?php echo $_SERVER['PHP_SELF'] ;?>" onsubmit="return validateForm()">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label id="lblName">Filling Station Name :</label>
                            <input type="text" name="name" id="txtName" class="form-control" onkeyup="validateName()" required="required">
                        </div>
                        <div class="form-group">
                            <label id="lblPhone">Fill Station Cell Number :</label>
                            <input type="number" name="cellnumber" id="txtPhone" class="form-control"  onkeyup="validatePhone()" required="required">
                        </div>
                        <div class="form-group">
                            <label id="lblEmail">Email Address :</label>
                            <input type="email" name="email" id="txtEmail" class="form-control"  onkeyup="validateEmail()">
                        </div>
						<div class="form-group">
                            <label id="lblPassword">Password :</label>
                            <input type="text" name="password" id="txtPassword" class="form-control"  onkeyup="validatePassword()">
                        </div>
						<div class="form-group">
                            <label id="lblPasswordTwo">Password :</label>
                            <input type="text" name="repassword" id="txtPasswordTwo" class="form-control"  onkeyup="validatePasswordTwo()">
                        </div>
                        <div class="form-group">
                            <label id="lblProvince">Province</label>
                            <input type="text" name="province" id="txtProvince" class="form-control"  onkeyup="validateProvince()">
                        </div> 
                         <div class="form-group">
                            <label id="lblCity">City / Town</label>
                            <input type="text" name="city" id="txtCity" class="form-control"  onkeyup="validateCity()">
						 </div>
                        <div class="form-group">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg" required="required">Register</button>
                        </div>								
                    </div><!--/.row-->
			 </form> 
        </div><!--/.container-->
    </section><!--/#contact-page-->

        <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2015 <a href="http://shapebootstrap.net/" >MDynamic Tech</a>. All Rights Reserved.
                </div>
				
				<div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="http://shapebootstrap.net/"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
				
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>
