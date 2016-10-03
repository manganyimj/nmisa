<?php

		require_once('dbConnect.php');
		
		$sql = "Select status from tblattendace";
		
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$result = array();
		
		$countPresent = 0;
		$countAbsent = 0;
		$countMaint = 0;
		
		if(isset($check))
		{
			$result = $con->query($sql);
			
			if ($result->num_rows > 0)
			{			
                while($row = $result->fetch_assoc()) 
				{
					if ($row["status"]=="present")
					{
							$countPresent = $countPresent+ 1;
					}
					else if ($row["status"])
					{
						$countAbsent = $countAbsent + 1;
					}
					else 
					{
						$countMaint = $countMaint + 1;
					}
					
				}
				
			}			
		}
		
				
		include("phpgraphlib.php");
		$graph = new PHPGraphLib(1000,600);
		$data = array("Term 1"=>40, "Term 2"=>60, "Term 3"=>34, "Term 4"=>34);
		$graph->addData($data);
		$graph->setupXAxis(0,"#1E90FF");
		$graph->setupYAxis(0,"#1E90FF");
		$graph->setRange(0,100); 
		$graph->setBarColor("#008000");
		//$graph->setBarColor("#008000", "#B22222", "#4B0082", "#FF1493");
		$graph->setTitle("School Attendance in Bar Graph");
		$graph->setTextColor("blue");
		$graph->createGraph();
?>
	
