<?php

session_start();

if(isset($_POST["login"]))
{
		$email = $_POST['email'];
		$password = $_POST['password'];
	
		require_once('dbConnect.php');
		
	    $sql = "SELECT * FROM tblregister WHERE email ='$email' && password='$password'";
			
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		$result = array();
		if(isset($check))
		{
			
			$result = $con->query($sql);
			if ($result->num_rows > 0)
			{
				
                            while($row = $result->fetch_assoc()) 
                            {
                                $_SESSION["memberId"] = $row["memberid"];
                                $_SESSION["name"] = $row["name"];
                                $_SESSION["surname"] = $row["surname"];
                                $_SESSION["phone"] = $row["phone"];
                                $_SESSION["email"] = $row["email"];
                                $_SESSION["password"] = $row["password"];
                                $_SESSION["usertype"] = $row["usertype"];
                                $_SESSION["imageP"] = $row["image"];
                                $_SESSION["usernameOption"] = $row["usernameOption"];
                                $_SESSION["usertype"] = $row["usertype"];
                                $_SESSION["gender"] = $row["gender"];
                                $id = $row["memberid"];

                                $role=$row["usertype"];;
                                if($role=='Admin')
                                {
                                   header('location:adminProfile.php');
                                    

                                }
                                else
                                {

                                    header('location:profile.php');

                                }
                            }
                            
                        }
                        $sql = "SELECT * FROM additionalinfo WHERE  fkmenberid='$id'";
			
                        $check = mysqli_fetch_array(mysqli_query($con,$sql));
                        $result = array();
                        if(isset($check))
                        {
                            $result = $con->query($sql);
			    if ($result->num_rows > 0)
			    {
				
                                 while($row = $result->fetch_assoc()) 
                                 {
                                     $_SESSION["place"] = $row["place"];
                                     $_SESSION["primSchool"] = $row["primSchool"];
                                     $_SESSION["highSchool"] = $row["highSchool"];
                                     $_SESSION["yearMatricPassed"] = $row["yearMatricPassed"];
                                     $_SESSION["Varsity"] = $row["Varsity"];
                                     
                                     
                                 }
                            }
                        }
                        else 
                        {
                                     $_SESSION["place"] = ' ';
                                     $_SESSION["primSchool"] = ' ';
                                     $_SESSION["highSchool"] = ' ';
                                     $_SESSION["yearMatricPassed"] = ' ';
                                     $_SESSION["Varsity"] = ' ';         
                        }
			
								
		}
		else
		{
			$_SESSION["logMssg"]="please provide valid creditials";
		}
	
		mysqli_close($con);
	
}

?>




<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Login</title>
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
	    
	<script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	</script>
	<script>		
		 jQuery(window).load(function() {	
		 $x = $(window).width();		
	if($x > 1024)
	{			
	jQuery("#content .row").preloader();}	
	
	jQuery(".list-blog li:last-child").addClass("last"); 
	jQuery(".list li:last-child").addClass("last"); 

	
    jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});	
  		  }); 
         
					
	</script>
        
        	<script type="text/javascript">
			  var prof_pic = 'm';
			 
			 function change(){
			    var image = document.getElementById('social');
				if(prof_pic == 'm'){
				   image.src = 'img/pics/page4-img2.jpg';
				   prof_pic = 'v';
				}
				else if(prof_pic == 'v')
				    {
					   image.src = 'img/pics/page4-img1.jpg';
					   prof_pic = 'j';
					}else if(prof_pic == 'j')
					     {
						      image.src = 'img/pics/page4-img2.jpg';
					          prof_pic = 'k';
						 }
						   else{
						        image.src = 'img/pics/page4-img1.jpg';
					             prof_pic = 'm';
						 }			
			  }
			  var timer = setInterval('change()',2000);

	</script>

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
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
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
          <ul class="list-blog">
            <li>  
            <h3>Xikukwani tiko ro saseka ....</h3>      
            <div class="clear"></div>            
              <!--<img alt="" src="img/page4-img1.jpg">   -->                            
              <img src="img/pics/page4-img1.jpg" alt="Manganyi Image" id="social"  onclick="clearInterval(timer);">      
            </li>  
                                 
          </ul>
          </div>  
        </article>
        <article class="span4">
          <h3 class="extra">Login</h3>
		  <?php
				if(isset($_SESSION["logMssg"]))
				{
					echo "<h5 style=color:white>".$_SESSION["logMssg"]."</h5>";
				}					
		  ?>
          <form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
            <div>
                    <label class="email">
                    <input type="text" placeholder="Email Address" name="email">
                    <br>
                    
            </div>
            <div>
                    <label class="password">
                    <input type="password" placeholder="Password" name="password">
                    <br>
                   
            </div>
			<div class="form-group">
                    <button type="submit" name="login" id="login" class="btn btn-primary btn-lg" required="required">Login</button>
            </div>	
          </form>
          <h3>Best Rooms</h3>
          <ul class="list extra extra1">           
            <li><a href="#" style="color: white">Xikukwani kaya ro xonga</a></li>
            <li><a href="#" style="color: white">Xikukwani kaya ra titlhari</a></li>
                             
      </ul>
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
  </div>
    </footer>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>