<!DOCTYPE html>
<?php
session_start();
include './PHP/IndigentApplication.php';
include './PHP/Login.php';
include './PHP/Account.php';
$indigentApplication = unserialize($_SESSION['indigentApplication']);
$id=$indigentApplication->getId();
$account= unserialize($_SESSION['account']);

$reffNum=$account->getReffNum();

$login = unserialize($_SESSION['login']);
$email=$login->getUsername();
$password=$login-> getPassword();


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
		header('location:houseBudget.php');	
	}
	else if(isset($_POST["btnSubmit"]))
	{
            require_once('./PHP/dbConnect.php');
           // $sqlCheckId = "SELECT * FROM bldocuments";
            $sqlCheckId = "SELECT * FROM tbldocuments WHERE id ='$id'";
            $CheckId = mysqli_fetch_array(mysqli_query($con,$sqlCheckId));

            if(isset($CheckId))
            {
              
                $sqlCheckId = "SELECT * FROM tblapplicationstatus WHERE applicantID ='$id'";
                $CheckId = mysqli_fetch_array(mysqli_query($con,$sqlCheckId));

                if(isset($CheckId)==false)
                {
                    //=============Snding Email=============
                    $to = $email;
                    $subject ="Ekurhuleni Metropolitan Municipality";
                    $message = "We have receive your application, your reference number is :".$reffNum." Note an email will be send to you regarding you appication. Your Login details: Username/email is ".$email." and password is ".$password;

                    $headers = 'From:EMM' . "\r\n" .
                                            'Reply-To: ekurhuleni.co.za' . "\r\n" .
                                            'Hi' ;

                    mail($to, $subject, $message, $headers);

                    //======================================
                   // include './PHP/DatabaseManager.php';
                    //$databaseManager=new DatabaseManager();
                    //$databaseManager->addStatus($id);

                    //require_once 'dbConnect.php';
                    $sql = "INSERT INTO tblapplicationstatus(applicantId) VALUES('$id')";

                    if(mysqli_query($con,$sql))
                    {

                        $_SESSION["signInMssg"]="You application is successfully submited, an email will be sent to you regarding your application...!!";

                        header('location:feedback.php');
                    }
                    else
                    {

                        echo ''.$_SESSION["fileMssg"]="Error adding status :".$con->error;
                        //header('location:../supportingDoc.php');  
                    }
                }
                else
                {
                     $_SESSION["signInMssg"]="We can not accept your application because you have submited before....!!";

                     header('location:feedback.php');
                }
            }
            else
            {
                 $_SESSION["fileMssg"]="Please provide at least one supporting document...!!";
            }
			
	}
	else if(isset($_POST["btnBack"]))
	{
		header('location:livingCond.php');	
	}
	else if(isset($_POST["btnCancel"]))
	{
		header('location:index.html');	
	}
        else if(isset($_POST["btnAddFile"]))
	{
           
            header('location:./PHP/AddFile.php');	
	}
        else if(isset($_POST["delFile"]))
	{
           
            $document=$_POST["deleteDoc"];
            
            require_once('./PHP/dbConnect.php');
		
            $sql = "DELETE FROM tbldocuments WHERE id ='$id' AND document = '$document'";

            if ($con->query($sql) === TRUE) 
            {
               
                if(@unlink('PHP/'.$document))
                {
                    $_SESSION["fileMssg"]="Document successfully deleted";
                }
                else
                {
                   $_SESSION["fileMssg"] = "Document was not found in the system";
                }
             
            } 
            else
            {
                
                 $_SESSION["fileMssg"]= "Error deleting record: " . $con->error;
            }
           	
	}
}

?>


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
<script type="text/javascript" src="ValidatesupportingDoc.js"></script>
 <script type="text/javascript" src="ValidateSendMessage.js"></script>

