<?php
session_start();

if(isset($_POST["submit"]))
{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
	  
	   //=============Snding Email=============
		$to = "luyolobandb@gmail.com";
		$subject ="Luyolo Bed and Breakfast Client";
		$fullMessage = "Dear sir/madam. I'm ".$name." ,here is my email address ".$email."  ".$message;
		$message = $fullMessage;
						
		$headers = 'From: Luyolo Bed and Breakfast' . "\r\n" .
				  'Reply-To: luyolobandb@gmail.com' . "\r\n" ;
							
		mail($to, $subject, $message, $headers);
							
	    //======================================
		//echo 'User successfully register';
				
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<link rel="shortcut icon" href="images/logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Luyolobnb</title>
    
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
					<a class="navbar-brand" href="index.html"><img src="images/logo/logo.png"  class = "img-responsive img-thumbnail" alt="logo"></a>
					<!-- <a class="navbar-brand" style="box-shadow: 1px red;">MD Technologies</a> -->
                </div>
				
                <div class="collapse navbar-collapse navbar-right ">
                    <ul class="nav navbar-nav ">
					    <li class="hidden">
                           <a href="#page-top"></a>
                        </li>
                        <li><a class="page-scroll" href="index.html">Home</a></li>
						<li><a class="page-scroll" href="services.php">Services</a></li>
                        <li><a class="page-scroll" href="about-us.html">About Us</a></li>
						<li><a class="page-scroll" href="ourteam.html">Gallery</a></li>
						<li><a class="page-scroll" href="contact-us.php">Contact</a></li>
						                   
                    </ul>
                </div>
            </div>
        </nav>
		
    </header>

   
	
	
<!-- CONTACT -->
	<section id="contact">
		<div class="container">
			<div class="row">
				<!--<div class="col-md-12">
					<div class="section-title">
						<h1 style="color:#ce932e"><b>Contact us</b></h1>
						<!-- <span class="st-border"></span> 
					</div>
				</div>-->
				<div class="col-sm-4 contact-info">
					<p class="contact-content">Luyolo Bed and Breakfast offers it is situated in Elliot CBD at <b >Chris Hani District Municipality</b> in the <b>Eastern Cape</b> province of South Africa. it is 80 km south-west of Maclear and 65 km south-east of Barkly East.<b> Physical Address: MILL STREET,ELLIOT 5460</b></p>
					<p class="st-address"><i class="fa fa-map-marker"></i> <strong>MILL STREET, ELLIOT 5460</strong></p>
					<p class="st-phone"><i class="fa fa-mobile"></i> <strong>+2772 240 6413</strong></p>
					<p class="st-phone"><i class="fa fa-mobile"></i> <strong>Fax: 045 933 1241</strong></p>
					<p class="st-email"><i class="fa fa-envelope-o"></i> <strong>luyolobandb@gmail.com</strong></p>
					<p class="st-website"><i class="fa fa-globe"></i> <strong>www.luyolobnb.co.za</strong></p>
				
				     
				</div>
				
				<div class="container">
            <div class="center">        
                <h2>Drop Your Message</h2>
                
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label><strong>Name </strong></label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label><strong>Email </strong></label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label><strong>Phone/Cell Number</strong></label>
                            <input type="number" name="phone" class="form-control">
                        </div> 
                        <div class="form-group">
                            <label><strong>Message </strong></label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button type="submit" name="submit" required="required"><strong>Submit Message</strong></button>
                        </div>
                        						
                    </div>
                   
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
				
			</div>
		</div>
	</section>
	<!-- /CONTACT -->


				 

              
               </div>
    </section><!--/#content-->
        </div>
            </div>
        </div>
    </section>
	
	
	

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2016 <a href="#" >Luyolo Bed and Breadfast</a>. All Rights Reserved.
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
</html>