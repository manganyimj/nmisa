<!DOCTYPE html>
<?php
session_start();
$updateId=$_SESSION["currUserID"];

require_once('./PHP/dbConnect.php');

$sql = "select * from tbllivingcondition where id='$updateId'";
$check = mysqli_fetch_array(mysqli_query($con,$sql));
$result = array();
if(isset($check))
{
    $result = $con->query($sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()) 
        {
            $_SESSION["ownerType"]=$row["ownerType"];
            $_SESSION["typeOfHouse"]=$row["typeOfHouse"];
            $_SESSION["insideRoom"]=$row["insideRoom"];
            $_SESSION["outsideRoom"]=$row["outsideRoom"];
            $_SESSION["cooking"]=$row["cooking"];
            $_SESSION["radio"]=$row["radio"];
            $_SESSION["lights"]=$row["lights"];
            $_SESSION["heaters"]=$row["heaters"];
            $_SESSION["tv"]=$row["tv"];
            $_SESSION["vaccuming"]=$row["vaccuming"];
            $_SESSION["geyser"]=$row["geyser"];
            $_SESSION["washingMachine"]=$row["washingMachine"];
            $_SESSION["updateId"]=$row["id"];

           

        }

    }

}
else
{
     $_SESSION["updateMssg"]="No living condition information found for you";
     header('location:updateFeedback.php');
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
        if(isset($_POST["btnNext"]))
	{
            $ownerType=$_POST["owner"];
            $typeOfHouse=$_POST["typeOfHouse"];
            $insideRoom=$_POST["insideRoom"];
            $outsideRoom=$_POST["outsideRoom"];
            //====Service=====================
          
            $cooking='No';
            $radio='No';
            $lights='No';
            $heaters='No';
            $tv='No';
            $vaccuming='No';
            $geyser='No';
            $washingMachine='No';
            if(isset($_POST["cooking"]))
            {
               $cooking='Yes'; 
            }
            if(isset($_POST["radio"]))
            {
                $radio='Yes';
            }
            if(isset($_POST["lights"]))
            {
                $lights='Yes';
            }
            if(isset($_POST["heaters"]))
            {
                $heaters='Yes';
            }
            if(isset($_POST["tv"]))
            {
                $tv='Yes';
            }
            if(isset($_POST["Vaccuming"]))
            {
                $vaccuming='Yes';
            }
            if(isset($_POST["geyser"]))
            {
                 $geyser='Yes';  
            }
            if(isset($_POST["washingM"]))
            {
                $washingMachine='Yes';
            }
            
            include './PHP/DatabaseManager.php';
            $databaseManager=new DatabaseManager();
            
            
            //====================================Updating=======================
                $sql = "UPDATE tbllivingcondition SET ownerType ='$ownerType', typeOfHouse = '$typeOfHouse',insideRoom='$insideRoom' ,outsideRoom='$outsideRoom',cooking='$cooking',"
                           . "radio='$radio',lights='$lights',heaters='$heaters',tv='$tv',vaccuming='$vaccuming',geyser='$geyser',washingMachine='$washingMachine'"
                           . "WHERE id ='$updateId'";
               if($con->query($sql))
               {
                   $_SESSION["updateMssg"]="Living condition information successfully updated...!!";
                   header('location:updateFeedback.php');
               }
               else
               {
                  $_SESSION["updateMssg"]="We can't update living condition details now, please try again in 5 minutes :".$con->error;
                  header('location:updateFeedback.php');
                  //echo 'Id in false:'.$id;
               }
            
            
            //====================================================================
            //$databaseManager->updateLivingCondition2($updateId,$ownerType,$typeOfHouse,$insideRoom,$outsideRoom,$cooking,$radio,$lights,$heaters,$tv,$vaccuming,$geyser,$washingMachine);
           	
	}
	
}

?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ekurhuleni Metropolitan Municipality</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript" src="ValidateLivingCond.js"></script>
 <script type="text/javascript" src="ValidateSendMessage.js"></script>

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
		 <img src="img/logo.png"  class="img-circle" alt="logo" />
                  
               
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					 <li>
                        <a class="page-scroll" href="index.html">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                   
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Team</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                     <li>
                        <a class="page-scroll" href="Logout.php">Logout</a>
                    </li>
                     <li>
                        <a class="page-scroll" href="help.php">Help</a>
                    </li>
			
                     <li>
                        <a class="page-scroll" href="loginDetails.php">Register</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Register -->
