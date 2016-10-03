

<?php
session_start();

$_SESSION["fileMssg"] ="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
	
	$name=$_FILES['file']['name'];
	$size=$_FILES['file']['size'];
	$type=$_FILES['file']['type'];
	$temp_name=$_FILES['file']['tmp_name'];
        
        include './IndigentApplication.php';
	$indigentApplication = unserialize($_SESSION['indigentApplication']);
        $id=$indigentApplication->getId();
        $description = $_POST["description"];
        
	$max_size=4194304;//4MB
	if(isset($name))
	{
		if(!empty($name))
		{
			
			$allowed=array('pdf');
			$file_extn=strtolower(end(explode('.',$name)));
			if((int)$size<(int)$max_size)
			{
				
				if(in_array($file_extn,$allowed)==true)
				{
					$file_name=substr(md5(time()),0,10).'.'.$file_extn;
					$location='Documents/'.$file_name;
					
					require_once('dbConnect.php');
					$sql = "INSERT INTO tbldocuments(id,description,document) VALUES('$id','$description','$location')";
					 if(mysqli_query($con,$sql))
                                         {
                                              
                                               $check = "SELECT * FROM tblindigentapplication WHERE id ='$id'";

                                               $CheckId = mysqli_fetch_array(mysqli_query($con,$check));
                                              
                                                if(isset($CheckId))
                                                {
                                                    move_uploaded_file($temp_name,$location);
                                                    
                                                    $_SESSION["fileMssg"]="Document successfully added. Please add other document or click Done";	
						 
                                                }
                                                else
                                                { 	
                                                    $_SESSION["fileMssg"]=$id." Does not Exists in our database...!!";	
						
                                                }
						
					}
					else
					{
						$_SESSION["fileMssg"]= "Error :" . $con->error;
					}
					//change_profile_image('ID',$temp_name);
				}
				else
				{
					//$_SESSION["fileMssg"] = "Incorrect file type,Allowed file type: ". implode(',',$allowed);
					$_SESSION["fileMssg"] = "Incorrect file type,Allowed file types: PDF";
					
				}
			}
			else
			{
				$_SESSION["fileMssg"]="Your file is too large,Please select a picture that have a size of at least 4MB,Size " ;
			}
			
						
		}
		else
		{
			$_SESSION["fileMssg"]="Please choose a file(PDF document)";
		}
	}
}
else
{
    $_SESSION["fileMssg"]="Method is not Post";
    
}

header('location:../supportingDoc.php');
?>