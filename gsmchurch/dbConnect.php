<?php
	define('HOST','localhost');
	define('USER','john');
	define('PASS','1234');
	define('DB','mjitechdbase');
	
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
?>

