<html> <head> <title>Department Record</title> </head> <body>
 <?php $objConnect=oci_connect("system","oracle","localhost/XE"); 
 $strSQL="UPDATE DEPT SET "; 
 $strSQL.="DEPTNO = ".$_POST["txtDeptNo"]; 
 $strSQL.=",DNAME = '".$_POST["txtName"]."' "; 
 $strSQL.=",LOC = '".$_POST["txtLoc"]."' ";
 $strSQL.="WHERE DEPTNO = ".$_GET["DeptNo"]; 
 $objParse=oci_parse($objConnect, $strSQL); 
 $objExecute=oci_execute($objParse, OCI_DEFAULT); 
 if($objExecute) 
 { 
oci_commit($objConnect); //*** Commit Transaction ***//
 echo "Record updated successfully."; 
 } 
 
 else { 
 oci_rollback($objConnect); //*** RollBack Transaction ***// 
 $e =oci_error($objParse); 
 echo "Error Updating [".$e['message']."]";
 }
 
 oci_close($objConnect); 
 ?>
 </body>
 </html>