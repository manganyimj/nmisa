<?php

session_start();

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatabaseManager
 *
 * @author csibiya
 */
class DatabaseManager 
{
    
    function UpdateApplicationInfo($id,$title,$surname,$name,$gander,$mStatus,$appType) 
    {
         require_once 'dbConnect.php';
        
        $sql = "UPDATE tblindigentapplication SET title ='$title', surname = '$surname',name='$name' ,gander='$gander',maritalstatus='$mStatus',"
                    . "applicationtype='$appType'"
                    . "WHERE id ='$id'";
        if($con->query($sql))
        {
            $_SESSION["updateMssg"]="Your application information have been  updated...!!";
            header('location:updateFeedback.php');
        }
        else
        {
           $_SESSION["updateMssg"]="We can't update your info now, please try again in 5 minutes :".$con->error;
           header('location:updateFeedback.php');
           //echo 'Id in false:'.$id;
        }
    }
    function updateLogin($id,$pass) 
    {
        require_once 'dbConnect.php';
        
        
        $password=password_hash($pass, PASSWORD_DEFAULT);
        // $password=$pass;
        
        $sql="UPDATE tbllogin SET password='$password'  Where id='$id'";
        if($con->query($sql))
        {
            //$_SESSION["signInMssg"]="Your login details have been update...!!";
            
            
            //===========================Current User======================================
           
            $sql= "SELECT * FROM tbllogin where id='$id'";
            $fullname="";
            $check = mysqli_fetch_array(mysqli_query($con,$sql));
            $isRegistered=false;
            $result = array();
            if(isset($check))
            {
                    $result = $con->query($sql);

                    if ($result->num_rows > 0)
                    {


                        while($row = $result->fetch_assoc()) 
                        {
                          
                           $_SESSION["currUserID"]=$row["id"];
                           $_SESSION["role"]=$row["role"];
                           $_SESSION["username"]=$row["username"];
                           $_SESSION["password"]=$row["password"];
                           $_SESSION["role"]=$row["role"];
                           $_SESSION["status"]=$row["status"];

                        }



                    }

            }

         //=============================================================================
           
            if($_SESSION["role"]=='Admin')
            {
               $_SESSION["password"]=$password;
               header('location:AdminLogin.php');

            }
            else if($_SESSION["role"]=='Indigent Clerk')
            {
               $_SESSION["password"]=$password;
               header('location:CleckLogin.php');
            }
            else if($_SESSION["role"]=='Indigent Field Worker')
            {
               $_SESSION["password"]=$password;
               header('location:fieldworkerLogin.php');
            }
            else if($_SESSION["role"]=='Indigent Finance Clerk')
            {
                echo 'Ind fin Cleck';
            }
            else if($_SESSION["role"]=='Indigent Assessment Committee')
            {
               $_SESSION["password"]=$password;
               header('location:AssessmentCommitteeLogin.php');
            }
            else if($_SESSION["role"]=='Applicant')
            {
               $_SESSION["password"]=$password;
               header('location:ApplicantLogin.php');


            }

        }
        else
        {
           $_SESSION["signInMssg"]="We can't update login details now, please try again in 5 minutes".$con->error;
           header('location:feedback.php');
           //echo 'Id in false:'.$id;
        }
       
    }
    

    
    function updateLivingCondition($updateId,$ownerType,$typeOfHouse,$insideRoom,$outsideRoom,$cooking,$radio,$lights,$heaters,$tv,$vaccuming,$geyser,$washingMachine) 
    {
        require_once 'dbConnect.php';
        
        $sql = "UPDATE tbllivingcondition SET ownerType ='$ownerType', typeOfHouse = '$typeOfHouse',insideRoom='$insideRoom' ,outsideRoom='$outsideRoom',cooking='$cooking',"
                    . "radio='$radio',lights='$lights',heaters='$heaters',tv='$tv',vaccuming='$vaccuming',geyser='$geyser',washingMachine='$washingMachine'"
                    . "WHERE id ='$updateId'";
        if($con->query($sql))
        {
            $_SESSION["updateLivingConMss"]="Living condition information successfully updated...!!";
            header('location:SelectVerification.php');
        }
        else
        {
           $_SESSION["signInMssg"]="We can't update living condition details now, please try again in 5 minutes :".$con->error;
           header('location:feedback.php');
           //echo 'Id in false:'.$id;
        }
       
    }
    
        
    function updateLivingCondition2($updateId,$ownerType,$typeOfHouse,$insideRoom,$outsideRoom,$cooking,$radio,$lights,$heaters,$tv,$vaccuming,$geyser,$washingMachine) 
    {
        require_once 'dbConnect.php';
        
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
       
    }
    function addAcknowledgement($id,$mssg) 
    {
       require_once 'dbConnect.php';
       $sql = "INSERT INTO acknowledgement(id,mssg) VALUES('$id','$mssg')";
       mysqli_query($con,$sql); 
       
      
       
      
    }
    function checklogin($email, $id)
    {
        require_once ('dbConnect.php');
        //$email=password_hash($email, PASSWORD_DEFAULT);
      
        $sql= "SELECT * FROM contacts WHERE user_id='$id' AND email='$email'";

        $check = mysqli_fetch_array(mysqli_query($con,$sql));
        $isValid=false;
        $result = array();
        if(isset($check))
        {
             $isValid=true;
        }
        
        if($isValid==false)
        {
          
           
            $sql= "SELECT * FROM tblemp WHERE empId='$id' AND email='$email'";

            $check = mysqli_fetch_array(mysqli_query($con,$sql));
            $isValid=false;
            $result = array();
            if(isset($check))
            {
                 $isValid=true;
            }
            
            if($isValid==false)
            {
                 $_SESSION["signInMssg"]="No login details found for user ID/Emp Num :".$id." And Email Address :".$email;
                 header('location:feedback.php');
            }
            else
            {
               $_SESSION["resetID"]=$id;
               $_SESSION["email"]=$email;
               header('location:resetPassword.php');
            }

        }
        else
        {
           $_SESSION["resetID"]=$id;
           $_SESSION["email"]=$email;
           header('location:resetPassword.php');
        }
    }
    
