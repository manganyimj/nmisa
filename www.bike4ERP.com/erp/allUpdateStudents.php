<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$adminID = $_POST['idno'];
		$date = $_POST['date'];
		
		if(strtotime($date) < time())
		{
			require_once('dbConnect.php');
			
			$sql = "Select tblStudent.name as name, tblStudent.surname as surname , tblStudent.grade as grade ,tblStudent.image as image, tblStudent.idno as id, tblStudent.bikeNO as bike, tblAttendace.date as currentDate, tblAttendace.status as status  from tblStudent, tblSchool, tblAttendace where tblSchool.schoolid = tblStudent.schoolid AND tblStudent.bikeNO = tblAttendace.fkbikeno AND tblSchool.adminid = '$adminID' AND tblAttendace.date = '$date'";
			
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
						$myText .= $row["name"]."#" . $row["surname"]."#" . $row["grade"]. "#" .$row["id"]."#" . $row["bike"]."#" . $row["status"] ."#" . $row["image"] .'@';
					}
					
					echo $myText;
				}
				else
				{
					$updateRow($date, $adminID);	
					echo $getRow($date, $adminID);
				}
				
			}
			else
			{
				"No Data";
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
	
	function updateRow($date, $adminID)
	{
		require_once('dbConnect.php');
										
		/*$sql = "Select tblStudent.idno as id, tblStudent.bikeNO as bike, tblAttendace.date as currentDate from tblStudent, tblSchool, tblAttendace where tblSchool.schoolid = tblStudent.schoolid AND tblStudent.bikeNO = tblAttendace.fkbikeno AND tblSchool.adminid = '$adminID' AND tblAttendace.date != '$date'";
		
		$sql = "Select * from tblStudent'";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
										
		$result = array();
										
		if(isset($check))
		{
			$result = $con->query($sql);
											
			if($result->num_rows > 0)
			{			
				while($row = $result->fetch_assoc()) 
				{
					/*$fkbikeNO = $row["bike"];
					$idNO = $row["id"];
					$status ="No status";
												
					$sqlDate = "SELECT * FROM tblAttendace where date = '$date' AND fkbikeNO = '$fkbikeNO'";
					$checkDate = mysqli_fetch_array(mysqli_query($con,$sqlDate));
														
					if(isset($checkDate))
					{
						
					}
					else
					{
						$sql = "INSERT INTO tblAttendace(fkbikeNO,fkidno,date,status) VALUES('$fkbikeNO','$idNO','$date','$status')";
													
						if(mysqli_query($con,$sql))
						{
										
						}
					}
				}
												
			}			
		}*/
	}
	
	function getRow($date, $adminID)
	{
		require_once('dbConnect.php');
		
		$myText = "No Data";
		
		/*$sql = "Select tblStudent.name as name, tblStudent.surname as surname , tblStudent.grade as grade ,tblStudent.image as image, tblStudent.idno as id, tblStudent.bikeNO as bike, tblAttendace.date as currentDate, tblAttendace.status as status  from tblStudent, tblSchool, tblAttendace where tblSchool.schoolid = tblStudent.schoolid AND tblStudent.bikeNO = tblAttendace.fkbikeno AND tblSchool.adminid = '$adminID' AND tblAttendace.date = '$date'";
			
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
			
		$result = array();
			
		/*if(isset($check))
		{
			$result = $con->query($sql);
				
			if ($result->num_rows > 0)
			{
					
				while($row = $result->fetch_assoc()) 
				{
					$myText .= $row["name"]."#" . $row["surname"]."#" . $row["grade"]. "#" .$row["id"]."#" . $row["bike"]."#" . $row["status"] ."#" . $row["image"] .'@';
				}
			}
		}*/
		
		return $myText;
	}
?>
	
