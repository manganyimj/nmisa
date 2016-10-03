<!DOCTYPE html>
<html lang="en">
	<head>
	<title>HOME</title>
	<meta charset="utf-8">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your keywords">
	<meta name="author" content="Your name">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/touchTouch.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/kwicks-slider.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="js/jquery.kwicks-1.5.1.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>	  
	<script type="text/javascript" src="js/touchTouch.jquery.js"></script>
	<script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	</script>

	<script>		
		 jQuery(window).load(function() {	
		 $x = $(window).width();		
	if($x > 1024)
	{			
	jQuery("#content .row").preloader();    }	
		 
     jQuery('.magnifier').touchTouch();			
    jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});	
  		  }); 
				
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
            <h1 class="brand brand_"><a href="index.html"><img alt="" src="img/logo.png"> </a></h1>
            <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
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
      <div class="container">
    <div class="row">
          <div class="span12"> 
        <!--============================== slider =================================-->
        <div class="flexslider">
              <ul class="slides">
            <li> <img src="img/homepage/slide-1.jpg" alt="" > </li>
            <li> <img src="img/homepage/slide-2.jpg" alt="" > </li>
            <li> <img src="img/homepage/slide-3.jpg" alt="" > </li>
            <li> <img src="img/homepage/slide-4.jpg" alt="" > </li>
            <li> <img src="img/homepage/slide-5.jpg" alt="" > </li>
          </ul>
            </div>
        <span id="responsiveFlag"></span>
        <div class="block-slogan">
		      
			  <a href="https://www.facebook.com/groups/xikukwanians/" target="_blank" class="link-1">Check Facebook</a>
              <h2>SWITIVISO!</h2>
			  
              <div>
			  <!-- <div class="form-group">
                            <label id="lblSurname1">Surname :</label><label id="lblSurname"></label>
                            <input type="text" name="surname" id="txtSurname" class="form-control" required="required" onkeyup="validateSurname()">
              </div> -->
			  <?php
						
						require_once('dbConnect.php');
						$sql = "select * from tblannouncement where status='notViewed'";
						$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
						$result = array();
						$count =0;
						$images="";
						if(isset($check))
						{
							$result = $con->query($sql);
							if ($result->num_rows > 0)
							{
									
								while($row = $result->fetch_assoc()) 
								{
									$count++;
									$images .=$row['announceId']."#".$row['announcement']."#".$row['date']."#".$row['time']."@";
									
								echo "<tr>".'<div class="product">
								
								<div class="info">
									<td><p style="color:white">',$row['announcement'],'</p></td>
									<td><p style="color:red"> Siku: ',$row['date'],'</p></td>
									<td><p style="color:red"> Nkarhi: ',$row['time'],'</p></td>
                                                                        <td><p style="color:green"> Ndhawu: ',$row['vanue'],'</p></td>
									
									
									
								</div>
								</div>
							</div>'."</tr>";
								}
								  
							}
								
						}
						
						$i=0;
						$arrayImages=array();
						$elements=array();
						$arrayImages=explode('@',$images);
						
						

					
					
					
					?>
            
			
          </div>
            </div>
      </div>
        </div>
  </div>
      
      <!--============================== content =================================-->
      
      
    
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
    <div >@2016 Kaya Ka Xikukwani. All Rights Reserved. </a> </div>
  </div>
    </footer>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>