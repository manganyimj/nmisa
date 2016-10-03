<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		require_once('dbConnect.php');
	
		$sql = "SELECT * from tblUsers where email = '$email' AND password ='$password'";
			
		$check = mysqli_fetch_array(mysqli_query($con,$sql));

		$result = array();
		
		
		if(isset($check))
		{
			$result = $con->query($sql);
			if ($result->num_rows > 0)
			{
				if($row = $result->fetch_assoc()) 
				{
					$data = $row['role'] . "#" . $row['name'] . "#" . $row['surname'] . "#" . $row['idno'] . "#" . $row['cellNO'] . "#" . $row['email'] . "#" . $row['password'];
					
					echo $data;
				}
				else
				{
					echo "No data";
				}
			}
			else
			{
				echo "No data";
			}
		}
		else
		{
			echo "No data";
		}
	}
	else
	{
		echo "No data";
	}
?>
	