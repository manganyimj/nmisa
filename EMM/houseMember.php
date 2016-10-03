<!DOCTYPE html>
<?php
session_start();
include './PHP/IndigentApplication.php';
$indigentApplication = unserialize($_SESSION['indigentApplication']);
$id=$indigentApplication->getId();
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST["btnIndApplication"]))
	{
		header('location:register.php');
	}
	else if(isset($_POST["btnHouseMember"]))
	{
		header('location:houseMember.php');
	}
	else if(isset($_POST["btnHouseBudget"]))
	{
		header('location:houseBudget.php');	
	}
	else if(isset($_POST["livingCond"]))
	{
		header('location:livingCond.php');
	}
	else if(isset($_POST["btnSupportingDoc"]))
	{
		header('location:supportingDoc.php');	
	}
	else if(isset($_POST["btnNext"]))
	{
            $_SESSION["fromPage"]='houseMember.php';
            header('location:houseBudget.php');	
	}
	else if(isset($_POST["btnBack"]))
	{
		header('location:contactInfo.php');	
	}
	else if(isset($_POST["btnCancel"]))
	{
		header('location:index.html');	
	}
        else if(isset($_POST["btnUpdate"]))
        {
            if(isset($_POST["updateId"]))
            {
                
               $_SESSION["updateId"]=$_POST["updateId"];
               header('location:updateHousehold.php');
               
               
              
            }
            else
            {
                $_SESSION["householdMssg"]="please Select Row to update..!!";
             
            }
             
             
        }
        else if(isset($_POST["btnAdd"]))
        {
            
            include './PHP/dbConnect.php';
            $id=$_POST['id'];
            $sqlCheckId = "SELECT * FROM householdmember WHERE id ='$id'";
        
            
            $CheckId = mysqli_fetch_array(mysqli_query($con,$sqlCheckId));
           
            if(isset($CheckId))
            {
                //echo 'cell phone or email address used alredy exist';
                $_SESSION["signInMssg"]="Household member (".$id.") allready added";
                header('location:houseMember.php');
            }
            else
            {
                include './PHP/HouseholdMember.php';
                $householdMember=new HouseholdMember($_POST['id'], $_POST['indigentType'], $_POST['surname'], $_POST['init'], $_POST['DOB'], $_POST['status'],
                        $_POST['employee'], $_POST['education'], $_POST['disability'], $_POST['disabilityDesc']);
               
               
                 include './PHP/DatabaseManager.php';
           
                $databaseManager=new DatabaseManager();
               
                $databaseManager->addHouseholdMember($householdMember, $indigentApplication);
               
            }
            
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
<script type="text/javascript" src="ValidateHouseMember.js"></script>
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
			<div class="panel panel-info">
			<center>
				<button disabled type="submit" name="btnIndApplication" id="btnIndApplication" class="btn btn-success">Indigent Application</button>
				<button disabled type="submit" name="btnHouseMember" id="btnHouseMember" class="btn btn-info">Household Members</button>
				<button disabled type="submit" name="btnHouseBudget" id="btnHouseBudget" class="btn btn-warning">Household Budget</button>
				<button disabled type="submit" name="livingCond" id="livingCond" class="btn btn-warning">Living Condition</button>
				<button disabled type="submit" name="btnSupportingDoc" id="btnSupportingDoc" class="btn btn-warning">Supporting Document</button>
			</center>
		   </div>
                <article class="col-xs-12 maincontent">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                         <center>
                              <?php

                                if(isset($_SESSION["householdMssg"]))
                                {
                                    echo "<center><P style=color:orange>".$_SESSION["householdMssg"]."</p></center>";
                                }

                               ?>
                         </center>

                    </div>
                    </div>
                </article>
			<article class="col-xs-12 maincontent">

			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
           
			<div class="panel panel-info">
			  <div class="panel-heading" > <h4 class="thin text-center">Please Provide household member details</h4></div>
			  <div class="panel-body">
			  <label for="exampleInputName2">RSA ID Number</label> <label id="lblId"></label>
                          <input type="number" class="form-control" id="id" name="id" required onkeyup="validateId()"placeholder="9004846062082">
				
			<label for="exampleInputName2">Indigent Type</label><label id="lblIndType"></label>
				
				<select name="indigentType"  class="form-control" id="indigentType">
                                  <option >Select</option>
				  <option >Child</option>
                                  <option >Child of Partner</option>
                                  <option >Spouse</option>
				  <option >Stepchild</option>
                                  <option >Father</option>
                                  <option >Mother</option>
                                  
				  
				 
				</select>
				
				<label for="exampleInputName2">Surname</label> <label id="lblName"></label>
                                <input type="text" class="form-control" id="surname" required onkeyup="validateSurname()"name="surname" placeholder="Jane Doe" >
				
				<label for="exampleInputName2">Initials</label><label id="lblinit"></label>
                                <input type="text" class="form-control" id="init" name="init" required onkeyup="validateInit()"placeholder="C" >
			
				<label for="exampleInputName2">Date of Birth</label><label id="lblDOB"></label>
				<input type="date" class="form-control" id="DOB" name="DOB" >
				
				<label for="exampleInputName2">Application Status</label><label id="lblAppStatus"></label>
				<select name="status"  class="form-control" id="status">
                                  <option >Select</option>
				  <option >Unemployed</option>
				  <option>Employed</option>
				  <option>Self Employed</option>
				  
				</select>
				<label for="exampleInputName2">Employer</label><label id="lblEmployer"></label>
				<input type="text" class="form-control" id="employer" name="employer" placeholder="Eskom" >
				
				<label for="exampleInputName2">Education</label><label id="lbledu"></label>
				<select name="education"  class="form-control" id="education">
				
                                  <option >Select</option>
				  <option >Primary School</option>
				  <option>Secondary School</option>
				  <option>Tertiary</option>
				  <option>Not Applicable</option>
				  
				</select>
                                
				<label for="exampleInputName2">Disability?</label><label id="lblDisability"></label>
				<select name="disability"  class="form-control" id="disability">
				
                                   <option >Select</option>
				  <option >No</option>
				  <option>Yes</option>
	
				</select>
                                <label id="lblDisabilityDesc"></label>
				<input type="text" class="form-control" id="disabilityDesc" name="disabilityDesc" placeholder="If Yes Specify nature of disability"  >
				
				<br>
				<center><button type="submit" name="btnAdd"  id="btnAdd" class="btn btn-primary btn-lg active">Add Member</button></center>
					
				<center>
</form>
				<table>
					
					<tr>
					
					
					 </form>
    
                                        <form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST" >
                                            
                                      
					<td>
                                        <center><button type="submit" name="btnNext"  id="btnNext" class="btn btn-primary btn-lg active">Done >></button></center>
					</td>
                                        </form>
					</tr>
					</tr>
				</table>
				</center></div>
			</div>
			</div>
                           
			</article>
                
       
    </section>






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