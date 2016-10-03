<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		require_once('dbConnect.php');
		
		$cellNO = $_POST['cellNO'];
		$email = $_POST['email'];
		
		$sql = "Select * tblUsers where email = '$email' AND cellNO ='$cellNO'";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{
				
				$myText = "";
				
                if($row = $result->fetch_assoc()) 
				{
					$password = $row["password"];
					
					$regard = "Ntshuxeko Mabasa";
					$text = "Here is your password " . $password . " keep your password safe"; 
					$from = "noreply@bikes4ERP.co.za";
							 
					$message = "Dear User\n\n\n" .$text . "\n\n\nKind Regards \n\n" . $regard;
					$headers = 'From: ' . $from . "\r\n" .'Reply-To: ' . $from . "\r\n" .'X-Mailer: PHP/' . phpversion();

					mail($email, $subject, $message, $headers);
			
					$_SESSION["message"] = "Email successfully send#" . $password;
				}
				else
				{
					echo "No Data";
				}
			}
			else
			{
				echo "No Data";
			}
		}
		else
		{
			echo "No Data";
		}

	}
	else
	{
		echo "No Data";
	}
?>
	
