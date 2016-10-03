<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{	
		require_once('dbConnect.php');
				
		$id = $_POST['schoolID'];
		
		$sql = "Select tblStudent.name as name, tblStudent.surname as surname, tblStudent.idno as idno, tblStudent.bikeNO, tblStudent.previousMarks as previousMarks, tblStudent.image as image, term_one, term_two, term_three, term_four from tblStudent, tblMarks where tblStudent.idno = tblMarks.fk_idno AND schoolid ='$id'";
		
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
					$myText .= $row["name"]."#" . $row["surname"]."#" . $row["idno"]. "#" .$row["bikeNO"]."#". $row["previousMarks"] ."#" . $row["image"] ."#" . $row["term_one"] ."#" . $row["term_two"] ."#" . $row["term_three"] ."#" . $row["term_four"] . "@";
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
			echo "No Data st";
		}
	}
	else
	{
		echo "No Data";
	}
?>
	
