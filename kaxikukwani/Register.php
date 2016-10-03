<?php
session_start();

if(isset($_POST["submit"]))
{
		$name = $_POST['name'];
		$surname = $_POST['surname'];
	    $phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$usertype = $_POST['usertype'];
		$gender = $_POST['gender'];
		//$usernameOption = $_POST['usernameOption'];
	
		require_once('dbConnect.php');
		
	    $sql = "SELECT * FROM tblregister WHERE email ='$email'";
			
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
			
		if(isset($check))
		{
			//echo 'cell phone or email address used alredy exist';
			$_SESSION["signInMssg"]="Email address allready exist in the database please provide different email address";
		}
		else
		{
							
			$sql = "INSERT INTO tblregister(name,surname,gender,phone,email,password,usertype) VALUES('$name','$surname','$gender','$phone','$email','$password','$usertype')";
					
			if(mysqli_query($con,$sql))
			{
			    $sql1="SELECT MAX(memberid)  as max FROM tblregister";
                            $check1 = mysqli_fetch_array(mysqli_query($con,$sql1));
                            $max="";
                            $result = array();
                            if(isset($check1))
                            {
                                header("Location:login.php");
                                    /*$result = $con->query($sql1);

                                    if ($result->num_rows > 0)
                                    {


                                            while($row = $result->fetch_assoc()) 
                                            {
                                                    
                                                    
                                                    $max=$row["max"];
                                                    echo $max;
                                            
                                                $sql = "INSERT INTO additionalinfo(fkmemberid) VALUES('$max')";
                                                 
                                                if(mysqli_query($con,$sql))
                                                {
                                                  $_SESSION["logMssg"]= "You are successfully registered, use your email address and password to login";
                                                  header("Location:login.php");
                                                }
                                                else
                                                {
                                                    echo "failed on additional info";
                                                }
                                            }
                                            
                                    }*/

                            }
		             
                            /*$sql = "INSERT INTO additionalinfo(fkmemberid,place,primSchool,highSchool,yearMatricPassed,Varsity,image) VALUES((select Max(memberid) from tblregister),'john','john','john','john','john','john')";
                            
                              if(mysqli_query($con,$sql))
			      {
				$_SESSION["logMssg"]= "You are successfully registered, use your email address and password to login";
				header("Location:login.php");
                              }
                              else
                              {
                                  echo "failed on additional info";
                              }*/
                           }
				
			
			
	    }
		mysqli_close($con);
	
}
?>







<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Register</title>
	<meta charset="utf-8">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your keywords">
	<meta name="author" content="Your name">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>	
	<script src="js/forms.js"></script>
	<script>		
   jQuery(window).load(function() {	
    jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});	
   });			
	</script>
   <script type="text/javascript" src="registerValidation.js"></script>
	<!--[if lt IE 8]>
  		<div style='text-align:center'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/></a></div>  
 	<![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!-->
	<!--<![endif]-->
	<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> 
    <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
  <![endif]-->
	</head>
         <script type="text/javascript" src="registerValidation.js"></script>
	<body>
<div class="spinner"></div>
<!--============================== header =================================-->
<header>
      <div class="container clearfix">
    <div class="row">
          <div class="span12">
        <div class="navbar navbar_">
              <div class="container">
            <h1 class="brand brand_"><a href="index.html"><img alt="" src="img/logo.png"> </a></h1>
            <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
            <div class="nav-collapse nav-collapse_  collapse">
                  <ul class="nav sf-menu">
                <li class="active"><a href="index.php">Home</a></li>
                <li class="sub-menu"><a href="business.php">Places</a>
                  <ul>
				    <li><a href="catChurches.php">Churches</a></li>
                    <li><a href="business.php">Businesses</a></li>
					<li><a href="catPublicPlaces.php">Public Places</a></li>
					<li><a href="#">Entertainment</a></li>
                  </ul>
                    </li>
				<li><a href="knoledge.php">Knowlege</a></li>
				<li><a href="Register.php">Register</a></li>
				<li><a href="login.php">Login</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
             </div>
          </div>
            </div>
      </div>
        </div>
  </div>
    </header>
<div class="bg-content"> 
      <!--============================== content =================================-->
      <div id="content"><div class="ic">More Website Templates @ TemplateMonster.com. November19, 2012!</div>
    <div class="container">
          <div class="row">
        <article class="span8">
              <h3>Register</h3>
              <div class="inner-1">
            <form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label id="lblName1"> Name :</label><label id="lblName"></label>
                            <input type="text" name="name" id="txtName" class="form-control" required="required" onkeyup="validateName()">
                        </div>
                        <div class="form-group">
                            <label id="lblSurname1">Surname :</label><label id="lblSurname"></label>
                            <input type="text" name="surname" id="txtSurname" class="form-control" required="required" onkeyup="validateSurname()">
                        </div>
						<div class="form-group">
                            <label>Gender :</label>
							<select class ="form-control" name="gender" id="gender" type ="text" required >
						    <option>Male</option>
							<option>Female</option>
							</select>

                        </div>
						<div class="form-group">
							<label>Age Group</label>
							<select class ="form-control" type="text" name="usertype" class="form-control" >
							<option>choose one </option>
							<option>child 0-15</option>
						    <option>Youth 16-35</option>
							<option>Senior Citizen 36-up</option>
							</select>
                        </div> 
						<div class="form-group">
                            <label id="lblPhone1">Phone :</label> <label id="lblPhone"></label>
                            <input type="number" name="phone" id="txtPhone" class="form-control" required="required" onkeyup="validatePhone()">
                        </div>
                        <div class="form-group">
                            <label id="lblEmail1">Email Address :</label><label id="lblEmail"></label>
                            <input type="email" name="email" id="txtEmail" class="form-control" onkeyup="validateEmail()" >
                        </div>
						<div class="form-group">
                            <label id="lblPassword1">Password :</label><label id="lblPassword"></label>
                            <input type="password" name="password" id="txtPassword"  class="form-control" onkeyup="validatePassword()">
                        </div>
						<div class="form-group">
                            <label id="lblPasswordTwo1">Confirm Password :</label><label id="lblPasswordTwo"></label>
                            <input type="password" name="repassword" id="txtPasswordTwo" class="form-control" onkeyup="validatePasswordTwo()">
                        </div>
                        
						 
                        <div class="form-group">
                            <button type="submit" name="submit"  id="submit" class="btn btn-primary btn-lg" required="required">Register</button>
                        </div>								
                    </div><!--/.row-->
			 </form> 
          </div>
            </article>
       
      </div>
        </div>
  </div>
    </div>

<!--============================== footer =================================-->
<footer>
      <div class="container clearfix">
    <ul class="list-social pull-right">
          <li><a class="icon-1" href="#"></a></li>
          <li><a class="icon-2" href="#"></a></li>
          <li><a class="icon-3" href="#"></a></li>
          <li><a class="icon-4" href="#"></a></li>
        </ul>
		<div class="privacy pull-left">&copy; 2016 MDynamic Technologies. All Rights Reserved. </div>
    </footer>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>