<form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST" onsubmit="return validateForm()">
	<section id="register">
        <div class="container">
           
            <div class="row">
			
			<article class="col-xs-12 maincontent">

			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
           
			<div class="panel panel-info">
			  <div class="panel-heading" > <h4 class="thin text-center">Please Provide The Following</h4></div>
			  <div class="panel-body">
				<label for="exampleInputName2">Ownership Type</label> <label id="lblowner"></label>
				
				<select name="owner"  class="form-control" id="owner">
                                   <option ><?php print  $_SESSION["ownerType"]?></option>
				  <option >Owner</option>
				  <option >Rental</option>
				</select>
				
				<label for="exampleInputName2">Type Of House</label> <label id="lbltypeOfHouse"></label>
				
				<select name="typeOfHouse"  class="form-control" id="typeOfHouse">
                                  <option ><?php print  $_SESSION["typeOfHouse"]?></option>
				  <option >Shack</option>
				  <option >RDP</option>
                                  <option >Bond</option>
                                  <option >Government House</option>
                                  
				</select>
				
				<label for="exampleInputName2">Inside Room</label> <label id="lblinsideRoom"></label>
				
				<select name="insideRoom"  class="form-control" id="insideRoom">
                                  <option ><?php print  $_SESSION["insideRoom"]?></option>
           
				  <option >1</option>
				  <option >2</option>
				  <option >3</option>
				  <option >4</option>
				  <option >5</option>
				  <option >6</option>
				  <option >7</option>
				  <option >8</option>
				  <option >9</option>
				  <option >10</option>
				  <option >11</option>
				  <option >12</option>
				  <option >13</option>
				  <option >14</option>
				  <option >15</option>
				  <option >16</option>
				  <option >17</option>
				  <option >18</option>
				  <option >19</option>
				  <option >20</option>
				</select>
				
				<label for="exampleInputName2">Outside Room</label> <label id="lbloutsideRoom"></label>
				
				<select name="outsideRoom"  class="form-control" id="outsideRoom">
                                  <option ><?php print  $_SESSION["outsideRoom"]?></option>
                                  <option >0</option>
				  <option >1</option>
				  <option >2</option>
				  <option >3</option>
				  <option >4</option>
				  <option >5</option>
				  <option >6</option>
				  <option >7</option>
				  <option >8</option>
				  <option >9</option>
				  <option >10</option>
				  <option >11</option>
				  <option >12</option>
				  <option >13</option>
				  <option >14</option>
				  <option >15</option>
				  <option >16</option>
				  <option >17</option>
				  <option >18</option>
				  <option >19</option>
				  <option >20</option>
				</select>
				
				<br>
				<div class="panel panel-info">
				  <div class="panel-heading" > <center>Services</center></h1></div>
					<div class="panel-body">
						<table class="table table-bordered">
						
						<tr>
						<td>
						Cooking
						</td>
						
						<td>
						Radio
						</td>
						
						<td>
						Lights
						</td>
						
						<td>
						Heaters
						</td>
						</tr>
						
						<tr>
                                                    <?php
                                                        if($_SESSION["cooking"]=="Yes")
                                                        {
                                                            echo '<td>
                                                                    <input type="checkbox" name="cooking" id="cooking" checked="true" value="yes"> </a>
                                                                    </td>';
                                                        }
                                                        else
                                                        {
                                                            echo '<td>
                                                                    <input type="checkbox" name="cooking" id="cooking" value="yes"> </a>
                                                                    </td>';
                                                        }
                                                        
                                                        
                                                        if($_SESSION["radio"]=="Yes")
                                                        {
                                                            echo '
                                                                <td>
                                                                    <input type="checkbox" name="radio" id="radio" value="yes"  checked="true"> </a>
                                                                </td>';
                                                        }
                                                        else
                                                        {
                                                            echo '
                                                            <td>
                                                                <input type="checkbox" name="radio" id="radio" value="yes" > </a>
                                                            </td>';
                                                        }
                                                        
                                                        if($_SESSION["lights"]=="Yes")
                                                        {
                                                            echo '
                                                                <td>
                                                                <input type="checkbox" name="lights" id="lights" value="yes"  checked="true"> </a>
                                                                </td>';
                                                        }
                                                        else
                                                        {
                                                            echo '
                                                                <td>
                                                                <input type="checkbox" name="lights" id="lights" value="yes"> </a>
                                                                </td>';
                                                        }
                                                        
                                                         if($_SESSION["lights"]=="Yes")
                                                         {
                                                             echo '<td>
                                                                    <input type="checkbox" name="heaters" id="heaters" value="yes" checked="true"> </a>
                                                                    </td>';
                                                         }
                                                         else
                                                         {
                                                             echo '<td>
                                                                    <input type="checkbox" name="heaters" id="heaters" value="yes"> </a>
                                                                    </td>';
                                                         }
                                                    
                                                    
                                                    ?>
							
							
							
							
							
						</tr>
						
						<tr>
						<td>
						TV
						</td>
						
						<td>
						Vaccuming
						</td>
						
						<td>
						Geyser
						</td>
						
						<td>
						Washing Machine
						</td>
						</tr>
						
						<tr>
						
                                                    <?php
                                                    
                                                       if($_SESSION["tv"]=="Yes")
                                                       {
                                                           echo '<td>
                                                                <input type="checkbox" name="tv" id="tv" value="yes"  checked="true"> </a>
                                                                </td>';
                                                       }
                                                       else
                                                       {
                                                            echo '<td>
                                                                <input type="checkbox" name="tv" id="tv" value="yes"> </a>
                                                                </td>';
                                                       }
                                                       
                                                        if($_SESSION["vaccuming"]=="Yes")
                                                        {
                                                            echo '
                                                                <td>
                                                                <input type="checkbox" name="Vaccuming" id="Vaccuming" value="yes" checked="true"> </a>
                                                                </td>'; 
                                                        }
                                                        else
                                                        {
                                                            echo '
                                                                <td>
                                                                <input type="checkbox" name="Vaccuming" id="Vaccuming" value="yes"  > </a>
                                                                </td>';
                                                        }
                                                        
                                                        if($_SESSION["geyser"]=="Yes")
                                                        {
                                                            echo '<td>
                                                                <input type="checkbox" name="geyser" id="geyser" value="yes"  checked="true"> </a>
                                                                </td>';
                                                        }
                                                        else
                                                        {
                                                            echo '<td>
                                                                <input type="checkbox" name="geyser" id="geyser" value="yes"> </a>
                                                                </td>';
                                                        }
                                                        
                                                        if($_SESSION["washingMachine"]=="Yes")
                                                        {
                                                            echo '<td>
                                                                <input type="checkbox" name="washingM" id="washingM" value="yes" checked="true"> </a>
                                                                </td>';
                                                        }
                                                        else
                                                        {
                                                            echo '<td>
                                                                <input type="checkbox" name="washingM" id="washingM" value="yes"> </a>
                                                                </td>';
                                                        }
                                                    
                                                    
                                                    ?>
							
							
							
							
							
							
						</tr>
						</table>
						
					</div>
				</div>
				<br>
				
				<center>
				<table>
					<tr>
					
					
					<td>
					<center><button type="submit" name="btnNext"  id="btnNext" class="btn btn-primary btn-lg active">Update</button></center>
					</td>
                                       
				</table>
                                    
                                     <br>
                                <center>
                                            <a class="page-scroll" href="updateApplication.php">Back to Main Page?</a>
                                     </center>
				</div>
				</center>
			  </div>
			</div>
			</div>
			</article>
				
            </div>
        </div>
    </section>
     </form>
                                      




