<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST')
{	
	$name=$_FILES['file']['name'];
	$size=$_FILES['file']['size'];
	$type=$_FILES['file']['type'];
	$temp_name=$_FILES['file']['tmp_name'];
	
	$studname = $_POST["studname"];
	$surname = $_POST["surname"];
	$idno = $_SESSION["student_idno"];
	$bikeNO = $_POST["bikeNO"];
	$grade = $_POST["grade"];
	$distance = $_POST["distance"];
	$previousMark = $_POST["previousMark"];
	
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
					$file_name = $idno.'.'.$file_extn;
					$location='studentProfile/'.$file_name;
					require_once('dbConnect.php');
					$path = "http://10.1.2.233:1000/www.bike4ERP.com/" . $location;

					$sql = "SELECT * FROM tblStudent WHERE idno != $idno AND bikeNO = '$bikeNO'";
						
					$check = mysqli_fetch_array(mysqli_query($con,$sql));
									
					if(isset($check))
					{
						$_SESSION["message"] = "Bike is already given to a student";	
						header("Location:updateStudent.php");
					}
					else
					{
						$sql = "UPDATE tblStudent SET name ='$studname', surname = '$surname', bikeNO = '$bikeNO', grade ='$grade', distance ='$distance', previousMarks ='$previousMark', image ='$path' WHERE $idno ='$idno'";
											
						if($con->query($sql) === TRUE) 
						{
							
							move_uploaded_file($temp_name,$location);
							
							$_SESSION["message"] = "Details successfully changed";
							
							header("Location:updateStudent.php");
						} 
						else
						{
							$_SESSION["message"] = "Details unsuccessfully changed";
							header("Location:updateStudent.php");
						}
					}		
				}
				else
				{
					$_SESSION["message"] =  "Incorrect file type,Allowed file types: only pictures Allowed";
					header("Location:updateStudent.php");	
				}
			}
			else
			{
				$_SESSION["message"] =  "Please select a file that have a size of at least 2MB,Size :".$size." KB max:" .$max_size ;
				header("Location:updateStudent.php");
			}
						
		}
		else
		{
			require_once('dbConnect.php');

			$sql = "SELECT * FROM tblStudent WHERE idno != $idno AND bikeNO = '$bikeNO'";
						
			$check = mysqli_fetch_array(mysqli_query($con,$sql));
									
			if(isset($check))
			{
				$_SESSION["message"] = "Bike is already given to a student";	
				header("Location:updateStudent.php");
			}
			else
			{	
				$sql = "UPDATE tblStudent SET name ='$studname', surname = '$surname', bikeNO = '$bikeNO', grade ='$grade', distance ='$distance', previousMarks ='$previousMark' WHERE $idno ='$idno'";
											
				if($con->query($sql) === TRUE) 
				{
					$_SESSION["message"] = "Details successfully changed";
					header("Location:updateStudent.php");
				} 
				else
				{
					$_SESSION["message"] = "Details unsuccessfully changed";
					header("Location:updateStudent.php");
				}
			}		
		}
	}
}
?>