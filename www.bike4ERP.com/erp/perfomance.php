<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{

		$schoolid = $_POST['schoolid'];
		
		require_once('dbConnect.php');
		
		$sql = "Select term_one from tblMarks, tblStudent where tblStudent.idno = tblMarks.fk_idno AND tblStudent.schoolid = '$schoolid'";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		$term_one = 0;
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{			
                while($row = $result->fetch_assoc()) 
				{
					$term_one = $term_one + $row["term_one"];
				}
			}			
		}
		
		$sql = "Select term_two from tblMarks , tblStudent where tblStudent.idno = tblMarks.fk_idno AND tblStudent.schoolid = '$schoolid'";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		$term_two = 0;
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{			
                while($row = $result->fetch_assoc()) 
				{
					$term_two = $term_two + $row["term_two"];
				}
			}			
		}
		
		$sql = "Select term_three from tblMarks, tblStudent where tblStudent.idno = tblMarks.fk_idno AND tblStudent.schoolid = '$schoolid'";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		$term_three = 0;
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{			
                while($row = $result->fetch_assoc()) 
				{
					$term_three = $term_three + $row["term_three"];
				}
			}			
		}
		
		
		$sql = "Select term_four from tblMarks, tblStudent where tblStudent.idno = tblMarks.fk_idno AND tblStudent.schoolid = '$schoolid'";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		$term_four = 0;
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{			
                while($row = $result->fetch_assoc()) 
				{
					$term_four = $term_four + $row["term_four"];
				}
			}			
		}
		
		echo $term_one . "#" . $term_two . "#" . $term_three . "#" . $term_four;
		
	}
	else
	{
		echo "No Data";
	}

?>
	
