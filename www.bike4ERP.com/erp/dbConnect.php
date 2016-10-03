<?php
	define('HOST','localhost');
	define('USER','bikes4erp');
	define('PASS','bikes4erp');
	define('DB','bikes4erp');
	
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
?>