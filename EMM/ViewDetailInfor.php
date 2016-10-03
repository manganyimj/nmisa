<!DOCTYPE html>
<?php
session_start();
$indigentAppRaw1=array();
$indigentAppRaw2=array();
 if(isset($_SESSION["currUserID"]) && isset($_SESSION["role"]))
 {
     
    $currUserID=$_SESSION["currUserID"];
    $role=$_SESSION["role"];
   
    if(!$role=='Indigent Clerk')
    {
       
        header('location:login.php');
    }
    else
    {
        $_SESSION["username"];
        $_SESSION["password"];
        $_SESSION["role"];
        $_SESSION["status"];
        include './PHP/Login.php';
        $login=new Login($currUserID,  $_SESSION["username"], $_SESSION["password"], $_SESSION["role"], $_SESSION["status"]);
        $_SESSION['login'] = serialize($login);
    }
 
 }
 else
 {
   
     header('location:login.php'); 
 }
include './PHP/IndigentApplication.php';
$id=  $_SESSION["viewId"];
 //echo 'ID '.$id;
if($_SERVER['REQUEST_METHOD']=='POST')
{
	
        if(isset($_POST["btnVerification"]))
        {
            require_once './PHP/dbConnect.php';;
            $toverify='VerificationInProgress';
            $sql = "UPDATE tblapplicationstatus SET status ='$toverify' WHERE applicantID ='$id'";

            if ($con->query($sql) === TRUE) 
            {
                $_SESSION["viewMssg"]="Your request has been sent to fieldwork...!!";
                 header('location:ViewApplicants.php');
                 
                 require_once('./PHP/dbConnect.php');

                $sql = "select * from tblcontact where id='$id'";
                $check = mysqli_fetch_array(mysqli_query($con,$sql));
                $result = array();
                if(isset($check))
                {
                    $result = $con->query($sql);
                    if ($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc()) 
                        {
                           
                            //===============Send Email=================================
                            $to = $row["email"];
                            $subject ='EMM Application';
                            $message = 'Contradulation...!!, your application has been processed by our cleck, One of our fieldwork will come and verify the information you provided.';
                            $compEmail='reminder@emm.com';
                            $headers = 'From:  '. $compEmail . "\r\n" .
                                                   
                                                    'Dear Applicant' ;

                            mail($to, $subject, $message, $headers);
                           //==========================================================

                        }

                    }

                }
               
                //==============================Sending email to fieldwork=======
                    $role="Indigent Field Worker";
                    $sql = "select * from tblemp,tbllogin where role='$role' AND tblemp.empId=tbllogin.id";
		
                    $check = mysqli_fetch_array(mysqli_query($con,$sql));
                   
                    $result = array();
                    if(isset($check))
                    {
                        $result = $con->query($sql);

                        if ($result->num_rows > 0)
                        {
                               
                                while($row = $result->fetch_assoc()) 
                                {
                                    $email=$row["email"];
                                    //===============Send Email=================================
                                    $to = $email;
                                    $subject ="EMM";
                                    $message = "We have new applicant that have to be verified, for more information check in our system";
                                    $headers = 'From: EMM' . "\r\n" .
                                                            'Reply-To: emm.co.za' . "\r\n" .
                                                            'Hi' ;

                                    mail($to, $subject, $message, $headers);
                                    //==========================================================
                                    
                                   

                                }


                        }

                    }
                //===============================================================
               
                   
            } 
            else
            {
                    $_SESSION["viewMssg"]= "Error menu not updated: " . $con->error;
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
                <div class="panel panel-info">
		   <div class="panel-heading" > <h4 class="thin text-center">Applicant</h4></div>
			  <div class="panel-body">
                            
                              <table class="table table-bordered small ">
                            
                                <tr class="bg-light-gray">
                                 <td><b>ID Number</b></td>
                                 <td><b>Title</b></td>
                                <td><b>Surname</b></td>
                                <td><b>Name</b></td>
                                <td><b>Date Of Birth</b></td>
                                <td><b>Gander</b></td>
                                <td><b>marital Status</b></td>
                                <td><b>Age category</b></td>
                                <td><b>Employment Status</b></td>
                               

                               

                            </tr>
                             <?php
                                require_once('./PHP/dbConnect.php');

                                $sql = "select * from tblindigentapplication where id='$id'";
                                $check = mysqli_fetch_array(mysqli_query($con,$sql));
                                $result = array();
                                if(isset($check))
                                {
                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0)
                                    {
                                        while($row = $result->fetch_assoc()) 
                                        {
                                            $indigentAppRaw1=array($row["id"],$row["title"],$row["surname"],$row["name"],$row["dob"]);
                                            $indigentAppRaw2=array($row["gander"],$row["maritalstatus"],$row["agecategory"],$row["applicationtype"]);
                                            echo '<tr>
                                                <td>'.$row["id"].'</td>
                                                <td>'.$row["title"].'</td>
                                                <td>'.$row["surname"].'</td>
                                                <td>'.$row["name"].'</td>
                                                <td>'.$row["dob"].'</td>
                                                <td>'.$row["gander"].'</td>
                                                <td>'.$row["maritalstatus"].'</td>
                                                <td>'.$row["agecategory"].'</td>
                                                <td>'.$row["applicationtype"].'</td>
                                                
                                           </tr>';

                                        }

                                    }

                                }
                            ?>
                           
                              </table>
                             <center> 
                                 <br>
                              
                                <div class="panel panel-info">
                                 <div class="panel-heading" > <h4 class="thin text-center">House Hold Member(s)</h4></div>
                                    <div class="panel-body">
                               <center>     
                              <table class="table table-bordered small ">
                            
                                <tr class="bg-light-gray">
                                 <td><b>ID Number</b></td>
                                 <td><b>relationship</b></td>
                                <td><b>Surname</b></td>
                                <td><b>initials</b></td>
                                <td><b>Date Of Birth</b></td>
                                <td><b>Employment Status</b></td>
                                <td><b>Employer</b></td>
                                <td><b>Education</b></td>
                                <td><b>Disability</b></td>
                                <td><b>Disability Desc</b></td>
                               

                               

                            </tr>
                             <?php
                                require_once('./PHP/dbConnect.php');

                                $sql = "select * from householdmember where addedByID='$id'";
                                $check = mysqli_fetch_array(mysqli_query($con,$sql));
                                $result = array();
                                if(isset($check))
                                {
                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0)
                                    {
                                        while($row = $result->fetch_assoc()) 
                                        {
                                            //$indigentAppRaw1=array($row["id"],$row["IndigentType"],$row["surname"],$row["initials"],$row["DOB"]);
                                            //$indigentAppRaw2=array($row["applicationStatus"],$row["employeer"],$row["education"],$row["monthlyIncome"],$row["disability"]);
                                            echo '<tr>
                                                <td>'.$row["id"].'</td>
                                                <td>'.$row["IndigentType"].'</td>
                                                <td>'.$row["surname"].'</td>
                                                <td>'.$row["initials"].'</td>
                                                <td>'.$row["DOB"].'</td>
                                                <td>'.$row["applicationStatus"].'</td>
                                                <td>'.$row["employeer"].'</td>
                                                <td>'.$row["education"].'</td>
                                                <td>'.$row["disability"].'</td>
                                                <td>'.$row["disabilityDescriptiong"].'</td>
                                                
                                           </tr>';

                                        }

                                    }

                                }
                            ?>
                           
                              </table>
                             </center> 
                                    </div>
                                  </div>
                                 
                                 
                                 <br>
				<div class="panel panel-info">
				  <div class="panel-heading" > <center><b>Supporting DOCUMENT(S)</b></center></h1></div>
					<div class="panel-body">
						<table class="table table-bordered">
						
						 <tr class="bg-light-gray">
						
						<td>
                                                <center><b>File Description</b></center>
						</td>
                                                <td>
                                                <center><b>View File</b></center>
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
                                                                
                                                                 echo '</tr>';
                                                            }
                                                        }
                                                    }
							
						?>
						
                                                
						</table>
                                                
						
						
					</div>
				</div>
                                 <br>
                              
                              
                               
                                <div class="panel panel-info">
                                 <div class="panel-heading" > <h4 class="thin text-center">Living Condition</h4></div>
                                    <div class="panel-body">
                                       <center>     
                              <table class="table table-bordered small ">
                            
                                <tr class="bg-light-gray">
                                 <td><b>Owner Type</b></td>
                                 <td><b>House Type</b></td>
                                <td><b>Inside Room</b></td>
                                <td><b>Outside Room</b></td>
                                <td><b>cooking</b></td>
                                <td><b>radio</b></td>
                                <td><b>lights</b></td>
                                <td><b>heaters</b></td>
                                <td><b>TV</b></td>
                                <td><b>Vaccuming</b></td>
                                <td><b>geyser</b></td>
                                <td><b>washing Machine</b></td>
                               

                               

                            </tr>
                             <?php
                                require_once('./PHP/dbConnect.php');

                                $sql = "select * from tbllivingcondition where id='$id'";
                                $check = mysqli_fetch_array(mysqli_query($con,$sql));
                                $result = array();
                                if(isset($check))
                                {
                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0)
                                    {
                                        while($row = $result->fetch_assoc()) 
                                        {
                                            echo '<tr>
                                                <td>'.$row["ownerType"].'</td>
                                                <td>'.$row["typeOfHouse"].'</td>
                                                <td>'.$row["insideRoom"].'</td>
                                                <td>'.$row["outsideRoom"].'</td>
                                                <td>'.$row["cooking"].'</td>
                                                <td>'.$row["radio"].'</td>
                                                <td>'.$row["lights"].'</td>
                                                <td>'.$row["heaters"].'</td>
                                                <td>'.$row["tv"].'</td>
                                                <td>'.$row["vaccuming"].'</td>
                                                <td>'.$row["geyser"].'</td>
                                                <td>'.$row["washingMachine"].'</td>
                                                
                                           </tr>';

                                        }

                                    }

                                }
                            ?>
                           
                              </table>
                             </center> 
                                    </div>
                                  </div>
                                
				<br>
                             
                              
                              
                               
                                <div class="panel panel-info">
                                 <div class="panel-heading" > <h4 class="thin text-center">Household Budget</h4></div>
                                    <div class="panel-body">
                                       <center>     
                              <table class="table table-bordered small ">
                            
                                <tr class="bg-light-gray">
                                 <td><b>ID Number</b></td>
                                 <td><b>Bond</b></td>
                                <td><b>Rental</b></td>
                                <td><b>Electricity</b></td>
                                <td><b>Water</b></td>
                                <td><b>Food</b></td>
                                <td><b>Transport</b></td>
                                <td><b>Education Fee</b></td>
                                <td><b>medical expense</b></td>
                                <td><b>Other Expense</b></td>
                                <td><b>Monthly Income</b></td>
                                <td><b>Total R</b></td>
                               
                               

                               

                            </tr>
                             <?php
                                require_once('./PHP/dbConnect.php');

                                $sql = "select * from householdmember,tblhouseholdbudget where householdmember.addedByID='$id' AND householdmember.id=tblhouseholdbudget.householdID ";
                                $check = mysqli_fetch_array(mysqli_query($con,$sql));
                                $result = array();
                                $subTotal=0;
                                if(isset($check))
                                {
                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0)
                                    {
                                        while($row = $result->fetch_assoc()) 
                                        {
                                            $total=$row["bond"]+$row["rental"]+$row["electricity"]+$row["water"]+$row["food"]+$row["transport"]+$row["educationFee"]+$row["medicalexpense"]+$row["otherExpense"];
                                            echo '<tr>
                                                <td>'.$row["householdID"].'</td>
                                                <td>'.$row["bond"].'</td>
                                                <td>'.$row["rental"].'</td>
                                                <td>'.$row["electricity"].'</td>
                                                <td>'.$row["water"].'</td>
                                                <td>'.$row["food"].'</td>
                                                <td>'.$row["transport"].'</td>
                                                <td>'.$row["educationFee"].'</td>
                                                <td>'.$row["medicalexpense"].'</td>
                                                <td>'.$row["otherExpense"].'</td>
                                                <td>'.$row["monthlyIncome"].'</td>
                                                <td>'.$total.'</td>
                                                    
                                           </tr>';
                                          $subTotal =$total+$subTotal;

                                        }
                                        
                                        
                                    }

                                }
                                
                                $sql = "select * from tblhouseholdbudget where householdID='$id' ";
                                $check = mysqli_fetch_array(mysqli_query($con,$sql));
                                $result = array();
                               
                                if(isset($check))
                                {
                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0)
                                    {
                                        while($row = $result->fetch_assoc()) 
                                        {
                                            $total=$row["bond"]+$row["rental"]+$row["electricity"]+$row["water"]+$row["food"]+$row["transport"]+$row["educationFee"]+$row["medicalexpense"]+$row["otherExpense"];
                                            echo '<tr>
                                                <td>'.$row["householdID"].'</td>
                                                <td>'.$row["bond"].'</td>
                                                <td>'.$row["rental"].'</td>
                                                <td>'.$row["electricity"].'</td>
                                                <td>'.$row["water"].'</td>
                                                <td>'.$row["food"].'</td>
                                                <td>'.$row["transport"].'</td>
                                                <td>'.$row["educationFee"].'</td>
                                                <td>'.$row["medicalexpense"].'</td>
                                                <td>'.$row["otherExpense"].'</td>
                                                <td>'.$row["monthlyIncome"].'</td>
                                                <td>'.$total.'</td>
                                                    
                                           </tr>';
                                          $subTotal =$total+$subTotal;

                                        }
                                        
                                         echo '<tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><b>Household(s) Total R:</d></td>
                                                <td>'.$subTotal.'</td>
                                                    
                                           </tr>';

                                    }

                                }
                            ?>
                           
                              </table>
                             </center> 
                                    </div>
                                  </div>
                                
				
                                
                                <br>
                              
                                <div class="panel panel-info">
                                 <div class="panel-heading" > <h4 class="thin text-center">Contact details</h4></div>
                                    <div class="panel-body">
                                            <center>     
                              <table class="table table-bordered small ">
                            
                                <tr class="bg-light-gray">
                                 <td><b>Cell Number</b></td>
                                 <td><b>Home tell number</b></td>
                                <td><b>work tell Number</b></td>
                                <td><b>Email Address</b></td>

                            </tr>
                             <?php
                                require_once('./PHP/dbConnect.php');

                                $sql = "select * from tblcontact where id='$id'";
                                $check = mysqli_fetch_array(mysqli_query($con,$sql));
                                $result = array();
                                if(isset($check))
                                {
                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0)
                                    {
                                        while($row = $result->fetch_assoc()) 
                                        {
                                            echo '<tr>
                                                <td>'.$row["cellno"].'</td>
                                                <td>'.$row["hometellno"].'</td>
                                                <td>'.$row["worktellno"].'</td>
                                                <td>'.$row["email"].'</td>
                                               
                                           </tr>';

                                        }

                                    }

                                }
                            ?>
                           
                              </table>
                             </center>
                                    </div>
                                  </div>
                                
				<br>
                                 <div class="panel panel-info">
                                 <div class="panel-heading" > <h4 class="thin text-center">Residential Address</h4></div>
                                    <div class="panel-body">
                                                         <center>     
                              <table class="table table-bordered small ">
                            
                                <tr class="bg-light-gray">
                                 <td><b>Ward Number</b></td>
                                 <td><b>House number</b></td>
                                <td><b>Street Number</b></td>
                                <td><b>Suburb</b></td>
                                <td><b>City</b></td>
                                <td><b>Postal Code</b></td>
                                <td><b>P.Box Number</b></td>

                            </tr>
                             <?php
                                require_once('./PHP/dbConnect.php');

                                $sql = "select * from residentialaddress where id='$id'";
                                $check = mysqli_fetch_array(mysqli_query($con,$sql));
                                $result = array();
                                if(isset($check))
                                {
                                    $result = $con->query($sql);
                                    if ($result->num_rows > 0)
                                    {
                                        while($row = $result->fetch_assoc()) 
                                        {
                                            echo '<tr>
                                                <td>'.$row["wardno"].'</td>
                                                <td>'.$row["housenum"].'</td>
                                                <td>'.$row["streetno"].'</td>
                                                <td>'.$row["suburd"].'</td>
                                                <td>'.$row["city"].'</td>
                                                <td>'.$row["postalcode"].'</td>
                                                <td>'.$row["pob_num"].'</td>
                                                
                                           </tr>';

                                        }

                                    }

                                }
                            ?>
                           
                              </table>
                             </center>
                                    </div>
                                  </div>
                                
				<br>
                            <table>
                                
                               <tr>
                               
                               <td> <button type="submit" name="btnVerification"  id="btnVerification" class="btn btn-primary btn-lg active small">Send For verification</button></td>
                             
                              
                            </tr>
                               
                           </table>
                            </center>
                           
                             
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
