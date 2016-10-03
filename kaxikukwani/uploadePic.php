

<?php
session_start();

$_SESSION["mssgPic"] ="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
	
	$name=$_FILES['file']['name'];
	$size=$_FILES['file']['size'];
	$type=$_FILES['file']['type'];
	$temp_name=$_FILES['file']['tmp_name'];
	$id = $_POST["txtID"];
	$max_size=2097152;//2MB
	if(isset($name))
	{
		if(!empty($name))
		{
			
			$allowed=array('jpg','jpeg','gif','png');
			$file_extn=strtolower(end(explode('.',$name)));
			if((int)$size<(int)$max_size)
			{
				
				if(in_array($file_extn,$allowed)==true)
				{
					$file_name=substr(md5(time()),0,10).'.'.$file_extn;
					$location='profilePic/'.$file_name;
					echo $file_name;
					move_uploaded_file($temp_name,$location);
					$id=$_SESSION["memberId"];
					require_once('dbConnect.php');
					$sql = "UPDATE tblregister SET image ='$location' WHERE memberId ='$id'";
					if ($con->query($sql) === TRUE) 
					{
							
							$sql1 = "select * from tblregister where memberId=$id";
			
							$check = mysqli_fetch_array(mysqli_query($con,$sql1));
							
							$result = array();
							
							if(isset($check))
							{
								
								$result = $con->query($sql1);
								
								if ($result->num_rows > 0)
								{
									
									while($row = $result->fetch_assoc()) 
									{
										$_SESSION["imageP"] = $row["image"];
										
									}
									
									
								}
											
							}
						
					}
					else
					{
						$_SESSION["mssgPic"]= "Error :" . $con->error;
					}
					//change_profile_image('ID',$temp_name);
				}
				else
				{
					//$_SESSION["mssgPic"] = "Incorrect file type,Allowed file type: ". implode(',',$allowed);
					$_SESSION["mssgPic"] = "Incorrect file type,Allowed file types: jpg,jpeg,gif and png";
					
				}
			}
			else
			{
				$_SESSION["mssgPic"]="Please select a picture that have a size of at least 2MB,Size :".$size." KB max:" .$max_size ;
			}
			
						
		}
		else
		{
			$_SESSION["mssgPic"]="Please choose a file";
		}
	}
}
header('location: profile.php');
?>