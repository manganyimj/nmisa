<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
	
		require_once('dbConnect.php');
		
		//$sql = "Select name, surname , grade , tblStudent.idno, tblStudent.bikeNO, tblAttendance.status  from tblStudent, tblSchool, tblAttendance where tblSchool.schoolid = tblStudent.schoolid AND tblStudent.bikeNO = tblAttendance.fkbikeno AND tblAttendance.date = '$date' AND tblSchool.adminid = '$adminID'";
		
		$sql = "Select tblStudent.name as name,tblStudent.surname as surname, tblStudent.grade as grade ,tblStudent.idno as id,tblStudent.bikeNO as bike , tblSchool.schoolname as schoolname, image as image,tblSchool.schoolid as schoolid from tblStudent, tblSchool where tblSchool.schoolid = tblStudent.schoolid";
		
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
					
					$myText .= $row["name"]."#" . $row["surname"]."#" . $row["grade"]. "#" .$row["id"]."#" . $row["bike"]."#" . $row["schoolname"] ."#" . $row["image"] . "#" . $row["schoolid"].'@';
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
	
