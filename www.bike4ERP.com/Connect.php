<?php
$hostname  = "localhost";
$dbname= "bikes4erp"
$username = "root";
$password = "";

$conn = mysqli_connect($hostname, $username, $password);

if (!$conn)
{
  echo "Please try later.";
}
else
{
mysql_select_db($database, $mysqlConnection);
}

?>