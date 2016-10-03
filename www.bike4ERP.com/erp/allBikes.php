<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		
		$idno = $_POST['idno'];


		define('HOST','localhost');
		define('USER','bikes4erp');
		define('PASS','bikes4erp');
		define('DB','bikes4erp');
		
		$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
		
		
		$sql = "SELECT tblBike.bikeID as bikeNO, tblBike.fk_idno as idno, tblBike.status as st, tblStudent.name as student from tblBike, tblStudent, tblSchool, tblUsers where tblBike.fk_idno = tblstudent.idno AND tblStudent.schoolid = tblSchool.schoolid AND tblSchool.adminid = tblUsers.idno AND tblUsers.idno ='$idno'";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
	
		$result = array();

		if(isset($check))
		{
			$result = $con->query($sql);
			

			if($result->num_rows > 0)
			{ 
				$myText = '';
				while($row = $result->fetch_assoc()) 
				{
				
					$myText .= $row["bikeNO"]."#" .$row["idno"]."#" .$row["st"] ."#". $row["student"] ."#".'@';
					
				}
				echo $myText;
				
			}
			else
			{
				echo "No data1";
			}
		}
		else
		{
			echo "No data2";
		}
	}
	else
	{
		echo "No data3";
	}
?>
	