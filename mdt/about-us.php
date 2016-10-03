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
	
	
	<div id="fb-root"></div>
    <script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
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
                        <h2 style="text-shadow: 2px 2px 4px black;" align="center">About MDyanamic Technologies</h2></div>
                        <div class="panel-body">
                        <div class="container">
            </div>
            <div class="row" align="center">
                <div class="col-sm-6"  align="center">
                    <div class="tabbable"> <!-- Only required for left/right tabs -->
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#weare" data-toggle="tab">About Us</a></li>
                        <li><a href="#target" data-toggle="tab">Our Target</a></li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active">
                            <h3 class="service-heading myFont" style="text-shadow: 1px 1px 2px blue;">About The Company</h3>
                            <p>
                                MDynamic Tech refers to Magoda Dynamic Technologies, which is the company that was established in the year 2015.<br> 
				One of our main aim as a company is to make sure that rural areas are aware of Technology trend.
                            </p>
                                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <!-- marketing -->
                                <ins class="adsbygoogle"
                                     style="display:block"
                                     data-ad-client="ca-pub-7533113546334956"
                                     data-ad-slot="1735587622"
                                     data-ad-format="auto"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                        </div>

                        <div class="tab-pane" id="wedo">
                            <h3 style="text-shadow: 1px 1px 2px black;" class="myFont"></h3>
                                
                            <p style="font-family: Montserrat, sans-serif;">
                                  
                            </p>
                        


                        </div>
                        <div id="target" class="tab-pane">
                            <h3 style="text-shadow: 1px 1px 2px black;" class="myFont">Company Aim</h3>
                                <p>
                                    Our target market are companies which are not available online. We aim to provide them with innovative Technology solutions, that will help them to improve their perfomance and increase the profit.By reducing cost required to market their company.
                                    
                                </p> 
                        </div>
						
						
						
						<div class="panel panel-primary">
						    <div class="panel-heading">
							<b>This are some of our client Websites</b>
						</div>
						<!-- <div class="panel-body">
							<div>
							   <div class="col-md-6">
								 <img src="images/clogos/logor.jpg" class="img-responsive" alt="Cinque Terre">
								 
							   </div>
							   <div class="col-md-6">
								 <button class="btn btn-primary" style="background: #39b3d7;border: black;"><i class="fa fa-search"></i> <a style="color: white;" target="_blank" href="http://www.luyolobandb.co.za/">Visit Website</a></button>
							   </div>
						    </div>
						</div> -->
						<div class="panel-body">
							<div>
							   <div class="col-md-6">
								 <img src="images/clogos/logo.png" class="img-responsive" alt="Cinque Terre">
								 
							   </div>
							   <div class="col-md-6">
								 <button class="btn btn-primary" style="background: #39b3d7;border: black;"><i class="fa fa-search"></i> <a style="color: white;" target="_blank" href="http://www.luyolobandb.co.za/">Visit Website</a></button>
							   </div>
						    </div>
						</div>
						<!-- <div class="panel-body">
							<div>
							   <div class="col-md-6">
								 <img src="images/clogos/logo.jpg" class="img-responsive" alt="Cinque Terre">
							   </div>
							   <div class="col-md-6">
								 <button class="btn btn-primary" style="background: #39b3d7;border: black;"><i class="fa fa-search"></i> <a style="color: white;" target="_blank" href="http://www.ntirhisanolandscapes.co.za/">Visit Website</a></button>
							   </div>
						    </div>
						</div> -->
				</div>
						
                      </div>
                    </div>



                </div>






                <div class="col-sm-6"  align="center">
                    <div class="tabbable"> <!-- Only required for left/right tabs -->
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#face" data-toggle="tab">Facebook</a></li>
                        
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="fb-page" data-href="https://www.facebook.com/MDynamic-Technologies-531421617061250/?fref=ts" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/MDynamic-Technologies-531421617061250/?fref=ts"><a href="https://www.facebook.com/MDynamic-Technologies-531421617061250/?fref=ts">MDyanamic Technologies</a></blockquote></div></div>
                        </div>
                        
                        

                      </div>
                    </div>



                </div>


                  

                <!--
                
                -->
                </div>
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
    <script type="text/javascript">
        $('.carousel').carousel()
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>