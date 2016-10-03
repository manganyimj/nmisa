<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{

		//Term one performance
		require_once('dbConnect.php');
		
		$schoolid = $_POST['schoolID'];
		
		$sql = "Select term_one from tblMarks, tblStudent where tblStudent.idno = tblMarks.fk_idno AND tblStudent.schoolid = '$schoolid'";
		
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
		
		$sql = "Select term_two from tblMarks, tblStudent where tblStudent.idno = tblMarks.fk_idno AND tblStudent.schoolid = '$schoolid'";
		
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
		
		$sql = "Select term_three from tblMarks,tblStudent where tblStudent.idno = tblMarks.fk_idno AND tblStudent.schoolid = '$schoolid'";
		
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
		
		
		$sql = "Select term_four from tblMarks, tblStudent where tblStudent.idno = tblMarks.fk_idno AND tblStudent.schoolid = '$schoolid'";
		
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
		
		$avgOne = ($term_one/$countOne);
		$avgTwo = ($term_two/$countTwo);
		$avgThree = ($term_three/$countThree);
		$avgFour = ($term_four/$countFour);
		
		//Attendance Reports
		
		$year = date("Y");
		$sql = "Select * from tblAttendace, tblStudent where tblAttendace.date >= '$year-01-01' AND tblAttendace.date <= '2016-03-31' AND tblStudent.idno = tblAttendace.fkidno AND tblStudent.schoolid='$schoolid'";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		$absentOne = 0;
		$presentOne = 0;
		$maintainOne = 0;
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{			
                while($row = $result->fetch_assoc()) 
				{
					if($status == "Present")
					{
						$presentOne++;
					}
					else if($status == "Maintain")
					{
						$maintainOne++;
					}
					else
					{
						$absentOne++;
					}
				}
			}			
		}
		
		$year = date("Y");
		$sql = "Select * from tblAttendace,tblStudent where tblAttendace.date >= '$year-04-01' AND tblAttendace.date <= '$year-06-30' AND tblStudent.idno = tblAttendace.fkidno AND tblStudent.schoolid='$schoolid'";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		$absentTwo = 0;
		$presentTwo = 0;
		$maintainTwo= 0;
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{			
                while($row = $result->fetch_assoc()) 
				{
					if($status == "Present")
					{
						$presentTwo++;
					}
					else if($status == "Maintain")
					{
						$maintainTwo++;
					}
					else
					{
						$absentTwo++;
					}
				}
			}			
		}
		
		$year = date("Y");
		
		$end = $year . '-30-09';
		$sql = "Select * from tblAttendace,tblStudent where FORMAT(tblAttendace.date,'YYYY-DD-MM') = '$end' AND tblStudent.idno = tblAttendace.fkidno AND tblStudent.schoolid='$schoolid'";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		$absentThree = 0;
		$presentThree = 0;
		$maintainThree= 0;
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{			
                while($row = $result->fetch_assoc()) 
				{
					if($status == "Present")
					{
						$presentThree++;
					}
					else if($status == "Maintain")
					{
						$maintainThree++;
					}
					else
					{
						$absentThree++;
					}
				}
			}			
		}
		
		$year = date("Y");
		
		$end = $year . '-31-12';
		$sql = "Select * from tblAttendace,tblStudent where (FORMAT(tblAttendace.date,'YYYY-DD-MM')) >= '$year-10-01' AND (FORMAT(tblAttendace.date,'YYYY-DD-MM')) <= '$end' AND tblStudent.idno = tblAttendace.fkidno AND tblStudent.schoolid='$schoolid'";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		$absentFour = 0;
		$presentFour = 0;
		$maintainFour= 0;
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{			
                while($row = $result->fetch_assoc()) 
				{
					if($status == "Present")
					{
						$presentFour++;
					}
					else if($status == "Maintain")
					{
						$maintainFour++;
					}
					else
					{
						$absentFour++;
					}
				}
			}			
		}
		
		echo $presentOne + $maintainTwo + $absentThree;
		//$numberOfStudents = $presentOne + $maintainOne + $absentOne;
		//($presentOne)/($numberOfStudents);
		/*$maintainOne = ($maintainOne)/($presentOne + $maintainOne + $absentOne);
		$absentOne = ($absentOne)/($presentOne + $maintainOne + $absentOne);
		
		$presentTwo = ($presentTwo)/($presentTwo + $maintainTwo + $absentTwo);
		$maintainTwo = ($maintainTwo)/($presentTwo + $maintainTwo + $absentTwo);
		$absentTwo = ($absentTwo)/($presentTwo + $maintainTwo + $absentTwo);
		
		$presentThree = ($presentThree)/($presentThree + $maintainThree + $absentThree);
		$maintainThree = ($maintainThree)/($presentThree + $maintainThree + $absentThree);
		$absentThree = ($absentThree)/($presentThree + $maintainThree + $absentThree);
		
		$presentFour = ($presentFour)/($presentFour + $maintainFour + $absentFour);
		$maintainFour = ($maintainFour)/($presentFour + $maintainFour + $absentFour);
		$absentFour = ($absentFour)/($presentFour + $maintainFour + $absentFour);*/
		
		

		//$data = $avgOne . "#" . $presentOne . "#". $maintainOne . "#" . $absentOne . "@" . $avgTwo . "#" . $presentTwo . "#". $maintainTwo . "#" . $absentTwo . "@" $avgThree . "#" . $presentThree . "#". $maintainThree . "#" . $absentThree . "@" . $avgThree . "#" . $presentThree . "#". $maintainThree . "#" . $absentThree . "@";
		
		
		echo  "Heyu";
		
	}
	else
	{
		echo "No Data";
	}
?>
	