    function addMssg($id,$mssg) 
    {
       require_once 'dbConnect.php';
       $sql = "INSERT INTO tblmessage(id,mssg) VALUES('$id','$mssg')";
       mysqli_query($con,$sql);
       
       echo 'Mssg :'.$con->error;
    }
    
    function addVerification($id,$comment,$status) 
    {
       require_once 'dbConnect.php';
       //include './dbConnect.php';
       
        $sqlChecId = "SELECT * FROM tblVerification WHERE id ='$id'";
			
       $CheckId = mysqli_fetch_array(mysqli_query($con,$sqlChecId));
       		
	if(isset($CheckId))
	{
            //echo 'cell phone or email address used alredy exist';
	    $_SESSION["signInMssg"]="Your have verifyed application details of user ID:".$id;
            header('location:feedback.php');
	}
        else
        {
           
            $sql = "INSERT INTO tblVerification(id,comment,status) VALUES('$id','$comment','$status')";
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
                    header('location:feedback.php');
                    
		} 
		
                
            } 
            else
            {
                 $_SESSION["signInMssg"]="Sorry we are unable to submit your request now. Error: ".$con->error. mysql_error();
                 header('location:feedback.php');
            }
        }
      
       
      
    }
    
    function login($username,$password) 
    {
        //session_destroy();
        require_once ('dbConnect.php');
        
      
        
        if(isset($_SESSION["attemptUsername"]))
        {
            if($_SESSION["attemptUsername"]==$username)
            {
                if(isset($_SESSION["attempt"]))
                {
                    $_SESSION["attempt"]=$_SESSION["attempt"]+1;
                }
                else
                {
                    $_SESSION["attempt"]=1;
                }
            }
            else
            {
                $_SESSION["attemptUsername"]=$username; 
                $_SESSION["attempt"]=1;
            }
        }
        else
        {
            $_SESSION["attemptUsername"]=$username; 
        }
        $sql= "SELECT * FROM tbllogin";

        $check = mysqli_fetch_array(mysqli_query($con,$sql));
        $isValid=false;
        $result = array();
        $blocked=false;
        $theID="";
        $id="";
        if(isset($check))
        {
                $result = $con->query($sql);

                if ($result->num_rows > 0)
                {


                    while($row = $result->fetch_assoc()) 
                    {
                         if( password_verify($username, $row["username"]))
                         //if($username==$row["username"])
                         {
                             $theID= $row["id"];
                         }
                         if(password_verify($username, $row["username"]) && password_verify($password, $row["password"]) && $row["status"]=="Active" )
                         //if($username==$row["username"] && $password== $row["password"] && $row["status"]=="Active")
                         {
                            $isValid=true;
                            $changePass=false;
                            $email="";
                            //======================Geting Cotact=====================
                            $id=$row["id"];
                            $sql = "select * from tblemp where empId = '$id' ";

                            $check = mysqli_fetch_array(mysqli_query($con,$sql));
                            $result = array();
                            if(isset($check))
                            {
                                    $result = $con->query($sql);

                                    if ($result->num_rows > 0)
                                    {
                                           

                                            while($row1 = $result->fetch_assoc()) 
                                            {
                                                $phone=$row1["phone"];
                                                $email=$row1["email"];
                                                $id=$row1["empId"];
                                                if(password_verify($phone, $row["password"]))
                                                //if($phone==$row["password"])
                                                {
                                                    $changePass=true;
                                                }

                                            }

                                           
                                    }
                                    
                                    //echo 'Change:'.$changePass;
                                   				
                            }
                           
                            //===========================================================
                            
                            if(!$changePass)
                            {
                                   //======================Geting Cotact=====================
                                    $id=$row["id"];
                                    $sql= "SELECT * FROM tblcontact Where id=$id";

                                    $check = mysqli_fetch_array(mysqli_query($con,$sql));
                                    $result = array();
                                    if(isset($check))
                                    {
                                            $result = $con->query($sql);

                                            if ($result->num_rows > 0)
                                            {


                                                    while($row1 = $result->fetch_assoc()) 
                                                    {
                                                        $phone=$row1["cellno"];
                                                        $email=$row1["email"];
                                                        $id=$row1["id"];
                                                        if(password_verify($phone, $row["password"]))
                                                        //if($phone==$row["password"])
                                                        {
                                                            $changePass=true;
                                                        }

                                                    }


                                            }

                                            //echo 'Change:'.$changePass;

                                    }

                                    //===========================================================
                                
                            }
                            
                            
                            
                            if($changePass==false)
                            {
                            
                                if($row["role"]=='Admin')
                                {
                                    $_SESSION["currUserID"]=$row["id"];
                                   $_SESSION["role"]=$row["role"];
                                   $_SESSION["username"]=$row["username"];
                                   $_SESSION["password"]=$row["password"];
                                   $_SESSION["role"]=$row["role"];
                                   $_SESSION["status"]=$row["status"];
                                   header('location:AdminLogin.php');

                                }
                                else if($row["role"]=='Indigent Clerk')
                                {
                                   $_SESSION["currUserID"]=$row["id"];
                                   $_SESSION["role"]=$row["role"];
                                   $_SESSION["username"]=$row["username"];
                                   $_SESSION["password"]=$row["password"];
                                   $_SESSION["role"]=$row["role"];
                                   $_SESSION["status"]=$row["status"];
                                   header('location:CleckLogin.php');
                                }
                                else if($row["role"]=='Indigent Field Worker')
                                {
                                    $_SESSION["currUserID"]=$row["id"];
                                   $_SESSION["role"]=$row["role"];
                                   $_SESSION["username"]=$row["username"];
                                   $_SESSION["password"]=$row["password"];
                                   $_SESSION["role"]=$row["role"];
                                   $_SESSION["status"]=$row["status"];
                                   header('location:fieldworkerLogin.php');
                                }
                                else if($row["role"]=='Indigent Finance Clerk')
                                {
                                    echo 'Ind fin Cleck';
                                }
                                else if($row["role"]=='Indigent Assessment Committee')
                                {
                                   $_SESSION["currUserID"]=$row["id"];
                                   $_SESSION["role"]=$row["role"];
                                   $_SESSION["username"]=$row["username"];
                                   $_SESSION["password"]=$row["password"];
                                   $_SESSION["role"]=$row["role"];
                                   $_SESSION["status"]=$row["status"];
                                   header('location:AssessmentCommitteeLogin.php');
                                }
                                else if($row["role"]=='Applicant')
                                {
                                   $_SESSION["currUserID"]=$row["id"];
                                   $_SESSION["role"]=$row["role"];
                                   $_SESSION["username"]=$row["username"];
                                   $_SESSION["password"]=$row["password"];
                                   $_SESSION["role"]=$row["role"];
                                   $_SESSION["status"]=$row["status"];
                                   header('location:ApplicantLogin.php');


                                }
                            }
                            else
                            {
                                $_SESSION["resetID"]=$id;
                                $_SESSION["email"]=$email;
                                
                                header('location:resetPassword.php');
                            }
                             
                         }
                         else if(password_verify($username, $row["username"]) && password_verify($password, $row["password"]) && $row["status"]=="Blocked" )
                         //else if($username==$row["username"] && $password==$row["password"] && $row["status"]=="Blocked")
                         {
                            $blocked=true;  
                         }
                         else  if(password_verify($username, $row["username"]) && $row["status"]=="Blocked" )
                         //else if($username==$row["username"] && $row["status"]=="Blocked")
                         {
                             $blocked=true;  
                         }
                         

                    }
                    
                    if($isValid==false)
                    {
                       if($blocked)
                       {
                            $_SESSION["loginMssg"]="Your login account has been blocked, please contact your administrator ";
                       }
                       else
                       {
                            if(isset($_SESSION["attempt"]))
                            {
                                if($_SESSION["attempt"]==3)
                                {
                                     //===================Blocking user=============================
                                     $sql="UPDATE tbllogin SET status='Blocked'  Where id='$theID'";
                                     //$con->query($sql);
                                     if( $con->query($sql))
                                     {
                                          $_SESSION["loginMssg"]="Your login account has been blocked, please contact your administrator";
                                    
                                           session_destroy();
                                     }
                                     else
                                     {
                                          $_SESSION["loginMssg"]="Error :".$con->error;
                                     }
                                     //=============================================================
                                    


                                }
                                else
                                {
                                     $_SESSION["loginMssg"]="Invalid Login details please rectify ";
                                }
                            }
                            else
                            { 
                                $_SESSION["loginMssg"]="Invalid Login details please rectify ";

                            }

                         
                    }
                    
                }


                }

        }
    }
     function addEmp(Employee $emp,$role) 
    {
        $name=$emp->getName();
        $surname=$emp->getSurname();
        $gander=$emp->getGander();
        $phone=$emp->getPhone();
        $email=$emp->getEmail(); 
        $username=password_hash($email, PASSWORD_DEFAULT);
        $password=password_hash($phone, PASSWORD_DEFAULT);
        //
        //$username=$email;
        //$password=$phone;
        
       //$password=password_hash('admin12345', PASSWORD_DEFAULT);
        
        //===============Generate employee number=================
           $time=strtoupper(substr(md5(time()),0,4));
           $rondom= rand (  100 ,  999 );
           $str=strtoupper (substr($name,0,2));
           $empNum=$rondom.$str.$time;
        //========================================================
       require_once ('dbConnect.php');
       $sql = "INSERT INTO tblemp(empId,name,surname,gander,phone,email) VALUES('$empNum','$name','$surname','$gander','$phone','$email')";
       $loginSql = "INSERT INTO tbllogin(id,username,password,role,status) VALUES('$empNum','$username','$password','$role','Active')";
       
        
       $sqlCheckId = "SELECT * FROM tblemp WHERE staffNum ='$staffNum'";
        
       $sqlCheckEmail = "SELECT * FROM tblemp WHERE email ='$email'";
			
       $CheckId = mysqli_fetch_array(mysqli_query($con,$sqlCheckId));
       $CheckEmail = mysqli_fetch_array(mysqli_query($con,$sqlCheckEmail));
			
	if(isset($CheckId))
	{
            //echo 'cell phone or email address used alredy exist';
	    $_SESSION["addEmpMssg"]="User id  allready registered, Please try to submit again...!!";
            header('location:AddEmp.php');
	}
        else if(isset($CheckEmail))
        {
            
           $_SESSION["addEmpMssg"]="Email address allready exist in our database please provide different email address";
           header('location:AddEmp.php');
           
        }
        else
        {
        
             if(mysqli_query($con,$sql))
             {
                if(mysqli_query($con,$loginSql))
                {
                    //===============Send Email=================================
                    $to = $email;
                    $subject ="EMM";
                    $message = "Your EMM account has been created Note your Employee number is".$empNum.", Username is ".$email." and password is ".$password;

                    $headers = 'From: My Lecture Admin' . "\r\n" .
                                            'Reply-To: mylecture.co.za' . "\r\n" .
                                            'Hi' ;

                    mail($to, $subject, $message, $headers);
                    //==========================================================
                    $_SESSION["addEmpMssg"]= "Employee Successully Added. ";
                  
                    header('location:AddEmp.php');
                }
                else
                {
                    
                    $_SESSION["addEmpMssg"]= "Failed to add login details. Try Again in 5 minutes".  mysqli_error($con);

                    header('location:AddEmp.php');
                }

             
             }
             else
             {
                 
                  $_SESSION["addEmpMssg"]= "Failed to add Employee details. Try again in 5 minutes".  mysqli_error($con);

                    header('location:AddEmp.php');
             }
        }
        
    }
    function addStatus($id)
    {
        require_once 'dbConnect.php';
        $sql = "INSERT INTO tblapplicationstatus(id) VALUES('$id')";

        if(mysqli_query($con,$sql))
        {

            $_SESSION["signInMssg"]="You application is successfully submite, an email will be sent to you regarding your application...!!";
            
            header('location:../feedback.php');
        }
        else
        {
            
            echo ''.$_SESSION["signInMssg"]="Error adding status :".$con->error;
           // header('location:../supportingDoc.php');  
        }
       
        
    }
    function addLivingCondition($id,$ownerType,$typeOfHouse,$insideRoom,$outsideRoom,$cooking,$radio,$lights,$heaters,$tv,$vaccuming,$geyser,$washingMachine) 
    {
        require_once('dbConnect.php');
        $sqlCheckId = "SELECT * FROM tbllivingcondition WHERE id ='$id'";
        
       		
        $CheckId = mysqli_fetch_array(mysqli_query($con,$sqlCheckId));
       		
	if(isset($CheckId))
	{
            $sql = "UPDATE tbllivingcondition SET ownerType ='$ownerType', typeOfHouse = '$typeOfHouse',insideRoom='$insideRoom' ,outsideRoom='$outsideRoom',cooking='$cooking',"
                    . "radio='$radio',lights='$lights',heaters='$heaters',tv='$tv',vaccuming='$vaccuming',geyser='$geyser',washingMachine='$washingMachine'"
                    . "WHERE id ='$id'";
		 
            if ($con->query($sql) === TRUE) 
            {

                $_SESSION["fileMssg"]="Living condition information Successfully Updated...!!";
                header('location:supportingDoc.php'); 
            } 
            else
            {
                
                $_SESSION["fileMssg"]="Error Living condition information not updated: " . $con->error;
                header('location:supportingDoc.php');

            }
        }
        else
        {
            $sql = "INSERT INTO tbllivingcondition(id,ownerType,typeOfHouse,insideRoom,outsideRoom,cooking,radio,lights,heaters,tv,vaccuming,geyser,washingMachine	)"
                     . " VALUES('$id','$ownerType','$typeOfHouse','$insideRoom','$outsideRoom','$cooking','$radio','$lights','$heaters','$tv','$vaccuming','$geyser','$washingMachine')";

            if(mysqli_query($con,$sql))
            {

                $_SESSION["fileMssg"]="Living condition inftonation Successfully added...!!";
                header('location:supportingDoc.php');
            }
            else
            {
               $_SESSION["fileMssg"]="Error, Living condition  not updated: " . $con->error;
               header('location:supportingDoc.php'); 

            }
        }
        
    }
      function updateHouseholdBudget2(HouseholdBurdget $householdbudget,$householdID)
    {
        require_once('dbConnect.php');
        $bondPayment=$householdbudget->getBondPayment();
        $rental=$householdbudget->getRental();
        $electricity=$householdbudget->getElectricity();
        $water=$householdbudget->getWater();
        $food=$householdbudget->getFood();
        $transport=$householdbudget->getTransport();
        $education=$householdbudget->getEducation();
        $medicalExpense=$householdbudget->getMedicalExpense();
        $otherExpenses=$householdbudget->getOtherExpenses(); 
        $monIncome=$householdbudget->getMonIncome();
        //echo 'Transport :'.$transport;
        $sqlCheckId = "SELECT * FROM tblhouseholdbudget WHERE householdID ='$householdID'";
        
       		
        $CheckId = mysqli_fetch_array(mysqli_query($con,$sqlCheckId));
       		
	if(isset($CheckId))
	{
            $sql = "UPDATE tblhouseholdbudget SET bond ='$bondPayment', rental = '$rental',electricity='$electricity' ,water='$water',food='$food',"
                    . "transport='$transport',educationFee='$education',medicalexpense='$medicalExpense',otherExpense='$otherExpenses',monthlyIncome='$monIncome'"
                    . "WHERE householdID ='$householdID'";
		 
            if ($con->query($sql) === TRUE) 
            {

                $_SESSION["budgetMssg2"]="Budget Successfully Updated...!!";
                header('location:MyHouseholdBudgetInfo.php'); 
            } 
            else
            {
                $_SESSION["budgetMssg2"]="Error household member not updated: " . $con->error;
                header('location:MyHouseholdBudgetInfo.php');

            }
            
	}
        else 
        {
            $sql = "INSERT INTO tblhouseholdbudget(householdID,bond,rental,electricity,water,food,transport,educationFee,medicalexpense,otherExpense,monthlyIncome)"
                 . " VALUES('$householdID','$bondPayment','$rental','$electricity','$water','$food','$transport','$education','$medicalExpense','$otherExpenses','$monIncome')";
        
            if(mysqli_query($con,$sql))
            {

                $_SESSION["budgetMssg2"]="Budget Successfully added...!!";
                header('location:MyHouseholdBudgetInfo.php');
            }
            else
            {
               $_SESSION["budgetMssg2"]="Error, household member not updated: " . $con->error;
               header('location:MyHouseholdBudgetInfo.php'); 

            }
           
        }
        
      
        
        
    }
    function updateHouseholdBudget(HouseholdBurdget $householdbudget,$householdID)
    {
        require_once('dbConnect.php');
        $bondPayment=$householdbudget->getBondPayment();
        $rental=$householdbudget->getRental();
        $electricity=$householdbudget->getElectricity();
        $water=$householdbudget->getWater();
        $food=$householdbudget->getFood();
        $transport=$householdbudget->getTransport();
        $education=$householdbudget->getEducation();
        $medicalExpense=$householdbudget->getMedicalExpense();
        $otherExpenses=$householdbudget->getOtherExpenses(); 
        $monIncome=$householdbudget->getMonIncome();
        //echo 'Transport :'.$transport;

        $sqlCheckId = "SELECT * FROM tblhouseholdbudget WHERE householdID ='$householdID'";
        
       		
        $CheckId = mysqli_fetch_array(mysqli_query($con,$sqlCheckId));
       		
	if(isset($CheckId))
	{
            $sql = "UPDATE tblhouseholdbudget SET bond ='$bondPayment', rental = '$rental',electricity='$electricity' ,water='$water',food='$food',"
                    . "transport='$transport',educationFee='$education',medicalexpense='$medicalExpense',otherExpense='$otherExpenses',monthlyIncome='$monIncome'"
                    . "WHERE householdID ='$householdID'";
		 
            if ($con->query($sql) === TRUE) 
            {

                $_SESSION["selectMssg"]="Budget Successfully Updated...!!";
                header('location:SelectMemberToAddBudget.php'); 
            } 
            else
            {
                $_SESSION["selectMssg"]="Error household member not updated: " . $con->error." ".$householdID;
                header('location:SelectMemberToAddBudget.php');

            }
            
	}
        else 
        {
            $sql = "INSERT INTO tblhouseholdbudget(householdID,bond,rental,electricity,water,food,transport,educationFee,medicalexpense,otherExpense,monthlyIncome)"
                 . " VALUES('$householdID','$bondPayment','$rental','$electricity','$water','$food','$transport','$education','$medicalExpense','$otherExpenses','$monIncome')";
        
            if(mysqli_query($con,$sql))
            {

                $_SESSION["selectMssg"]="Budget Successfully added...!!";
                header('location:SelectMemberToAddBudget.php');
            }
            else
            {
               $_SESSION["selectMssg"]="Error, household member not updated: " . $con->error;
               header('location:SelectMemberToAddBudget.php'); 

            }
           
        }
        
      
        
        
    }
    function getHouseholdMember($id)
    {
       
        require_once('dbConnect.php');

        $sql = "select * from householdmember where id='$id'";

        $check = mysqli_fetch_array(mysqli_query($con,$sql));
        $result = array();
        if(isset($check))
        {

            $result = $con->query($sql);
            if ($result->num_rows > 0)
            {

                while($row = $result->fetch_assoc()) 
                {
                     $_SESSION["id"]=$row["id"];
                     $_SESSION["IndigentType"]=$row["IndigentType"];
                     $_SESSION["surname"]=$row["surname"];
                     $_SESSION["initials"]=$row["initials"];
                     $_SESSION["DOB"]=$row["DOB"];
                     $_SESSION["applicationStatus"]=$row["applicationStatus"];
                     $_SESSION["employeer"]=$row["employeer"];
                     $_SESSION["education"]=$row["education"];
                     $_SESSION["monthlyIncome"]=$row["monthlyIncome"];
                     $_SESSION["disability"]=$row["disability"];
                     $_SESSION["disabilityDescriptiong"]=$row["disabilityDescriptiong"];
                     $_SESSION["addedByID"]=$row["addedByID"];
                }
                }
            }
           
        }
        
        function updateHouseholdMemberByApplicant(HouseholdMember $householdMember) 
        {
            include('dbConnect.php');
            $id=$householdMember->getId();
            $IndigentType=$householdMember->getIndigentType();
            $surname=$householdMember->getSurname();
            $initials=$householdMember->getInitials();
            $DOB=$householdMember->getDOB();
            $applicationStatus=$householdMember->getApplicationStatus();
            $employeer=$householdMember->getEmployeer();
            $education=$householdMember->getEducation();
            $disability=$householdMember->getDisability();
            $disabilityDescriptiong=$householdMember->getDisabilityDescription();

            
            
            $sql = "UPDATE householdmember SET IndigentType ='$IndigentType', surname = '$surname',initials='$initials' ,DOB='$DOB',applicationStatus='$applicationStatus',"
                    . "employeer='$employeer',education='$education',disability='$disability',disabilityDescriptiong='$disabilityDescriptiong'"
                    . "WHERE id ='$id'";
		 
            if ($con->query($sql) === TRUE) 
            {

                $_SESSION["householdMssg"]="Member Successfully Updated";
                header('locationSelectMemberToUpdate:SelectMemberToUpdate.php'); 
            } 
            else
            {
                $_SESSION["householdMssg"]="Error household member not updated: " . $con->error;
                header('location:SelectMemberToUpdate.php');
                     
            }
            
        }
        
        function updateHouseholdMemberByFWorker(HouseholdMember $householdMember) 
        {
            include('dbConnect.php');
            $id=$householdMember->getId();
            $IndigentType=$householdMember->getIndigentType();
            $surname=$householdMember->getSurname();
            $initials=$householdMember->getInitials();
            $DOB=$householdMember->getDOB();
            $applicationStatus=$householdMember->getApplicationStatus();
            $employeer=$householdMember->getEmployeer();
            $education=$householdMember->getEducation();
            $disability=$householdMember->getDisability();
            $disabilityDescriptiong=$householdMember->getDisabilityDescription();

            
            
            $sql = "UPDATE householdmember SET IndigentType ='$IndigentType', surname = '$surname',initials='$initials' ,DOB='$DOB',applicationStatus='$applicationStatus',"
                    . "employeer='$employeer',education='$education',disability='$disability',disabilityDescriptiong='$disabilityDescriptiong'"
                    . "WHERE id ='$id'";
		 
            if ($con->query($sql) === TRUE) 
            {

                $_SESSION["householdMssg"]="Member Successfully Updated";
                header('location:selectVerification.php'); 
            } 
            else
            {
                $_SESSION["householdMssg"]="Error household member not updated: " . $con->error;
                header('location:selectVerification.php');
                     
            }
            
        }
        function updateHouseholdMember(HouseholdMember $householdMember,  IndigentApplication $indigentApplication) 
        {
            include('dbConnect.php');
            $id=$householdMember->getId();
            $IndigentType=$householdMember->getIndigentType();
            $surname=$householdMember->getSurname();
            $initials=$householdMember->getInitials();
            $DOB=$householdMember->getDOB();
            $applicationStatus=$householdMember->getApplicationStatus();
            $employeer=$householdMember->getEmployeer();
            $education=$householdMember->getEducation();
            $monthlyIncome=$householdMember->getMonthlyIncime();
            $disability=$householdMember->getDisability();
            $disabilityDescriptiong=$householdMember->getDisabilityDescription();

            $addedByID=$indigentApplication->getId();
            
            $sql = "UPDATE householdmember SET IndigentType ='$IndigentType', surname = '$surname',initials='$initials' ,DOB='$DOB',applicationStatus='$applicationStatus',"
                    . "employeer='$employeer',education='$education',monthlyIncome='$monthlyIncome',disability='$disability',disabilityDescriptiong='$disabilityDescriptiong'"
                    . "WHERE id ='$id'";
		 
            if ($con->query($sql) === TRUE) 
            {

                $_SESSION["householdMssg"]="Member Successfully Updated. Add onother member or click DONE to proceed...!!";
                header('location:houseMember.php'); 
            } 
            else
            {
                $_SESSION["householdMssg"]="Error household member not updated: " . $con->error;
                header('location:houseMember.php');
                     
            }
            
        }

   
    
    function addHouseholdMember(HouseholdMember $householdMember,  IndigentApplication $indigentApplication) 
    {
        include('dbConnect.php');
        $id=$householdMember->getId();
        $IndigentType=$householdMember->getIndigentType();
        $surname=$householdMember->getSurname();
        $initials=$householdMember->getInitials();
        $DOB=$householdMember->getDOB();
        $applicationStatus=$householdMember->getApplicationStatus();
        $employeer=$householdMember->getEmployeer();
        $education=$householdMember->getEducation();
        $disability=$householdMember->getDisability();
        $disabilityDescriptiong=$householdMember->getDisabilityDescription();
        
        $addedByID=$indigentApplication->getId();
        
         $sql = "INSERT INTO householdmember(id,IndigentType,surname,initials,DOB,applicationStatus,employeer,education,disability,disabilityDescriptiong,addedByID)"
                 . " VALUES('$id','$IndigentType','$surname','$initials','$DOB','$applicationStatus','$employeer','$education','$disability','$disabilityDescriptiong','$addedByID')";
        
        if(mysqli_query($con,$sql))
        {
            
            $_SESSION["householdMssg"]="Member Successfully Added. Add onother member or click DONE to proceed...!!";
            header('location:houseMember.php'); 
        }
        else
        {
           $_SESSION["signInMssg"]="Failed to add Household  details.Please Try again in 5 minutes...!! ERROR CODE:". mysqli_error($con);
            header('location:feedback.php'); 
            
        }
    }
    
    function addLogin(Login $login) 
    {
         //require_once ('dbConnect.php');
         require 'dbConnect.php';
        $id= $login->getId();
        $username=$login->getUsername();
        $password=$login->getPassword();
        $role=$login->getRole();
        $status=$login->getStatus();
        
        $sqlCheckId = "SELECT * FROM tbllogin WHERE id ='$id'";
        
        $sqlCheckEmail = "SELECT * FROM tbllogin WHERE username ='$username'";
			
        $CheckId = mysqli_fetch_array(mysqli_query($con,$sqlCheckId));
        $CheckEmail = mysqli_fetch_array(mysqli_query($con,$sqlCheckEmail));
			
	if(isset($CheckId))
	{
            //echo 'cell phone or email address used alredy exist';
	    $_SESSION["signInMssg"]=$id." allready exist in our database, please login and apply or complete your profile if is not complete";
            header('location:feedback.php');
	}
        else if(isset($CheckEmail))
        {
            
           $_SESSION["signInMssg"]="Email address allready exist in our database please provide different email address";
           header('location:feedback.php');
           
        }
        else 
        {
             require_once ('dbConnect.php');
     
            $username=password_hash($username, PASSWORD_DEFAULT);
            $password=password_hash($password, PASSWORD_DEFAULT);

            $loginSql = "INSERT INTO tbllogin(id,username,password,role,status) VALUES('$id','$username','$password','$role','$status')";
            if(mysqli_query($con,$loginSql))
            {
                   $_SESSION["signInMssg"]= "You are successfully registered, Click login and use your email address and password to login";
                   header('location:loginFeedback.php');
            }
            else
            {
                
                 $_SESSION["signInMssg"]="Failed to add Indigent Application details.Please Try again in 5 minutes...!!".$con->error;
                 header('location:feedback.php');
            }
      }
        
        
    }
    function Apply( IndigentApplication $indigentApplication,  ResidentiaAddressl $residentiaAddressl,  Contact $contact, Account $account) 
    {   // function Apply(Login $login, IndigentApplication $indigentApplication,  ResidentiaAddressl $residentiaAddressl,  Contact $contact) 
    
        require_once ('dbConnect.php');
        
        //========Account==========================
        $id= $account->getId();
        $reffNum=$account->getReffNum();
        $accNum=$account->getAccNum();
        
        //================Indigent Application============
         $title=$indigentApplication->getTitle();
         $surname=$indigentApplication->getSurname();
         $name=$indigentApplication->getName();
         $DOB=$indigentApplication->getDOB();
         $gander=$indigentApplication->getGander();
         $maritalStatus=$indigentApplication->getMaritalStatus();
         $ageCategory=$indigentApplication->getAgeCategory();
         $applicationType=$indigentApplication->getApplicationType();
         //==============Residential Address=================
          $wardNo=$residentiaAddressl->getWardNo();
          $houseNum=$residentiaAddressl->getHouseNum();
          $streetNo=$residentiaAddressl->getStreetNo();
          $suburd=$residentiaAddressl->getSuburd();
          $city=$residentiaAddressl->getCity();
          $postalCode=$residentiaAddressl->getPostalCode();
          $POB_Num=$residentiaAddressl->getPOB_Num();
          //=============Contact Details======================
           $cellNo=$contact->getCellNo();
           $homeTellNo=$contact->getHomeTellNo();
           $workTellNo=$contact->getWorkTellNo();
           $email=$contact->getEmail();
           
          $username=password_hash($username, PASSWORD_DEFAULT);
          $password=password_hash($password, PASSWORD_DEFAULT);
        
        $accountSql = "INSERT INTO tblaccount(id,reffNum,accNum) VALUES('$id','$reffNum','$accNum')";
        
	$indigentApplicationSql = "INSERT INTO tblindigentapplication(id,title,surname,name,dob,gander,maritalstatus,agecategory,applicationtype)"
                . " VALUES('$id','$title','$surname','$name','$DOB','$gander','$maritalStatus','$ageCategory','$applicationType')";
        
        $residentiaAddresslSql = "INSERT INTO residentialaddress(id,wardno,housenum,streetno,suburd,city,postalcode,pob_num)"
                . " VALUES('$id','$wardNo','$houseNum','$streetNo','$suburd','$city','$postalCode','$POB_Num')";
        
        $contactSql = "INSERT INTO tblcontact(id,cellno,hometellno,worktellno,email) VALUES('$id','$cellNo','$homeTellNo','$workTellNo','$email')";
        
       	
        $sqlCheckId = "SELECT * FROM tblindigentapplication WHERE id ='$id'";
        
        $sqlCheckEmail = "SELECT * FROM tbllogin WHERE username ='$email'";
			
        $CheckId = mysqli_fetch_array(mysqli_query($con,$sqlCheckId));
        $CheckEmail = mysqli_fetch_array(mysqli_query($con,$sqlCheckEmail));
			
	if(isset($CheckId))
	{
            //echo 'cell phone or email address used alredy exist';
	    $_SESSION["signInMssg"]=$id." allready exist in our database, please login and apply or complete your profile if is not complete";
            header('location:feedback.php');
	}
        //else if(isset($CheckEmail))
        else if(false)
        {
            
           $_SESSION["signInMssg"]="Email address allready exist in our database please provide different email address";
           header('location:feedback.php');
           
        }
        else
        {
            if(mysqli_query($con,$accountSql))
            {
                 if(mysqli_query($con,$indigentApplicationSql))
                 {
                     if(mysqli_query($con,$residentiaAddresslSql))
                     {
                         if(mysqli_query($con,$contactSql))
                         {

                             //$_SESSION["signInMssg"]= "You are successfully registered, use your email address and password to login";
                           
                             header('location:houseMember.php');	

                         }
                         else
                         {
                             $_SESSION["signInMssg"]="Failed to add cantact details.Please Try again in 5 minutes...!!";
                             header('location:feedback.php');
                         }
                      }
                      else
                      {
                         $_SESSION["signInMssg"]="Failed to add Residential Address details.Please Try again in 5 minutes...!!";
                        header('location:feedback.php');
                      }
                  }
                  else
                  {
                     $_SESSION["signInMssg"]="Failed to add Indigent Application details.Please Try again in 5 minutes...!!";
                     header('location:feedback.php');
                  }


             }
             else
             {
                 $_SESSION["signInMssg"]="Failed to add account details.Please Try again in 5 minutes...!!";
                 
             }
        }
        
    }
    
   
}