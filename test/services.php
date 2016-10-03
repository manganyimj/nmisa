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

    <section id="feature" class="transparent-bg">
       <div class="container">
		   <div class="col-md-12 col-md-offset-0">
				<div class="panel panel-primary" style="box-shadow: 2px 2px 2px 2px #1b374f;" >
					<div class="panel-heading" style="box-shadow: 2px 2px 2px 2px #1b374f;">
<h4 style="text-shadow: 2px 2px 4px #428bca;" align="center">Services Offered By MDyanamic Technologies</h4></div>
					
					
					
					<div class="panel-body">
						
				      <section id="feature" class="transparent-bg">		
                        
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading myFont" style="text-shadow: 1px 1px 2px blue;">Web design and hosting</h4>
                    <p>We disign responsive websites meaning it can automatically detect the size of your computer/cellphone screen and respond according, you only need to specify what functions you need in your websites and get it done.</p>
                    </p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-leaf fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading myFont" style="text-shadow: 1px 1px 2px blue;">Business Cards</h4>
                    <p>We design cards that will help your company to be known,It will give more details about company to your client in a simple way.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-cogs fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading myFont" style="text-shadow: 1px 1px 2px blue;">Logo Designs</h4>
                    <p>Logo gives your company its brand,it's actually indetify your company uniquely,We design logos that are more attractive in such a way that your client dont even need your explanation. The logo says it all.</p>
                </div>
            </div>
			<hr>
			    <!-- Page pricing -->
    <div class="container">
        <!-- Content Row -->
        <div class="row">
            
            <div class="col-md-4">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Web Hosting Price</h3>
                    </div>
                    <div class="panel-body">
                        <span class="price"><sup>R</sup>49<sup>99</sup></span>
                        <span class="period">per month</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>1</strong> User</li>
                        <li class="list-group-item"><strong>1</strong> Website</li>
                        <li class="list-group-item"><strong>Unlimited</strong> Email Accounts</li>
                        <li class="list-group-item"><strong>5GB</strong> Disk Space</li>
                        <li class="list-group-item"><strong>Unlimited</strong> Monthly Bandwidth</li>
                        </li>
                    </ul>
                </div>
            </div>
			<div class="container">
		
            <div class="row contact-wrap"> 
                 <h4 style="color:red"><center><strong>You can easly request one of our service, by simple filling in the below form.<strong></center></h4>
				 <h4 style="color:red"><center><strong>We will be in touch with you.<strong></center></h4>
                <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label><strong>Name </strong></label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>
						<div class="form-group">
                            <label><strong>Service Type</strong></label>
							<select class ="form-control" name="serviceType" id="serviceType" type ="text" required >
							<option>click here to select</option>
						    <option>Website</option>
							<option>Business Card</option>
							<option>Logo</option>
							</select>

                        </div>


                        <div class="form-group">
                            <label><strong>Email or Cell Number </strong></label>
                            <input type="text" name="email" class="form-control" required="required">
                        </div>
   
                        <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Request Service</button>						
                    </div>
                    
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
        </div>
        <!-- /.row -->	
			
			
			
			<div class="form-group">
			    <section id="contact-page">
        
    
    

 
		
            </div>
                        
                    
				  </section><!--/#feature-->		
						</div>
						<div class="col-md-6">
									
						</div>
						
					</div>
    </section><!--/#feature-->


    
    </section><!--/#bottom-->

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