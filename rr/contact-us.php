<?php
session_start();

if(isset($_POST["submit"]))
{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
	  
	   //=============Snding Email=============
		$to = "manganyimj12@gmail.com";
		$subject ="MDynamic Client";
		$fullMessage = "Dear sir/madam. I'm ".$name." ,here is my email address ".$email."  ".$message;
		$message = $fullMessage;
						
		$headers = 'From: MDynamic Technologies' . "\r\n" .
				  'Reply-To: johnmanganymj12@gmail.com' . "\r\n" ;
							
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
    <title>Contact</title>
    
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

   
	
	
	<!-- CONTACT -->
	<section id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h1 style="color:#3c6a82"><b><center>CONTACT US</center></b></h1>
						<!-- <span class="st-border"></span> -->
						</br></br>
					</div>
				</div>
				
				<div class="col-sm-4 contact-info">
					<p class="contact-content">RonRof Global Freight it is situated in South Africa <b style="color:#3c6a82"></br>54 Hlanganani streets </br> Louis Trichardt</p>
					</br></br>
					<p class="st-address"><i class="fa fa-map-marker"></i> <strong>South Africa</strong></p>
					<p class="st-phone"><i class="fa fa-mobile"></i> <strong>015 518 4014</strong></p>
					<p class="st-phone"><i class="fa fa-mobile"></i> <strong>076 749 6836</strong></p>
					<p class="st-email"><i class="fa fa-envelope-o"></i> <strong>support@rrglobalf.com</strong></p>
				</div>
				<article class="span4">
				     <p style="color:white"> <center><b>OUR FOOTPRINTS </b></center></p>
					 <img class="img-responsive" src="images/gallary/footprint.jpg" >
			  </address>
            </article>
			
     <section id="contact-page">
        <div class="container">
            <div class="center">        
                 </br>
                
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
				<center><p class="lead">For any inquiries, drop us an email. Members at RonRof Global Freight would love to hear from you.</p></center>
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
                    </div>
                    <div class="col-sm-5">
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
    </section><!--/#contact-page-->
	
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