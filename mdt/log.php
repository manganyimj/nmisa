<?php
ob_start();
if(isset($_POST["login"]))
{
	
     	$email = $_POST['email'];
		

		$password = $_POST['password'];
		require_once('dbConnect.php');
		
	    $sql = "SELECT * FROM tblLogin where email='$email'";
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		$result = array();

		if ($con->query($sql) == TRUE) 
		{
			$result = $con->query($sql);
			if ($result->num_rows > 0)
			{
                            while($row = $result->fetch_assoc()) 
                            {
			                     
								 header('location:admin.php');
							}
			}
			else
		    {
				echo "please provide valid creditials";
			}
		}
		else
	    {
            echo "no magoza".$con->error;
		}
		mysqli_close($con);  
}
ob_end_flush();
?>