</head>



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
  

	<section id="register">
        <div class="container">
           
            <div class="row">
                <form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST" onsubmit="return validateForm()">
			<div class="panel panel-info">
			<center>
				<button disabled type="submit" name="btnIndApplication" id="btnIndApplication" class="btn btn-success">Indigent Application</button>
				<button disabled type="submit" name="btnHouseMember" id="btnHouseMember" class="btn btn-success">Household Members</button>
				<button disabled type="submit" name="btnHouseBudget" id="btnHouseBudget" class="btn btn-success">Household Budget</button>
				<button disabled type="submit" name="livingCond" id="livingCond" class="btn btn-success">Living Condition</button>
				<button disabled type="submit" name="btnSupportingDoc" id="btnSupportingDoc" class="btn btn-info">Supporting Document</button>
			</center>
		   </div>
                </form>
                   <article class="col-xs-12 maincontent">

                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

                    <div class="panel panel-info">

                      <div class="panel-body">

                        <?php

                        if(isset($_SESSION["fileMssg"]))
                        {
                            echo "<center><P style=color:orange>".$_SESSION["fileMssg"]."</p></center>";
                        }

                       ?>
                      </div>
                    </div>
                    </div>
                  </article>
			<article class="col-xs-12 maincontent">

			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
           
			<div class="panel panel-info">
			  <div class="panel-heading" > <h4 class="thin text-center">Provide Supporting Document(s)</h4></div>
			  <div class="panel-body">
                               <form action="PHP/AddFile.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                                 <div class="panel panel-info">
				 
					<div class="panel-body">
                                            <table>
                                                <tr>
                                                    <td><b><u>Required Documents</u></b></td>
                                                </tr>
                                                <tr>
                                                    <td>1. ID of applicant</td>
                                                </tr>
                                                
                                                 <tr>
                                                    <td>2. ID of applicant dependent</td>
                                                </tr>
                                                
                                                 <tr>
                                                    <td>3. Tax invoice</td>
                                                </tr>
                                                 <tr>
                                                    <td>4. Pay Slip or affidavit</td>
                                                </tr>
                                            </table>
                                        </div>
                                  </div>
                                <div class="panel panel-info">
                                <div class="panel-body">
                                  
				<label for="exampleInputName2">Document Description</label><label id="lbldescription"></label>
				<table>
				<tr>
				
				<td>
                                    <input type="text" class="form-control" id="description" required name="description" onkeyup="validateDesc()" placeholder="My Id Document" >
				</td>
				<td>
				<input type="file" class="form-control" id="file" name="file"  >
				
				</td>
				<td>
				<button type="submit" name="btnAddFile" id="btnAddFile" class="btn btn-success">Add File</button>
				
				</td>
				<tr>
				</table>
                               </form>
                              
                              <form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST" >
                                               
				<br>
				<div class="panel panel-info">
				  <div class="panel-heading" > <center><b>DOCUMENT(S)</b></center></h1></div>
					<div class="panel-body">
						<table class="table table-bordered">
						
						<tr>
						
						<td>
                                                <center><b>File Description</b></center>
						</td>
                                                <td>
                                                <center><b>View File</b></center>
						</td>
						
						<td>
                                                <center><b>Select To delete</b></center>
						</td>
						
						
						</tr>
						
						
						<?php
                                                     require_once('./PHP/dbConnect.php');

                                                    $sql = "select * from tbldocuments Where id='$id'";
                                                    $check = mysqli_fetch_array(mysqli_query($con,$sql));
                                                    
                                                    $result = array();
                                                    if(isset($check))
                                                    {
                                                        $idArrays = array();
                                                        $result = $con->query($sql);
                                                        if ($result->num_rows > 0)
                                                        {
                                                            while($row = $result->fetch_assoc()) 
                                                            {
                                                                $fileLocation='PHP/'.$row["document"];
                                                                 echo '<tr>';
                                                                 echo '<td><center>'.$row["description"].'</center></td>';
                                                                 echo '<td><center> <a class="page-scroll" target="_blank" href='.$fileLocation.'>View</a></center></td>';
                                                                 echo '<td><center><input type="radio" name="deleteDoc" id="deleteDoc" value="'.$row["document"].'"></a></center></td>';
                                                                 echo '</tr>';
                                                            }
                                                        }
                                                    }
							
						?>
						
                                                <tr>
                                                    <td></td>
                                                     <td></td>
                                                    <td><center><button type="submit" name="delFile"  id="delFile" >Delete</button></center>
                                                    </td>
                                                </tr>
						</table>
                                                
						
						
					</div>
				</div>
				<br>
				 </form>
				<center>
                                 <form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST" >
				<table>
					<tr>
					
					
					<td>
					<center><button type="submit" name="btnSubmit"  id="btnSubmit" class="btn btn-primary btn-lg active">Submit</button></center>
					</td>
					
					</tr>
				
				</table>
                                 </form>
				</center>
                              </div>
                              </div>

			  </div>
			</div>
			</div>
			</article>
				
            </div>
        </div>
    </section>
<!--</form>-->
    






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
