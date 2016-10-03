<?php

		require_once('dbConnect.php');
		
		$sql = "Select term_one from tblMarks";
		
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
		
		$sql = "Select term_two from tblMarks";
		
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
		
		$sql = "Select term_three from tblMarks";
		
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
		
		
		$sql = "Select term_four from tblMarks";
		
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
		
		include("phpgraphlib.php");
		include("phpgraphlib_pie.php");
		$graph=new PHPGraphLibPie(1000,600);
		$data=array( "Term one"=>$term_one, "Term Two"=>$term_two,"Term Three"=>$term_three, "Term Four"=>$term_four);
		$graph->addData($data);
		$graph->setTitle("All School Performance");
		$graph->setLabelTextColor("Red");
		$graph->createGraph();
?>
	
