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
	<link rel="shortcut icon" href="images/logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact | MDT</title>
    
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
					    <li class="hidden">
                           <a href="#page-top"></a>
                        </li>
                        <li><a class="fa fa-home" class="page-scroll" href="index.html"> Home</a></li>
						<li><a class="page-scroll" href="services.php">Services</a></li>
                        <li><a class="page-scroll" href="about-us.php">About Us</a></li>
						<li><a class="page-scroll" href="ourteam.php">Our Team</a></li>
						<li><a class="fa fa-lock" data-toggle="modal" data-target="#myModal"> Login</a></li>
						<li><a class="page-scroll" href="contact-us.php">Contact</a></li>
						                   
                    </ul>
                </div>
            </div>
        </nav>
		
    </header>

   <!-- login -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body real-spa">
							<div class="login-grids">
								<div class="login">
									
									<div class="login-right">
										<form action="login.php" method="POST">
											<h3 style="text-shadow: 2px 2px 4px #428bca;">Login</h3>
											<input type="text" name="email"value="Enter your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your Email';}" required="">	
											<input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">	
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>
											<input type="submit" id="login" name="login" value="Login Now" >
										</form>
									</div>
																
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- //login -->
	
	
	<section id="about" class="bg-light-gray">
        <div class="container">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-primary" style="box-shadow: 2px 2px 2px 2px #1b374f;">
                    <div class="panel-heading" style="box-shadow: 2px 2px 2px 2px #1b374f;">
                        <h2 style="text-shadow: 2px 2px 4px black;" align="center">How to reach Us</h2></div>
                        <div class="panel-body">
                        <div class="container">
                </div>
            <div class="row" align="center">
               <div class="team">
                 
				  <section id="contact-info">
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">

                          <div style="overflow:hidden;width:500px;height:250px;resize:none;max-width:100%;"><div id="gmap_canvas" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Giyani,+Limpopo,+South+Africa&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="embed-map-code" href="https://www.hostingreviews.website/dreamhost-review" id="authorize-map-data">dreamhost review</a><style>#gmap_canvas .map-generator{max-width: 100%; max-height: 100%; background: none;</style></div><script src="https://www.hostingreviews.website/google-maps-authorization.js?id=831721c9-6d48-f18c-94c2-9d9c984750fb&c=embed-map-code&u=1472544137" defer="defer" async="async"></script>

					</div>

                    <div class="col-sm-7 map-content">
                        <ul class="row">
                            <li class="col-sm-6">
                                <address>
                                    <h3><strong>Contact Details</Strong></h3>
									</br>
                                    <p>Phone : 0722125445<br>
									<p>Or : 0719302119<br>
									<p>Email Addres: support@mdynamictech.co.za</p> 
                                    </br>									
                                    
                                </address>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>  <!--/gmap_area -->

    <section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2>Drop Your Message</h2>
                <p class="lead">For any inquiries, drop us an email. Members at MDynamic Tech would love to hear from you.</p>
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
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label><strong>Message </strong></label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button  type="submit" name="submit" required="required"><strong>Submit Message</strong></button>
                        </div>
						
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->
				 

              
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
</html>