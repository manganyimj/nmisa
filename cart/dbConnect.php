<?php
	define('HOST','localhost');
	define('USER','mdt');
	define('PASS','1234');
	define('DB','mdtdbase');
	
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
?>

