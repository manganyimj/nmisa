<!DOCTYPE html>
<?php
session_start();

include './PHP/Login.php';
$login = unserialize($_SESSION['login']);
$id=$login->getId();
//echo ' The username is:'.$username;

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
            

            include './PHP/IndigentApplication.php';
            $indigentApplication=new IndigentApplication($_POST['id'], $_POST['title'], $_POST['surname'], $_POST['name'], $_POST['DOB'], $_POST['gander'],
            $_POST['status'], $_POST['ageCat'], $_POST['appType']);
            $_SESSION['indigentApplication'] = serialize($indigentApplication);
            header('location:residentialAddress.php');
                
           
            	
	}
	else if(isset($_POST["btnCancel"]))
	{
		header('location:index.html');	
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
     <script type="text/javascript" src="validateRegister.js"></script>
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
				<button disabled type="submit" name="btnIndApplication" id="btnIndApplication" class="btn btn-info">Indigent Application</button>
				<button disabled type="submit" name="btnHouseMember" id="btnHouseMember" class="btn btn-warning">Household Members</button>
				<button disabled type="submit" name="btnHouseBudget" id="btnHouseBudget" class="btn btn-warning">Household Budget</button>
				<button disabled type="submit" name="livingCond" id="livingCond" class="btn btn-warning">Living Condition</button>
				<button disabled type="submit" name="btnSupportingDoc" id="btnSupportingDoc" class="btn btn-warning">Supporting Document</button>
			</center>
		   </div>
			<article class="col-xs-12 maincontent">

			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
           
			<div class="panel panel-info">
			  <div class="panel-heading" > <h4 class="thin text-center">Please Provide The Following</h4></div>
			  <div class="panel-body">
				<label for="exampleInputName2">Title </label><label id="lbltitle"></label>
				
				<select name="title"  class="form-control" id="title">
                                  <option >Select</option>
				  <option >Mr</option>
				  <option >Mrs</option>
				  <option >Miss</option>
				 
				</select>
				
				<label for="exampleInputName2">Surname </label><label id="lblSurname"></label>
                                <input type="text" class="form-control" id="surname" onkeyup="validateSurname()" required name="surname" placeholder="Jane Doe" >
				
				<label for="exampleInputName2">Name </label> <label id="lblName"></label>
				<input type="text" class="form-control" id="name" name="name"  onkeyup="validateName()" required placeholder="Jane Doe" >
				
				<label for="exampleInputName2">RSA ID Number</label>
                                <input type="number" class="form-control" id="id" name="id"  value="<?php print $id; ?>" required readonly placeholder="9004846062082">
				
				<label for="exampleInputName2">Date of Birth </label><label id="lblDOB"></label>
                                <input type="date" class="form-control" id="DOB"  required name="DOB" >
				
				<label for="exampleInputName2">Gander </label><label id="lblgander"></label>
				<select name="gander"  class="form-control" id="gander">
                                  <option >Select</option>
				  <option>Male</option>
				  <option>Female</option>
				 
				</select>
				
				<label for="exampleInputName2">Marital Status </label><label id="lblstatus"></label>
				<select name="status"  class="form-control" id="status">
                                  <option >Select</option>
				  <option >Single</option>
				  <option>Married</option>
				  <option>Divorced</option>
				 
				</select>
				
				<label for="exampleInputName2">Age Category </label> <label id="lblageCat"></label>
				<select name="ageCat"  class="form-control" id="ageCat">
                                  <option >Select</option>
				  <option >18-20</option>
				  <option>20-25</option>
				  <option>25-30</option>
				  <option>30-35</option>
				  <option>35-40</option>
				  <option>40-45</option>
				  <option>45-50</option>
				  <option>50-55</option>
				  <option>55-60</option>
				  <option>60-65</option>
				  <option>65-70</option>
				  <option>70-75</option>
				  <option>75-80</option>
				  <option>80-85</option>
				  <option>85-90</option>
				  <option>90-95</option>
				  <option>95-100</option>
				  <option>100-105</option>
				  <option>105-110</option>
				  <option>110-120</option>
                                   <option>1000-2000</option>
				 
				</select>
				
				<label for="exampleInputName2">Application Type</label> <label id="lblappType"></label>
				<select name="appType"  class="form-control" id="appType">
                                  <option >Select</option>
				  <option >Unemployed</option>
				  <option>Employed</option>
				  <option>Self Employed</option>
				  
				</select>
				<br>
				<center>
				<table>
				<tr>
				<td>
				<center><button type="submit" name="btnNext"  id="btnNext" class="btn btn-primary btn-lg active">Next</button></center>
			 
				</td>
				
				</tr>
				</table>
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
