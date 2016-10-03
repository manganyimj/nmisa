<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{

		//Term one performance
		require_once('dbConnect.php');
		
		$sql = "Select term_one from tblMarks";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		$term_one = 0;
		$countOne = 0;
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{			
                while($row = $result->fetch_assoc()) 
				{
					$term_one = $term_one + $row["term_one"];
					$countOne++;
				}
			}			
		}
		
		$sql = "Select term_two from tblMarks";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		$term_two = 0;
		$countTwo = 0;
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{			
                while($row = $result->fetch_assoc()) 
				{
					$term_two = $term_two + $row["term_two"];
					$countTwo++;
				}
			}			
		}
		
		$sql = "Select term_three from tblMarks";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		$term_three = 0;
		$countThree = 0;
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{			
                while($row = $result->fetch_assoc()) 
				{
					$term_three = $term_three + $row["term_three"];
					$countThree++;
				}
			}			
		}
		
		
		$sql = "Select term_four from tblMarks";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		$term_four = 0;
		$countFour = 0;
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{			
                while($row = $result->fetch_assoc()) 
				{
					$term_four = $term_four + $row["term_four"];
					$countFour++;
				}
			}			
		}
		
		$avgOne = 0;
		$avgTwo = 0;
		$avgThree = 0;
		$avgFour = 0;
		
		if($term_one > 0)
		{
			$avgOne = ($term_one/$countOne);
		}
		
		if($term_two > 0)
		{
			$avgTwo = ($term_two/$countTwo);
		}
		
		if($term_three > 0)
		{
			$avgThree = ($term_three/$countThree);
		}
		
		else if($term_four > 0)
		{
			$avgFour = ($term_four/$countFour);
		}
		
		echo  $avgOne. "#" . $avgTwo . "#" . $avgThree . "#" . $avgFour;
		
		
	}
	else
	{
		echo "No Data";
	}
?>
	
