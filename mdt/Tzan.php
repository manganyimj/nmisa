<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
	<link rel="shortcut icon" href="images/logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sale</title>
	
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
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
     
	 
	 
</head>

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
			
	</br>
    <div>
	   <div class="col-md-12 col-md-offset-0">
	     <div class="panel panel-primary" style="box-shadow: 2px 2px 2px 2px #1b374f;">
                    <div class="panel-heading" style="box-shadow: 2px 2px 2px 2px #1b374f;">
                        <h2 style="text-shadow: 2px 2px 4px black;" align="center">Best deals from your favourite shops</h2></div>
                        <div class="panel-body">
            <div>
						
						<div class="row">
            </br>
            <div class="col-md-2 col-md-offset-0" id="adside">
                <h2 style="color:white"><center><strong>Towns</strong></center></h2>
                <div class="list-group">
                    <a href="sale.php" class="list-group-item">Giyani</a>
                    <a href="sale.php" class="list-group-item">Malamulele</a>
                    <a href="sale.php" class="list-group-item">Tzaneen</a>
					<a href="sale.php" class="list-group-item">Thohoyandou</a>
					<a href="sale.php" class="list-group-item">Elim</a>
                </div>
				
				<h2 style="color:white"><center><strong>Upcoming Event</strong></center></h2>
				
                <div class="list-group">
                    <img class="img-responsive" src="images/events/event.png" alt="">
					<center><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Read more about event</button></center>
				
                </div>
				
            </div>
			
            <div class="col-md-8">

            
				    <center><p style="color:white" id="adside"><strong>Available special for this week rush to the nearest brach.</strong></p></center>
					<img class="img-responsive" src="images/brouchers/spar1.jpg"  height="600" width="950" alt="Manganyi Image" id="social"  onclick="clearInterval(timer);"> 
                    <!--<img class="img-responsive" height="600" width="950" src="images/brouchers/spar1.jpg" alt="">-->
                    <div class="caption-full">
                       
                        

                    </div>
                    
             

                <div class="well">

                    

                    <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="provide your cellphone number Or email address " id="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                    </div>
                    
					<center><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Subscribe to Advertise</button></center>



                    
                </div>

            </div>
			<div class="col-md-2 col-md-offset-0" id="adsider">
                <h2 id="adside" style="color:white"><center><strong>Annoucement</strong></center></h2>
                <div>
                    <p>As the Municipality of Giyani we would like to announce that the will be a power cut at Xikukwani Village
					   from today 15h00 to 15h30 this is due to the mantainance of transformers taking place at one of Eskom sub station
					   based there at Xikukwani. sorry for incovenience.
					</p>
                </div>
				
				
            </div>

        </div>
            </div>
            
            </div>
			
			


    </section><!--/#content-->
        </div>
	 </div>
	</div>
    <!-- Page Content -->
    <div class="container">

        

    </div>
    <!-- /.container -->

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
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	</script>
        
        	<script type="text/javascript">
			  var prof_pic = 'm';
			 
			 function change(){
			    var image = document.getElementById('social');
				if(prof_pic == 'm'){
				   image.src = 'images/events/event.png';
				   prof_pic = 'v';
				}
				else if(prof_pic == 'v')
				    {
					   image.src = 'images/brouchers/spar1.jpg';
					   prof_pic = 'j';
					}else if(prof_pic == 'j')
					     {
						      image.src = 'images/events/event.png';
					          prof_pic = 'k';
						 }
						   else{
						        image.src = 'images/brouchers/spar1.jpg';
					             prof_pic = 'm';
						 }			
			  }
			  var timer = setInterval('change()',5000);

	</script>

</body>

</html>
