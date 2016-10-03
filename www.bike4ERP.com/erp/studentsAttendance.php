<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$date = $_POST['date'];
		$id = $_POST['id'];
		
		require_once('dbConnect.php');
		
		$sql = "Select tblStudent.name as name,tblStudent.surname as surname, tblStudent.image as image ,tblStudent.idno as id,tblStudent.bikeNO as bike , tblattendace.status as st , tblSchool.schoolname as schoolname, image as image,tblSchool.schoolid as schoolid from tblStudent, tblSchool, tblattendace where tblSchool.schoolid = '$id' AND tblStudent.bikeNO = tblattendace.fkbikeno AND tblattendace.date ='$date' ";

		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
	
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{
				$myText = "";
				
                while($row = $result->fetch_assoc()) 
				{	
					$myText .= $row["name"]."#" . $row["surname"]."#" . $row["id"]. "#" .$row["bike"]."#". $row["st"] ."#" . $row["image"] .'@';
				}
				
				echo $myText;
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
	
