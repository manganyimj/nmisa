<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$idNO = $_POST['idno'];
		$fkbikeNO = $_POST['bikeNO'];
		$date = $_POST['date'];
		$status = $_POST['status'];

		require_once('dbConnect.php');
	
		
		$sql = "UPDATE tblAttendace SET status ='$status' WHERE fkidno ='$idNO' AND date = '$date'";
			 
		if ($con->query($sql) === TRUE) 
		{
			echo "Student's bike successfully marked";
		} 
		else
		{
			echo "Error Details not updated: " . $con->error;
		}
	}
	else
	{
		echo "No Data";
	}
?>
	