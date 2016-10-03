<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
	
		require_once('dbConnect.php');
				
		$sql = "Select * from tblSchool";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if($result->num_rows > 0)
			{	$myText = "";
                while($row = $result->fetch_assoc()) 
				{
					$myText .= $row["schoolid"]."#" . $row["schoolname"]."#" . $row["address"]. "#" . $row["email"]. "#" . $row["students"] . "-";
				}
				echo $myText;
			}
			else
			{
				echo "No Data";	
			}				
		}
	}
	else
	{
		echo "No Data";
	}
?>
	
