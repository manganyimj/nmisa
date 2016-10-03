<?php
session_start();

if(isset($_POST["delete"]))
{
    require_once('dbConnect.php');
    
    //
    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];
       
	$sql = "DELETE FROM tblregister WHERE memberid='$id'";
        if(mysqli_query($con,$sql))
        {
            echo 'user deleted';
        }
        else 
        {
            echo "Not deleted";
        }
    }
    else 
    {
          echo "Select atleast one value"; 
    }
    
    
}
else if(isset($_POST["update"]))
{
       if(isset($_POST["id"]))
       {
           require_once('dbConnect.php');

            $_SESSION["memberSelected"] = $_POST["id"];
            header('location:updateUserAdmin.php');
           /* echo $updatedUserType;
            $sql = "UPDATE tblregister SET usertype ='$updatedUserType' where memberid ='$id'";
                 //$sql = "update  tblregister WHERE memberid='$id'";
            if(mysqli_query($con,$sql))
            {
                     echo 'Updated';
            }
            else 
            {
                     echo "Not Updated";
            }*/
       }
       else 
       {
          echo "Select atleast one value"; 
       }
       
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Contact</title>
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
	<script src="js/forms.js"></script>
	<script>		
   jQuery(window).load(function() {	
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
                <li class="sub-menu"><a href="profile.php">Profile</a></li>
	        <li><a href="login.php">All Members</a></li>
	        <li><a href="Register.php">Update Announce</a></li>
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
              <h3>All Members Registered</h3>
              <div class="inner-1">
            <form id="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
			<div class="col-sm-5 col-sm-offset-1">
	       <table width="100%" border=10>
		            <tr>
					        
                            
	        </div>

                </form>
                  <form id="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
                      <table width="100%" border=10>
		            <tr>
					        <td><strong>Select</strong></td>
                                                <td> <strong>Vito</strong></td>
						<td> <strong>Xivongo</strong></td>
						<td> <strong>Rimbewu</strong></td>
                                                <td> <strong>Email</strong></td>
                                                <td> <strong>User Type</strong></td>
                                               
					</tr>
					<?php
						
						require_once('dbConnect.php');
						$sql = "select * from tblregister";
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
									//$images .=$row['announceId']."#".$row['announcement']."#".$row['date']."#".$row['time']."@";
									
								echo "<tr>".'<div class="product">
									<div class="info">
								    <td> <input type=radio style=color:green  name=id  value=',$row['memberid'],' > </td>
									<td><p style="color:black">',$row['name'],'</p></td>
									<td><p style="color:black">',$row['surname'],'</p></td>
                                                                        <td><p style="color:black">',$row['gender'],'</p></td>
									<td><p style="color:black">',$row['email'],'</p></td>
                                                                        <td><p style="color:black">',$row['usertype'],'</p></td>
							                
                                                                        
									</div>
									</div>
									</div>'."</tr>";
								}
								  
							}
								
						}
					?>

				</table>
               <center>
                                <button type="submit" name="delete"  id="delete" class="btn btn-primary btn-lg" required="required">DELETE</button>
                                <button type="submit" name="update"  id="update" class="btn btn-primary btn-lg" required="required">UPDATE</button>
                                
                            </center>
                  </form>
          </div>
            </article>
        

          <!--<div> <form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
                   <fieldset>
                <div>
                    <label id="time"> Nkarhi </label><label id="lblTime"></label>
                    <input type="text" name="time" id="txTime" class="form-control" required="required">
                </div>
                  <div>
                    <label id="date"> Siku </label><label id="lblTime"></label>
                    <input type="text" name="date" id="txtDate" class="form-control" required="required">
                </div>
				<div>
                    <label id="vanue"> Ndhawu </label><label id="lblTime"></label>
                    <input type="text" name="vanue" id="txtVanue" class="form-control" required="required">
                </div>
                
                <div>
				  <label class="message"> Xitiviso </label><label id="lblTime"></label>
                    <textarea type="text" name="announcement" id="txAnnouncement" class="form-control" required="required">Message</textarea>
                    
                    </div>
                <div class="form-group">
                            <button type="submit" name="submit"  id="submit" class="btn btn-primary btn-lg" required="required">Add Announcement</button>
                </div>
              </fieldset>
				
      </div>-->
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
     </div>
  </div>
    </footer>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>