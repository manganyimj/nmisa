<?php
session_start();

if(isset($_SESSION["usertype"]))
{
	 if(!$_SESSION["usertype"]=='landlord')
	{
		 header('location:login.php');
				 
	}
}
else
{
	 header('location:login.php');
}

if(isset($_POST["submit"]))
{
		$name = $_POST['name'];
		$surname = $_POST['surname'];
	        $phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		require_once('dbConnect.php');
		$id = $_SESSION["memberId"];
		$sql = "UPDATE tblregister SET name ='$name', surname = '$surname',phone = '$phone' ,email = '$email',password = '$password'    WHERE memberId ='$id'";
		 
		if ($con->query($sql) === TRUE) 
		{
			
			$_SESSION["mssgProfile"]= "Your profile  is successfully Updated...!!";
				
				$sql1 = "select * from tblregister where memberId=$id";
			
				$check = mysqli_fetch_array(mysqli_query($con,$sql1));
				
				$result = array();
				
				if(isset($check))
				{
					
					$result = $con->query($sql1);
					
					if ($result->num_rows > 0)
					{
						$myText = "";
						
						while($row = $result->fetch_assoc()) 
						{
							$_SESSION["name"] = $row["name"];
							$_SESSION["surname"] = $row["surname"];
							$_SESSION["phone"] = $row["phone"];
							$_SESSION["email"] = $row["email"];
							
							$_SESSION["password"] = $row["password"];
							
						}
						
						
					}
								
				}
		} 
		else
		{
			$_SESSION["mssgProfile"]= "Error :" . $con->error;
		}
		mysqli_close($con);
	
}
else if(isset($_POST["updateAddtional"]))
{
                $place = $_POST['place'];
		$primaryschool = $_POST['primaryschool'];
	        $highschool = $_POST['highschool'];
		$yrpassedmatric = $_POST['yrpassedmatric'];
		$varsity = $_POST['varsity'];
		require_once('dbConnect.php');
		$memberId = $_SESSION["memberId"];
                
                $sql = "select * from additionalinfo where memberId ='$memberId'";
                $result = array();
                if(mysqli_query($con,$sql) == FALSE)
                {
                    $sql = "INSERT INTO additionalinfo(fkmenberid,place,primSchool,highSchool,yearMatricPassed,Varsity) VALUES('$memberId','$place','$primaryschool','$highschool','$yrpassedmatric','$varsity')";

                    if((mysqli_query($con,$sql)))
                    {
                       echo 'additional info is added';   
                       
                    }
                    else
                    {
                       $sql = "UPDATE additionalinfo SET place ='$place',primSchool='$primaryschool',highSchool='$highschool',yearMatricPassed='$yrpassedmatric',Varsity='$varsity' where fkmenberid ='$memberId'";

                        
                        if(mysqli_query($con,$sql))
                        {
                               
                            echo 'succesfully updated';         
                               
                        }
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
            <h1 class="brand brand_"><a href="index.php"><img alt="" src="img/logo.png"> </a></h1>
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
            
			 
              <div class="inner-1">
			  <article class="span4">
			  <hr>
						
			  	                <?php
							if( $_SESSION["imageP"]=='')
							{
								echo "<img src=img/defaultProf/profile.PNG   height=400 width=210 >";
							}
							else
							{
								echo "<img src=". $_SESSION["imageP"]."   height=400 width=210 >";
								
							}
						?>
						<form action="uploadePic.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
						 <input type="hidden" name="txtID"  value="<?php print $_SESSION["memberId"]; ?>">
						<input type="file" size="10"  name="file"><br><br>
						<input type="submit" name="UpdatePic" id="UpdatePic" value="----- Update profile picture ------ "><br><br>
						
						 <?php
					  // session_start();
						if(isset($_SESSION["mssgProfile"]))
						{
							echo "<P style=color:green>".$_SESSION["mssgProfile"]."</p>";
						}
											
						?>
                                                <p style=color:red> Scroll down to update your personal and some additional Information</p>
						<br>
                                                <br>
						<div>
						</div>
						
					</form>
				</article>	
					
            <form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST" onsubmit="return validateForm()">
			
				  <h3>My Profile</h3>
				
				<hr>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label> Name :</label> <label id="lblName"></label>
                            <input type="text" onkeyup="validateName()" name="name" class="form-control" value="<?php print $_SESSION["name"]; ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label>Surname :</label><label id="lblSurname"></label>
                            <input type="text" onkeyup="validateSurname()" name="surname" class="form-control" value="<?php print $_SESSION["surname"]; ?>" required="required">
                        </div>
						<div class="form-group">
                            <label>Phone :</label><label id="lblPhone"></label>
                            <input type="number" onkeyup="validatePhone()" name="phone" class="form-control" value="<?php print $_SESSION["phone"]; ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email Address :</label><label id="lblEmail"></label>
                            <input type="email" name="email"  onkeyup="validateEmail()" class="form-control" value="<?php print $_SESSION["email"]; ?>">
                        </div>
						<div class="form-group">
                            <label>Password :</label><label id="lblPassword"></label>
                            <input type="password" onkeyup="validatePassword()" name="password" class="form-control" value="<?php print $_SESSION["password"]; ?>">
                        </div>
						<div class="form-group">
                            <label>Confirm Password :</label><label id="lblPasswordTwo"></label>
                            <input type="password" onkeyup="validatePasswordTwo()" name="repassword" class="form-control" value="<?php print $_SESSION["password"]; ?>">
                        </div>
                       
						 
                        <div class="form-group">
                            <button type="submit" name="submit"  id="submit" class="btn btn-primary btn-lg" required="required">Update</button>
                        </div>		
						<hr>
                    </div><!--/.row-->
                    </form> 
                  <h5 style="color: red"><strong>Update Additional Information</strong></h5>
                    <hr>
                       <form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST" onsubmit="return validateForm()">
                                         <!-- Additional Information Form-->
                         
                           <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label> Muganga/where you stay :</label> <label id="lblName"></label>
                            <input type="text" onkeyup="validateName()" name="place" value="<?php print $_SESSION["place"] ?>" class="form-control"  required="required">
                        </div>
                        <div class="form-group">
                            <label>Primary School :</label><label id="lblSurname"></label>
                            <input type="text" onkeyup="validateSurname()" name="primaryschool" value="<?php print $_SESSION["primSchool"] ?>" class="form-control"  required="required">
                        </div>
						<div class="form-group">
                            <label>High School :</label><label id="lblPhone"></label>
                            <input type="text" onkeyup="validatePhone()" name="highschool" value="<?php print $_SESSION["highSchool"] ?>" class="form-control"  required="required">
                        </div>
                        <div class="form-group">
                            <label>Year Passed Matric :</label><label id="lblEmail"></label>
                            <input type="text" name="yrpassedmatric"  onkeyup="validateEmail()" value="<?php print $_SESSION["yearMatricPassed"] ?>" class="form-control" >
                        </div>
						<div class="form-group">
                            <label>Varsity/Collage Attended :</label><label id="lblPassword"></label>
                            <input type="text" onkeyup="validatePassword()" name="varsity" value="<?php print $_SESSION["Varsity"] ?>" class="form-control" >
                            </div>
                       
						 
                        <div class="form-group">
                            <button type="submit" name="updateAddtional"  id="updateAddtional" class="btn btn-primary btn-lg" required="required">Update Additional Info</button>
                        </div>		
						<hr>
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