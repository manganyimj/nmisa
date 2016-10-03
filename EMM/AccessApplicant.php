<!DOCTYPE html>
<?php
session_start();
$indigentAppRaw1=array();
$indigentAppRaw2=array();
 if(isset($_SESSION["currUserID"]) && isset($_SESSION["role"]))
 {
     
    $currUserID=$_SESSION["currUserID"];
    $role=$_SESSION["role"];
   
    if(!$role=='Indigent Assessment Committee')
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
	
        if(isset($_POST["btnAssess"]))
        {
           
            $status=$_POST["status"];
            $monSalary=$_POST["monSalary"];
            
            $subTotal=$_POST["subTotal"];
            $monTotal=$_POST["monTotal"];
           
            $approved="D";
            $message="";
            if($status=='Correct' && $monSalary<=2740)
            {
                $approved="A";
               
                 $message="Base on total monthly salary of R$monSalary which is less or equall to R2740, you for 50% discount";
                
            }
            else  if($subTotal>$monTotal)
            {
                 $approved="A";
                 $message="Total household budget is greater than monthly salary, as a result you qualify for 50% discount";  
                                      
            }
            else
            {
                if($status=='Incorrect')
                {
                    $message="We appologise to let you know that your EMM application for electricity and water tax discount of  50% is unsuccessful";
                }
              
                else
                {
                    $message="Base on total monthly salary of R$monSalary which is greater than R2740, you do not  qualify for 50% discount  ";  
                                   
                }
               
            }
            require_once('./PHP/dbConnect.php');
            $sql = "UPDATE tblapplicationstatus SET status ='$approved' WHERE applicantID ='$id'";
            
            if ($con->query($sql) === TRUE) 
            {
               
                
                include './PHP/DatabaseManager.php';
               
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
                            //$message = 'Contradulation...!!, your application has been processed by our cleck, One of our fieldwork will come and verify the information you provided.';
                            $compEmail='reminder@emm.com';
                            $headers = 'From:  '. $compEmail . "\r\n" .
                                                   
                                                    'Dear Applicant' ;

                            mail($to, $subject, $message, $headers);
                           //==========================================================

                        }

                    }

                }
                
                 $_SESSION["signInMssg"]="Application have been assess,Note the status for this applicant is ".$approved." Note:A=Approved, D=Disapproved";
                 header('location:AssessmentComFeedback.php');
                 
                //=====================Adding message=========================
                $sql = "INSERT INTO tblmessage(id,mssg) VALUES('$id','$message')";
                mysqli_query($con,$sql);
                //=============================================================
                        
                 
               
               
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
		   <div class="panel-heading" > <h4 class="thin text-center">Assess Applicant</h4></div>
			  <div class="panel-body">
                            
                             
                             <center> 
                                <div class="panel panel-info">
                                 <div class="panel-heading" > <h4 class="thin text-center">Fieldworker Findings</h4></div>
                                    <div class="panel-body">
                                       
                                        <center>
                                             <?php
                                                   $comment="All application information is correct";
                                                   $status="Correct";
                                                   $color="#FF5252";
                                                  
                                                  //=============================================================================================
                                                   require_once('./PHP/dbConnect.php');

                                                    $sql = "select * from tblverification where id='$id'";
                                                    $check = mysqli_fetch_array(mysqli_query($con,$sql));
                                                    $result = array();
                                                    if(isset($check))
                                                    {
                                                        $result = $con->query($sql);
                                                        if ($result->num_rows > 0)
                                                        {
                                                            while($row = $result->fetch_assoc()) 
                                                            {
                                                                $status=$row["status"];
                                                                $comment=$row["comment"];

                                                            }

                                                        }

                                                    }
                                                  //=============================================================================================
                                                   if($status=="Correct")
                                                   {
                                                        $color="#ADFF2F";
                                                   }
                                                  
                                                   echo ' <table class="table table-bordered ">
                                                            <tr>
                                                                <td bgcolor="'.$color.'"><b>STATUS :</b></td>
                                                                <td bgcolor="'.$color.'">'.$status.'</td>
                                                            </tr>

                                                        </table>';
                                                   echo '<div class="panel panel-info">';
                                                   echo "<center><P style=color:orange>".$comment."</p></center>";
                                                   echo '</div>';
                                                   
                                                   echo '<input type="hidden" class="form-control" id="status" name="status" value='.$status.' > ';
                                               
                                               ?>
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

                                //$sql = "select * from householdmember,tblhouseholdbudget where householdmember.addedByID='$id' AND householdmember.id=tblhouseholdbudget.householdID OR tblhouseholdbudget.householdID='$id'";
                                $sql = "select * from householdmember,tblhouseholdbudget where householdmember.addedByID='$id' AND householdmember.id=tblhouseholdbudget.householdID ";
                               
                                $check = mysqli_fetch_array(mysqli_query($con,$sql));
                                $result = array();
                                $subTotal=0;
                                $monTotal=0;
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
                                          $monTotal +=$row["monthlyIncome"];

                                        }
                                        
                                        
                                        

                                    }

                                }
                                
                                $sql = "select * from tblhouseholdbudget where householdID='$id'";
                               
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
                                          $monTotal +=$row["monthlyIncome"];

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
                                                <td><b>Household(s) Budget Total R:</d></td>
                                                <td>'.$subTotal.'</td>
                                                    
                                           </tr>';
                                         
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
                                                <td><b>Monthly Salary Total R:</d></td>
                                                <td>'.$monTotal.'</td>
                                                    
                                           </tr>';
                                          
                                           echo '<input type="hidden" class="form-control" id="monSalary" name="monSalary" value='.$monTotal.' > ';
                                           echo '<input type="hidden" class="form-control" id="subTotal" name="subTotal" value='.$subTotal.' > ';
                                           
                                    }

                                }
                                
                              
                               
                            ?>
                           
                              </table>
                             </center> 
                                        
                                         
                            <?php
                            
                               $theMssg="";
                               if($monTotal<=2740)
                               {
                                 $theMssg="Base on total monthly salary of R$monTotal which is less or equall to R2740, this applicant qualifies for electricity and water tax discount of  50%";  
                               
                                 echo '<div class="panel panel-info">';
                                 echo "<center><P style=color:green>".$theMssg."</p></center>";
                                 echo '</div>';
                               }
                               else
                               {
                                   if($subTotal>$monTotal)
                                   {
                                        $theMssg="Total household budget is greater than monthly salary, as a result this applicant qualify for 50% discount";  
                                        echo '<div class="panel panel-info">';
                                        echo "<center><P style=color:green>".$theMssg."</p></center>";
                                        echo '</div>';  
                                   }
                                   else
                                   {
                                        $theMssg="Base on total monthly salary of R$monTotal which is greater than R2740, this applicant does not  qualify for 50% discount";  
                                        echo '<div class="panel panel-info">';
                                        echo "<center><P style=color:red>".$theMssg."</p></center>";
                                        echo '</div>';
                                   }
                               }
                            ?>
                           
                                    </div>
                                  </div>
                                
			
                               
                                
				<br>
                            <table>
                                
                               <tr>
                               
                               <td> <button type="submit" name="btnAssess"  id="btnAssess" class="btn btn-primary btn-lg active small">Submit</button></td>
                             
                              
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
