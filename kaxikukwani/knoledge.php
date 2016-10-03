<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Blog</title>
	<meta charset="utf-8">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your keywords">
	<meta name="author" content="Your name">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	    
	<script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='js/jquery.preloader.js'></"+"script>");}	</script>
	<script>		
		 jQuery(window).load(function() {	
		 $x = $(window).width();		
	if($x > 1024)
	{			
	jQuery("#content .row").preloader();}	
	
	jQuery(".list-blog li:last-child").addClass("last"); 
	jQuery(".list li:last-child").addClass("last"); 

	
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
            <h1 class="brand brand_"><a href="index.php"><img alt="" src="img/logo.png"> </a></h1>
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
  <!--============================== content =================================-->      
   <div id="content"><div class="ic">More Website Templates @ TemplateMonster.com. November19, 2012!</div>
    <div class="container">
          <div class="row">
        <article class="span8">
         <div class="inner-1">         
          <ul class="list-blog">
            <li>  
            <h3>Stuff you didn't know about Ka Xikukwani... </h3>     
            <time style="color: red" datetime="2012-11-09" class="date-1">june.2016</time>
            <div class="name-author" style="color: red">by <a href="#">Admin</a></div>
             
            <div class="clear"></div>            
              <img alt="" src="img/page4-img1.jpg">                               
              <p>Mbhangazeki high school i Xikolo lexi xinga sungula ku tirha hi 1992, Ehansi ka vu rangeli ka Mr Mkhabele laha angaya eku wiseni hi lembe ra 2016. </p>
                        
            </li>  
                        
            <li>  
                                 
          </ul>
          </div>  
        </article>
        <article class="span4">
          <h3 style="color:white">Namutlha Tiva Loyi</h3>
          <form id="search" action="search.php" method="GET" accept-charset="utf-8" >
             
             
          </form>
	
		 
        
        <?php
        
                                               
						
						require_once('dbConnect.php');
						$sql = "select * from additionalinfo,tblregister where tblregister.memberid=additionalinfo.fkmenberid AND usertype='Current'";
		
						$result = array();
						$count =0;
						$images="";
						if(mysqli_query($con,$sql))
						{
							$result = $con->query($sql);
							if ($result->num_rows > 0)
							{
									
								while($row = $result->fetch_assoc()) 
								{
									
									
								echo '<tr> <div class="product">
								      	  <li class="box"><img alt="" height=400 width=210 src=',$row['image'], '></li>
                                                                              <td><h5 style="color:white">',$row['surname']."  ".$row['name'],'</h5></td>
                                                                      <h3 style="color:red">Information About Me</h3>
								<div class="info">
									<td><p style="color:white"> Muganga: ',$row['place'],'</p></td>
									<td><p style="color:white"> Primary School: ',$row['primSchool'],'</p></td>
									<td><p style="color:white">High School: ',$row['highSchool'],'</p></td>
                                                                        <td><p style="color:white"> Year Passed Matric: ',$row['yearMatricPassed'],'</p></td>
                                                                        <td><p style="color:white">Varsity/Collage Attended: ',$row['Varsity'],'</p></td>
									
									
									
								</div>
								</div>
							</div> </tr>';
								}
								  
							}
								
						}
                                               
						
						$i=0;
						$arrayImages=array();
						$elements=array();
						$arrayImages=explode('@',$images);
						
						

					
					
					
					?>
        </article>
      </div>
     </div>
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
    <div class="privacy pull-left">Website Template designed by <a href="http://www.templatemonster.com/" target="_blank" rel="nofollow">TemplateMonster.com</a> </div>
  </div>
    </footer>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>