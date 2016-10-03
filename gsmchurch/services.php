<?php
session_start();

if(isset($_POST["submit"]))
{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$serviceType = $_POST['serviceType'];
	  
	   //=============Snding Email=============
		$to = "manganyimj12@gmail.com";
		$subject ="MDynamic Client";
		$message = "Dear sir/madam. Im ".$name." ,here is my contact ".$email." Im asking for ".$serviceType." service";
						
		$headers = 'From: MDynamic Technologies Client' . "\r\n" ;
							
		mail($to, $subject, $message, $headers);
							
	    //======================================
		//echo 'User successfully register';
				
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MDT-Services</title>
    
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

<body>

            <header id="header">
       

<nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a> -->
					<a class="navbar-brand" href="index.html"><img src="images/logo.jpg"  class = "img-responsive img-thumbnail" alt="logo"></a>
					<!-- <a class="navbar-brand" style="box-shadow: 1px red;">MD Technologies</a> -->
                </div>
				
              <div class="collapse navbar-collapse navbar-right ">
                    <ul class="nav navbar-nav ">
                        <li><a href="index.html">Home</a></li>
						<li><a href="services.php">Services</a></li>
                        <li><a href="about-us.html">About Us</a></li>
						<li><a href="ourteam.html">Our Team</a></li>
						<li><a href="contact-us.php">Contact</a></li>
						                   
                    </ul>
                </div>
            </div>
        </nav>
		
    </header>
	</br>

  <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
		     <h1 style="color:brown"><center><b>Recent Announcement</b></center></h1>
                <p><center>Attention saints of the lord, we would to let you know that we recieved a letter from Full Gospel Church inviting us to come and gather with them in the night of prayer. this letter arrived after church that the reason it was not rad in church. thank you</center></p>
				 <div class="name-author">by <a href="#" style="color:red">Admin..</a></div>

          </div>
          <div class="row">
            <div class="col-xs-6 col-lg-4">
              <h2 style="color:brown"><b>Upcoming Event</b></h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
             
              <p style="color:brown">Date: 26 August 2016</p>
			  <p style="color:brown">Time: 10h00 - 13h00</p>
			  <p style="color:brown">Vanue: Global Salvation Ministries </p>
			  
			  
			</div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2 style="color:brown"><b>Upcoming Event</b></h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p style="color:brown">Date: 26 August 2016</p>
			  <p style="color:brown">Time: 10h00 - 13h00</p>
			  <p style="color:brown">Vanue: Global Salvation Ministries </p>
            </div><!--/.col-xs-6.col-lg-4-->
            <div class="col-xs-6 col-lg-4">
              <h2 style="color:brown"><b>Upcoming Event</b></h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p style="color:brown">Date: 26 August 2016</p>
			  <p style="color:brown">Time: 10h00 - 13h00</p>
			  <p style="color:brown">Vanue: Global Salvation Ministries </p>
            </div><!--/.col-xs-6.col-lg-4-->
            
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
		
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
			         <h2 style="color:brown"><b><center>Church Services</center></b></h2>
				<div class="list-group">
				  <a href="#" class="list-group-item disabled">
					<center><b>Sunday Service</b></center>
				  </a>
				  <a href="#" class="list-group-item">Intercetion 9h00 - 10h00</a>
				  <a href="#" class="list-group-item">Service 9h00- 1300</a>
				  
				</div>
				<div class="list-group">
				  <a href="#" class="list-group-item disabled">
					<center><b>Youth Service (Thursday)</b></center>
				  </a>
				  <a href="#" class="list-group-item">Service 17h30 - 19h30</a>

				  
				</div>
				<div class="list-group">
				  <a href="#" class="list-group-item disabled">
					<center><b>Wednesday Service</b></center>
				  </a>
				  <a href="#" class="list-group-item">Service 17h30 - 19h30</a>
				 
				  
				</div>
				<div class="list-group">
				  <a href="#" class="list-group-item disabled">
					<center><b>Sisters Service (Thursday)</b></center>
				  </a>
				  <a href="#" class="list-group-item">Service 15h30 - 17h30</a>
				 
				  
				</div>
				<div class="list-group">
				  <a href="#" class="list-group-item disabled">
					<center><b>Friday Service</b></center>
				  </a>
				  <a href="#" class="list-group-item">Service 17h30 - 19h30</a>
				 
				  
				</div>
				<div class="list-group">
				  <a href="#" class="list-group-item disabled">
					<center><b>Suterday Practise</b></center>
				  </a>
				  <a href="#" class="list-group-item">Worship Team 15h30 - 17h00</a>
				  <a href="#" class="list-group-item">Youth 17h00 - 19h00</a>
				  
				</div>
            </div>

        
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->
     </div>
        <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2015 <a href="#" >MDynamic Tech</a>. All Rights Reserved.
                </div>
				
				<div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href=""><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/MDynamic-Technologies-531421617061250/?fref=ts"><i class="fa fa-facebook"></i></a>
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
</html>z