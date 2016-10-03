<?php
error_reporting(E_ALL ^ E_NOTICE);
/*$con=mysqli_connect("localhost","root","");
mysqli_select_db("assignment",$con) or die(mysqli_error($con));

*/
/*$connection = mysqli_connect("localhost", "root", "", "assignment");
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

	$db_select = mysqli_select_db($connection, "assignment");
    if (!$db_select) {
        die("Database selection failed: " . mysqli_connect_error());
    }
*/

define('HOST','localhost');
define ('USER','kaylekay');
define ('PASSWORD', 'doxology');
define ('DB', 'assignment_001');

$con = mysqli_connect(HOST,USER,PASSWORD,DB) or die ('unable to connect');

?>