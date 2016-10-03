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
	<link rel="icon" href="images/logo.jpg" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Services</title>
    
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
       <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number" ><p style="color:white" ><i></i><strong>Ron<span style="color:black" >Rof</span> Global Freight</strong></p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="https://www.facebook.com/RonRof-Global-Freight-1949033211987453/?fref=ts"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <div class="search">
                                <form role="form">
                                    <p style="color:white" >015 518 4014</p>
                                </form>
                           </div>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->	

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
						<li><a href="ourtransport.html">Our Trucks</a></li>
						<li><a href="careers.php">Career</a></li>
						<li><a href="sub-contract.php">SUB-CONTRACTING</a></li>
						<li><a href="contact-us.php">Contact</a></li>
						                   
                    </ul>
                </div>
            </div>
        </nav>
		
    </header>

  <section id="about" class="bg-light-gray">
        <div class="container">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-warning" style="box-shadow: 2px 2px 2px 2px #2d2c2b;">
                    <div class="panel-heading" style="box-shadow: 2px 2px 2px 2px #2d2c2b;">
                        <h2 style="text-shadow: 2px 2px 4px black;" align="center">Services offered RonRof Global Freight</h2></div>
                        <div class="panel-body">
                        <div class="container">
						
			<div class="col-md-4">
			 <div>
				<div class="panel panel-warning">
					<div class="panel-heading">
						<b>Our Products</b>
					</div>
					<div class="panel-body">
						<p>Flat decks, tipper trailers, container trailers, skeleton trailers, tankers, low-beds and dump trucks. </p>
					</div>
				</div>
				
			  </div>
			  
			  
			</div>
			
			<div class="col-md-4">
			 <div>
				<div class="panel panel-warning">
					<div class="panel-heading">
						<b>What we offer</b>
					</div>
					<div class="panel-body">
						<p>We offer primary and secondary transport of bulk, break-bulk and general cargo, tanker transport, container transport
                  		,tipper transport and express services. Our fleet comprises a comprehensive range of vehicles, including flat decks, tipper trailers
						, container trailers, skeleton trailers, tankers, low-beds and dump trucks.</p>
					</div>
				</div>
				
			  </div>
			  
			  
			</div>
                        </div>
            
              </div>
             </div>
            </div>
		   </div>
                  

                <!--
                
                -->
                </div>
            </div>

        
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->
     </div>
	 
        <!-- Footer -->
        <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2016 <a href="#" >RonRof Global Freight</a>. All Rights Reserved.
                </div>
				
				<div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href=""><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/RonRof-Global-Freight-1949033211987453/?fref=ts"><i class="fa fa-facebook"></i></a>
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