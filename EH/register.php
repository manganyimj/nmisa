<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$gender = $_POST['gender'];
	$title = $_POST['title'];
	$lastname = $_POST['lastname'];
	$name = $_POST['name'];
	$type = $_POST['type'];
	$idno = $_POST['idno'];
	$dob = $_POST['dob'];
	$cellNO = $_POST['cellNO'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$province = $_POST['province'];
	$physicalAddress = $_POST['physicalAddress'];
	$incomeType = $_POST['incomeType'];
	$advertisement = $_POST['advertisement'];
		

	$_SESSION["message"] = "User successfully registered";
	
	header("Location:index.php");
			
			/*require_once('dbConnect.php');
					
			$sqlEmail = "SELECT * FROM tblMembers WHERE email = '$email'";
					
			$checkEmail = mysqli_fetch_array(mysqli_query($con,$sqlEmail));
			
			$sqlPhoneNO = "SELECT * FROM tblMembers WHERE cellNO = '$cellNO'";
					
			$checkPhoneNO = mysqli_fetch_array(mysqli_query($con,$sqlPhoneNO));
			
			$sqlIdNO = "SELECT * FROM tblMembers WHERE idno = '$idno'";
					
			$checkIdNO = mysqli_fetch_array(mysqli_query($con,$sqlIdNO));
			
			if(isset($checkEmail))
			{
				$_SESSION["message"]= "User with the same email already exist";
				header("Location:index.php");
			}
			else if(isset($checkIdNO))
			{
				$_SESSION["message"]= "User with the same id number already exist";
				header("Location:index.php");
			}
			else if($checkPhoneNO)
			{
				$_SESSION["message"] = "User with the same phone number already exist";
				header("Location:index.php");
			}
			else
			{
				$sql = "INSERT INTO tblMembers(gender,title,lastname,name,type,idno,dob,cellNO,email,password, province,physicalAddress,incomeType,advertisement) VALUES('$gender','$title','$lastname','$name','$type','$idno','$cellNO','$email','$password','$province','$physicalAddress','$incomeType','$advertisement')";
				
						
				if(mysqli_query($con,$sql))
				{
					$to      = $email;
					$subject = 'SUCCESSFULLY REGISTERED';
					$message = "Dear " .$name ." " .$lastname . "\n\n\nWelcome to Esibayeni holding here is your Username: " .$email . " and password is : " . $password . "\n\n Kind Regards \n\n Admin";
					$headers = 'From: no_reply@esibayeni.co.za' . "\r\n" .
					'Reply-To: no_reply@esibayeni.co.za' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();

					mail($to, $subject, $message, $headers);
					
					$_SESSION["message"] = "User successfully registered";
					header("Location:index.php");
						
				}
				else
				{
					$_SESSION["message"] = "User unsuccessfully registered";
					header("Location:index.php");
				}
			}
			
			mysqli_close($con);*/
	
			
}
?>


