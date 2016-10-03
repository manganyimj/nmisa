<?php
session_start();
$memberSelected = $_SESSION["memberSelected"];
if(isset($_POST["update"]))
{
        require_once('dbConnect.php');
	$usertypeValue = $_POST["usertype"];
        
        if($usertypeValue == 'Current')
        {
            $sql = "UPDATE tblregister SET usertype ='Normal' where usertype ='Current'";
            
            if(mysqli_query($con,$sql))
            {
                 echo 'Updated';
            }
            
                
        }
            $sql = "UPDATE tblregister SET usertype ='$usertypeValue' where memberid ='$memberSelected'";
                      //$sql = "update  tblregister WHERE memberid='$id'";
            if(mysqli_query($con,$sql))
            {
                echo 'Updated';
            }
            else 
            {
                echo "Not Updated";
            }
}
else
{
	echo "never";
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
            
			 
              <div class="inner-1">
			  <article class="span4">
			  <hr>
						
			  	                <?php
                                                        $memberSelected = $_SESSION["memberSelected"];
                                                        
                                                        require_once('dbConnect.php');
                                                        $sql = "select * from tblregister where  memberid='$memberSelected'";
                                                        if(mysqli_query($con,$sql))
						        {
							      $result = $con->query($sql);
							      if ($result->num_rows > 0)
							      {
									
								 while($row = $result->fetch_assoc()) 
							         {
                                                                     if( $row["image"]=='')
                                                                     {
                                                                        echo '<img src=img/defaultProf/profile.PNG   height=400 width=210 >
                                                                        <td><h5 style="color:white">',$row['surname']."  ".$row['name'],'</h5>';
                                                                     }
                                                                     else
                                                                     {
                                                                        echo '<li class="box"><img  height=400 width=210 src=',$row["image"],' ></li>
                                                                        <h5 style="color:white">',$row['surname']."  ".$row['name'],'</h5>';
                                                                         
                                                                     }
                                                                 }
                                                              }
                                                        }
						?>
						
						
						<br>
						<br>
						<br>
						<br>
						<br>
						<div>
						</div>
						
					</form>
				</article>	
					
            <form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST" onsubmit="return validateForm()">
			
				  <h3>Change User Status</h3>
				
				<hr>
                    <div class="col-sm-5 col-sm-offset-1">
                        <label>User Type :</label>
			    <select class ="form-control" name="usertype" id="usertype" type ="text" required >
			       <option>Select user type</option>
                                <option>Normal</option>
                                <option>Current</option>
			       <option>Admin</option>
			    </select>
                        
                       
						 
                        <div class="form-group">
                            <button type="submit" name="update"  id="update" class="btn btn-primary btn-lg" required="required">Change Status</button>
                        </div>		
						<hr>
                    </div><!--/.row-->
                    
                    <hr>
                                         <!-- Additional Information Form-->
                         
                           
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