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
	$idno = $_POST["student_idno"];
	$bikeNO = $_POST["bikeNO"];
	$grade = $_POST["grade"];
	$distance = $_POST["distance"];
	$schoolid = $_POST["schoolid"];
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

					$sql = "SELECT * FROM tblStudent WHERE bikeNO = '$bikeNO'";
						
					$check = mysqli_fetch_array(mysqli_query($con,$sql));
					
					$sqlIDNO = "SELECT * FROM tblStudent WHERE idno = '$idno'";
						
					$checkIDNO = mysqli_fetch_array(mysqli_query($con,$sqlIDNO));
									
					if(isset($check))
					{
						$_SESSION["message"] = "Bike is already given to a student";	
						header("Location:AddStudent.php");
					}
					else if(isset($checkIDNO))
					{
						$_SESSION["message"] = "Student with the same idno already been added";	
						header("Location:AddStudent.php");
					}
					else
					{
						$sql = "INSERT INTO tblstudent(idno,name,surname,bikeNO,grade,previousMarks,distance,schoolid,image)VALUES('$idno','$studname','$surname','$bikeNO','$grade','$previousMark','$distance','$schoolid','$path')";
											
						if(mysqli_query($con,$sql))
						{
							move_uploaded_file($temp_name,$location);
							$_SESSION["message"] = "Details successfully changed " . $path;
							$year = date('Y');
							$sql = "INSERT INTO tblmarks(fk_idno, year)VALUES('$idno', '$year')";
							
							if(mysqli_query($con,$sql))
							{
								$msql = "UPDATE tblSchool set students = (students+1) where schoolid ='$schoolid'";
								
								if ($con->query($msql) === TRUE) 
								{
									header("Location:AddStudent.php");
								} 
								
							}
						} 
						else
						{
							$_SESSION["message"] = "Details unsuccessfully changed";
							header("Location:AddStudent.php");
						}
					}		
				}
				else
				{
					$_SESSION["message"] =  "Incorrect file type,Allowed file types: only pictures Allowed";
					header("Location:AddStudent.php");	
				}
			}
			else
			{
				$_SESSION["message"] =  "Please select a file that have a size of at least 2MB,Size :".$size." KB max:" .$max_size ;
				header("Location:AddStudent.php");
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
				header("Location:AddStudent.php");
			}
			else
			{	
				$sql = "INSERT INTO tblstudent(idno,name,surname,bikeNO,grade,previousMarks,distance,schoolid)VALUES('$idno','$studname','$surname','$bikeNO','$grade','$previousMark','$distance',$schoolid)";
											
				if(mysqli_query($con,$sql))
				{
					$_SESSION["message"] = "Details successfully changed";
					header("Location:AddStudent.php");
				} 
				else
				{
					$_SESSION["message"] = "Details unsuccessfully changed";
					header("Location:AddStudent.php");
				}
			}		
		}
	}
}
?>