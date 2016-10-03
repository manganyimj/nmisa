<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<link rel="shortcut icon" href="images/logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>mdt</title>
	
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
</head><!--/head-->

<body>
   <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78690734-2', 'auto');
  ga('send', 'pageview');

</script>
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
                        <li><a class="page-scroll" href="index.html">Home</a></li>
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
	
	<!-- our-team -->
			
		</div><!--/.container-->
    </section><!--/about-us-->
	
	<section id="about" class="bg-light-gray">
        <div class="container">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-primary" style="box-shadow: 2px 2px 2px 2px #1b374f;">
                    <div class="panel-heading" style="box-shadow: 2px 2px 2px 2px #1b374f;">
                        <h2 style="text-shadow: 2px 2px 4px black;" align="center">MDyanamic Technologies Team</h2></div>
                        <div class="panel-body">
                        <div class="container">
                </div>
            <div class="row" align="center">
               <div class="team">
                 
				 <div class="row clearfix">
					<div class="col-md-4 col-sm-6">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="pull-left">
									<a href="#"><img class="media-object" src="images/team/thendo.jpg" alt=""></a>
								</div>
								<div class="media-body">
									<h4>Thendo Siphuma</h4>
									<h5>Bussness Analyst</h5>
									
									<ul class="social_icons">
										<li><a target="_blank" href="https://www.facebook.com/tsiphuma?fref=ts"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li> 
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
								<p>Business analyst Identifying & communicating varied business requirements, modelling business processes and system architeture is what i do best.</p>
							</div><!--/.media -->
							
						</div>
					</div><!--/.col-lg-4 -->

					
				<div class="col-md-4 col-sm-6 col-md-offset-2">	
						<div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="media">
								<div class="pull-left">
									<a href="#"><img class="media-object" src="images/team/robert.jpg" alt=""></a>
								</div>
								<div class="media-body">
									<h4>Robert Maswanganyi</h4>
									<h5>General PR Manager</h5>
									
									<ul class="social_icons">
										<li><a target="_blank" href="https://www.facebook.com/robert.massuanganhe"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li> 
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							  <p>The good image of the company and relationship between all shareholders are his number one priority.
							  </p>
							</div><!--/.media -->

						</div>
				</div><!--/.col-lg-4 -->
					
					
								
				</div> <!--/.row -->
				<div class="row team-bar">
					
					<div class="first-arrow hidden-xs">
						<hr> <i class="fa fa-angle-up"></i>
					</div>
					<div class="second-arrow hidden-xs">
						<hr> <i class="fa fa-angle-down"></i>
					</div>
					<div class="third-arrow hidden-xs">
						<hr> <i class="fa fa-angle-up"></i>
					</div>
					<div class="fourth-arrow hidden-xs">
						<hr> <i class="fa fa-angle-down"></i>
					</div>
				</div> <!--skill_border-->       
                
				
				
					
					
				<!-- <div class="row clearfix">   
					<div class="col-md-4 col-sm-6 col-md-offset-2">	
						<div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="media">
								<div class="pull-left">
									<a href="#"><img class="media-object" src="images/team/vutivi.jpg" alt=""></a>
								</div>

								<div class="media-body">
									<h4>Vutivi Khosa</h4>
									<h5>Financial Auditor</h5>
									<ul class="social_icons">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li> 
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
								<p>Expert in finances ,she realy understand economy and how our client and campany can benefit from economy.</p>
							</div><!--/.media 
							
						</div>
					</div> -->
					<div class="row clearfix">   
					<div class="col-md-4 col-sm-6 col-md-offset-2">	
						<div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="media">
								<div class="pull-left">
									<a href="#"><img class="media-object" src="images/team/sibiya.jpg" alt=""></a>
								</div>
								<div class="media-body">
									<h4>Christoph Sibiya</h4>
									<h5>Software Developer</h5>

									<ul class="social_icons">
										<li><a target="_blank" href="https://www.facebook.com/venus.sibiya?fref=ts"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li> 
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
								<p>Im the creative minds behind computer programs.I analyze users’ needs and then design, test, and develop software to meet those needs</p>
							</div><!--/.media -->
							
						</div>
					</div>
					
					<div class="col-md-4 col-sm-6 col-md-offset-2">
						<div class="single-profile-bottom wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="media">
								<div class="pull-left">
									<a href="#"><img class="media-object" src="images/team/john.png" alt=""></a>
								</div>
								<div class="media-body">
									<h4>Manganyi John</h4>
									<h5>Software Developer</h5>
									
									<ul class="social_icons">
										<li><a target="_blank" href="https://www.facebook.com/john.m.manganyi"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li> 
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
								<p>Expert in web and mobile application development, i'm very passianate about Technology i believe that our innovative skills we help your company to remain at the top, in current Technology Trends.</p>
							</div><!--/.media -->
							
						</div>
					</div><!--/.col-lg-4 -->
					
					
				
						
				</div>	<!--/.row-->
			</div><!--section-->

              
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