<!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Services</h2>
                   
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class=" fa-4x">
                        
                       <img class="img-circle img-responsive" src="img/service/water.jpg" alt="">
                       
                    </span>
                    <h4 >Water</h4>
                    <p class="text-muted">  </p>
                </div>
                <div class="col-md-4">
                    <span class=" fa-4x">
                        
                        <img class="img-circle img-responsive" src="img/service/land (1).jpg" alt="">
                       
                    </span>
                    <h4 >Land</h4>
                    <p class="text-muted"> </p>
                </div>
                 <div class="col-md-4">
                    <span class=" fa-4x">
                        
                        <img class="img-circle img-responsive" src="img/service/electricity.jpg" alt="">
                       
                    </span>
                    <h4 >Electricity</h4>
                    <p class="text-muted"> </p>
                </div>
            </div>
        </div>
    </section>


   

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Ekurhuleni Metropolitan Municipality</h3>
                </div>
                
                <center><p>Ekurhuleni Metropolitan Municipality is a metropolitan municipality that forms the local government of the East Rand region of Gauteng, South Africa. The name Ekurhuleni means place of peace in Tsonga. Ekurhuleni is one of the five districts of Gauteng province and one of the eight metropolitan municipalities of South Africa. The seat of Ekurhuleni is Germiston. The largest language group among its 2,480,260 people is Zulu (2001 Census). OR Tambo International Airport is in the Kempton Park area of Ekurhuleni.[5] An Integrated Transport Plan has been initiated to allow Ekurhuleni Metropolitan Municipality to confidently develop a transport system within its responsibilities over the next 5 years.

                 Following the 2016 municipal elections, Ekurhuleni will include the area of the Lesedi Local Municipality, which will be abolished, making Ekurhuleni the local government of both the East Rand and the rest of south-eastern Gauteng
                </p></center>
                
                <br>
                <hr>
                <center><h2>Politics</h2></center>
                <hr>
                <center><p>The municipal council consists of 202 members elected by mixed-member proportional representation. 101 are elected by first-past-the-post voting in 101 wards, while the remaining 101 are chosen from party lists so that the total number of party representatives is proportional to the number of votes received. In the election of 18 May 2011 the African National Congress (ANC) won a majority of 125 seats on the council.

                Ekurhuleni uses a mayoral executive system. The Executive Mayor is elected by council and selects a 10-member Mayoral Committee to run the government. As of 2013 the mayor is Mondli Gungubele (ANC). The Speaker of Council is Patricia Khumalo (ANC) and the Chief Whip of Council is Robert Mashego (ANC). The Leader of the Opposition is Fortune Mahano (DA) and the Opposition Chief Whip is André du Plessis (DA).

                The following table shows the results of the 2011 election.</p></center>
            </div>
            
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team1.jpg" class="img-responsive img-circle" alt="">
                        <h4> </h4>
                        <p class="text-muted"></p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team3.jpg" class="img-responsive img-circle" alt="">
                        <h4>Developer</h4>
                        <p class="text-muted"> </p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team2.jpg" class="img-responsive img-circle" alt="">
                        <h4></h4>
                        <p class="text-muted"> </p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                   </div>
            </div>
        </div>
    </section>

  
    
     
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <article class="col-xs-12 maincontent">

                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-info">
                            <div class="panel-heading" > <h4 class="thin text-center">Send Us A message</h4></div>
                                <div class="panel-body">
                    
                                        <form action="SendMessage.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm1()">
                                            
                                            
                                            <label for="exampleInputName2">Enter Your Email </label> <label id="lblEmail"></label>
                                            <input type="email" class="form-control" id="email" name="email" onkeyup="validateEmail1()" placeholder="Email" required >

                                            <label for="exampleInputName2">Enter Your Name  </label> <label id="lblName"></label>
                                            <input type="text" class="form-control" id="name" name="name" onkeyup="validateName1()" placeholder="Name" required >
                                            
                                            <label for="exampleInputName2">Enter Your Surname </label> <label id="lblSurname"></label>
                                            <input type="text" class="form-control" id="surname" name="surname" onkeyup="validateSurname1()" placeholder="Surname" required >
                                            
                                            <label for="exampleInputName2">Message </label> <label id="lblEmail"></label><label id="lblMssg"></label>
                                            <textarea class="form-control" placeholder="Your Message *" name="mssg" onkeyup="validateMssg()" id="mssg" required></textarea>
                                            <br>
                                            <center>
                                            <table>
                                                <tr>
                                                <td>
                                                <center> <button type="submit" name="send"  id="send" class="btn btn-primary btn-lg active">Send</button></center>
                                                </td>
                                                <td>
                                            </table>
                                                </center>
                                        
                                        
                                        </form>
                                    
                    </div>
                    </div>
                </div>
                </article>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Ekurhuleni 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

   

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
