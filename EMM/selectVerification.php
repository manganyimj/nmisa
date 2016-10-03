<!DOCTYPE html>
<?php
session_start();
$indigentAppRaw1=array();
$indigentAppRaw2=array();
 /*if(isset($_SESSION["currUserID"]) && isset($_SESSION["role"]))
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
 }*/
    include './PHP/IndigentApplication.php';
    $id=  $_SESSION["viewId"];

    $fullName="";
    $refNo="";
    $userId="";
    require_once('./PHP/dbConnect.php');

    $sql = "select * from tblindigentapplication,tblaccount where tblindigentapplication.id=tblaccount.id AND tblindigentapplication.id='$id'";
    $check = mysqli_fetch_array(mysqli_query($con,$sql));
    $result = array();
    if(isset($check))
    {
        $result = $con->query($sql);
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc()) 
            {
              $fullName=$row["surname"]." ".$row["name"];
              $refNo=$row["reffNum"];
              $userId=$row["id"];
            }



        }

    }

 //echo 'ID '.$id;
if($_SERVER['REQUEST_METHOD']=='POST')
{
	
        if(isset($_POST["btnVerify"]))
        {
           if($refNo==$_POST["refNo"])
           {
                if(isset($_POST["correctIncorrect"]))
                {
                   include './PHP/DatabaseManager.php';
                   $comment=$_POST["comment"];
                   $status=$_POST["correctIncorrect"];

                   //$databaseManager=new DatabaseManager();

                   //$databaseManager->addVerification($id, $comment, $status);
                   
                   //=============================================================
                    require_once './PHP/dbConnect.php';
                    //include './dbConnect.php';

                     $sqlChecId = "SELECT * FROM tblverification WHERE id ='$id'";

                    $CheckId = mysqli_fetch_array(mysqli_query($con,$sqlChecId));

                     if(isset($CheckId))
                     {
                         //echo 'cell phone or email address used alredy exist';
                         $_SESSION["signInMssg"]="Your have verifyed application details of user ID:".$id;
                         header('location:FieldworkerFeedback.php');
                     }
                     else
                     {

                         $sql = "INSERT INTO tblverification(id,comment,status) VALUES('$id','$comment','$status')";
                         if(mysqli_query($con,$sql))
                         {
                              $verified="Verified";
                             $sql = "UPDATE tblapplicationstatus SET status ='$verified' WHERE applicantID ='$id'";

                             if ($con->query($sql)) 
                             {

                                 $role="Indigent Assessment Committee";
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
                                                 $message = "Applicant ID".$id." information have been verified, you can continue with application ";
                                                 $headers = 'From: EMM' . "\r\n" .
                                                                         'Reply-To: emm.co.za' . "\r\n" .
                                                                         'Hi' ;

                                                 mail($to, $subject, $message, $headers);
                                                 //==========================================================



                                             }


                                     }

                                 }

                                 $_SESSION["signInMssg"]="Verification successful...!!! ";
                                 header('location:FieldworkerFeedback.php');

                             } 


                         } 
                         else
                         {
                              $_SESSION["signInMssg"]="Sorry we are unable to submit your request now. Error: ".$con->error. mysql_error();
                              header('location:FieldworkerFeedback.php');
                         }
                     }
      
                   //=============================================================
                }
                else
                {
                   $_SESSION["signInMssg"]="Please indicate if the infomation is correct or incorrect by means of selecting the radio button...!!";
                   header('location:FieldworkerFeedback.php');
                }
           }
           else
           {
               
               $_SESSION["signInMssg"]="You have entered incorrect reference number for ".$fullName.", Please rectify...!! ";
                header('location:FieldworkerFeedback.php');
           }
           
        }
        else if(isset($_POST["delFile"]))
	{
           if($refNo==$_POST["refNo"])
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
           else
           {
               $_SESSION["signInMssg"]="You have entered incorrect reference number for ".$fullName.", Please rectify...!! ";
                header('location:FieldworkerFeedback.php');
           }
           
           	
	}
        else if(isset($_POST["updateLivingCon"]))
	{
           if($refNo==$_POST["refNo"])
           {
               $_SESSION["updateId"]=$userId;
               header('location:UpdateLivingCond.php');
           }
           else
           {
               $_SESSION["signInMssg"]="You have entered incorrect reference number for ".$fullName.", Please rectify...!! ";
                header('location:FieldworkerFeedback.php');
           }
           
           	
	}
        else if(isset($_POST["btnUpdatMember"]))
        {
           if($refNo==$_POST["refNo"])
           {
                if(isset($_POST["updateId"]))
                {

                   $_SESSION["selectedId"]=$_POST["updateId"];
                   header('location:UpdateHouseholdMember.php');
                  
                }
                else
                {
                    $_SESSION["householdMssg"]="please Select Row to update..!!";
                  

                }
               
           }
           else
           {
               $_SESSION["signInMssg"]="You have entered incorrect reference number for ".$fullName.", Please rectify...!! ";
                header('location:FieldworkerFeedback.php');
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

	<section id="register">
        <div class="container">
           
            <div class="row">
		
                <article class="col-xs-12 maincontent">
                <div class="panel panel-info">
                    <?php echo " <div class=panel-heading ><center> <h4 class=thin text-center>Applicant Name : $fullName</h4></center></div>";?>
		  
			  <div class="panel-body">
                            
                             
                            
                                 
                             <center> 
                                 
                                      
                                 <br>
                              
                                <div class="panel panel-info">
                                 <div class="panel-heading" > <h4 class="thin text-center">House Hold Member(s)</h4></div>
                                    <div class="panel-body">
                               <center>   
                                     <?php

                                        if(isset($_SESSION["householdMssg1"]))
                                        {
                                            echo "<center><P style=color:orange>".$_SESSION["householdMssg1"]."</p></center>";
                                        }

                                       ?>
                                <form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST" onsubmit="return validateForm()">
                                 <table class="table table-bordered small ">
                            
                                <tr class="bg-light-gray">
                                 <td><b>ID Number</b></td>
                                 <td><b>Indigent Type</b></td>
                                <td><b>Surname</b></td>
                                <td><b>Initials</b></td>
                                <td><b>Date Of Birth</b></td>
                                <td><b>Application Status</b></td>
                                <td><b>Employer</b></td>
                                <td><b>Education</b></td>
                                <td><b>Disability</b></td>
                                <td><b>Disability Desc</b></td>
                                <td><b>Select</b></td>

                            </tr>
                             <?php
                                require_once('./PHP/dbConnect.php');

                                $sql = "select * from householdmember where addedByID = $id";
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
                                                <td><input type="radio" name="updateId" id="updateId" value="'.$row["id"].'"></a></td>
                                           </tr>';

                                        }

                                    }

                                }
                            ?>
                           
                           </table>
                             
                              <div class="panel panel-info">
				<div class="panel-heading" > <h4><center><b>Update household member</b></center></h4></div>
                                <div class="panel-body">
                                <table class="table table-bordered">
				
                                    <tr>
                               
                                <td><input type="text" class="form-control" id="refNo" required name="refNo" onkeyup="validateDesc()" placeholder="Ref Number" ></td>
                             <td>
                                 <center>
                                  <button type="submit"  id="btnUpdatMember"  class="btn btn-success" name="btnUpdatMember">Update</button>
                                </center>
                              </td>
                              </tr>
                             
                                </div>
                                 </div>
                              </table>
                             </form>
                             </center> 
                                    </div>
                                  </div>
                                 
                                 
                                 <br>
                                 
                                 <form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST" onsubmit="return validateForm()">
				<div class="panel panel-info">
				  <div class="panel-heading" > <center><b>DOCUMENT(S)</b></center></h1></div>
					<div class="panel-body">
                                               <?php

                                                    if(isset($_SESSION["fileMssg1"]))
                                                    {
                                                        echo "<center><P style=color:orange>".$_SESSION["fileMssg1"]."</p></center>";
                                                    }

                                                ?>
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
                                                    <td>
                                                     <center>
                                                    
                                                  
                                                    <input type="text"  id="refNo" required name="refNo" onkeyup="validateDesc()" placeholder="Ref Number" >
                                                      <button type="submit" name="delFile"  id="delFile" >Delete</button>
                                                    </center>
                                                    </td>
                                                </tr>
						</table>
                                            </form>
                                            
                                <form action="PHP/AddMissingFiles.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                                   <?php 
                                    echo " <input type=hidden class=form-control id=userUefNo   name=userUefNo value= '$refNo'>";
                                    echo " <input type=hidden class=form-control id=fullName   name=fullName value= '$fullName'>";
                                   
                                   ?>
                                  
				
                                <div class="panel panel-info">
				<div class="panel-heading" ><h4> <center><b>Add Missing Document(s)</b></center></h4></div>
                                <div class="panel-body">
                              
				<table class="table table-bordered">
						
				<tr>
				<td>
                                    <input type="text" class="form-control" id="refNo" required name="refNo" onkeyup="validateDesc()" placeholder="Ref Number" >
				</td>
				<td>
                                    <input type="text" class="form-control" id="description" required name="description" onkeyup="validateDesc()" placeholder="Description" >
				</td>
				<td>
				<input type="file" class="form-control" id="file" name="file"  >
				
				</td>
				<td>
				<button type="submit" name="btnAddFile" id="btnAddFile" class="btn btn-success">Add File</button>
				
				</td>
				<tr>
				</table>
                                </div>
                                </div>
                               </form>
                                                
						
						
					</div>
				</div>
                                 <br>
                              
                              
                               
                                <div class="panel panel-info">
                                 <div class="panel-heading" > <h4 class="thin text-center">Living Condition</h4></div>
                                    <div class="panel-body">
                                       <center>  
                                           
                                            <?php

                                                    if(isset($_SESSION["updateLivingConMss1"]))
                                                    {
                                                        echo "<center><P style=color:orange>".$_SESSION["updateLivingConMss"]."</p></center>";
                                                    }

                                                ?>
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
                               
                                           
                              <form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST" onsubmit="return validateForm()">
                              <div class="panel panel-info">
				<div class="panel-heading" > <h4><center><b>Update Living Condition</b></center></h4></div>
                                <div class="panel-body">
                                <table class="table table-bordered">
				
                                    <tr>
                               
                                <td><input type="text" class="form-control" id="refNo" required name="refNo" onkeyup="validateDesc()" placeholder="Ref Number" ></td>
                             <td>
                                 <center>
                                  <button type="submit"  id="updateLivingCon"  class="btn btn-success" name="updateLivingCon">Update</button>
                                </center>
                              </td>
                              </tr>
                             
                                </div>
                                 </div>
                              </table>
                             </form>
                             </center> 
                                    </div>
                                  </div>
                                 
				<br>
                              
                              
                              
                              
                              
                               
                               
                             
                             </center> 
                                    </div>
                                  </div>
                            <form name="form3" action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST" onsubmit="return validateForm()">
                             <div class="panel panel-info">
                               <div class="panel-body">
                             <center> 
                                 <h4>Verify Above Information</h4>
                             <table class="table table-bordered  ">
                                   
                                  <tr>
                                      <center> 
                                          <td  bgcolor="#ADFF2F"> <center> <input type="radio" name="correctIncorrect" id="correctIncorrect" value="Correct">Correct<br><input type="radio" name="correctIncorrect" id="correctIncorrect" value="inCorrect">Incorrect<br>
                                              <textarea class="form-control" placeholder="Enter Comment *" id="comment" name="comment" required data-validation-required-message="Please enter a comment."></textarea>
                                          </center> </td>
                                       </center> 
                                  </tr>
                                  
                                  
                                    <tr>
                               
                                <td><input type="text" class="form-control" id="refNo" required name="refNo" onkeyup="validateDesc()" placeholder="Ref Number" ></td>
                           
                              </tr>
                              
                              <tr>
                               
                                 <td>
                                 <center>
                                  <button type="submit"  id="btnVerify"  class="btn btn-success" name="btnVerify">Submit</button>
                                </center>
                                 </td>
                              </tr>
                             
                                </div>
                                 </div>
                              </table>
                                  
                                   
                           
                              </center> 
                             </div>
                             </div>
                            </form>
				<br>
                          
                            </center>
                           
                             
                         </div>
                </div>
                </article>
                
               
            </div>
        </div>
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
                <div class="col-lg-12 text-center">
                    <h1 class="section-heading">Contact Us</h1>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
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
