	<?php 
	/*include('include/db_con.php');*/
	/*session_start();
		if (isset($_POST['username'],$_POST['password']))
			   {
                $username=$_POST['username'];
                $password=$_POST['password'];
  
                   if (empty($username) || empty($password))
                   {
                      $error = 'Hey All fields are required!!';
                    }
                     
					 else {  
					 $login="select * from users where user_name='".$username."' and user_password ='".$password."'";
					 $result=mysql_query($login);
					 print_r($result);
				
					 
					if(mysql_fetch_array($result)){
				 $_SESSION['logged_in']='true';
				 $_SESSION['username']=$username;
					 header('Location:registration.php');
					 exit();
					 } else {
					 $error='Incorrect details !!';
					 }
					       }
		} */
		
		
		if(isset ($_POST["login"])){
			
			 $username=$_POST['username'];
			 $password=$_POST['password'];
			 
			 
			 
			 require_once ('/include/db_con.php');
			 
			 $sql = "SELECT * FROM users WHERE user_name = '$username'";
			 $check = mysqli_fetch_array(mysqli_query($con,$sql));
			 $result = array();
			 
			 if (isset($check))
			 {
				
				
				$result = $con-> query($sql);
				if ($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
					echo $row["day_phone"];	
					header('location:registration.php');
					
					}
				}
			 }
		}
		else{
         echo 'not= test';
		}
			
		
  
  ?>
  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<style type="text/css">
	#contenair{
		height: 100%;
		width: 100%;
		
	}
	#r{
		margin-top: 5%;
		margin-bottom: 50px;
		margin-right: 20px;
		float: right;
		height:35%;
		width:35%;
		background-color: #4169E1;
		
	}
	#l
	{
		margin-top: 5%;
		margin-bottom: 50px;
		margin-left:20px;
		float: left;
		
		width: 45%;
		background-color: #4169E1;
	
	}
	</style>
	
<script>
     
        function signup()
      {

          var alt="";
          var x=document.forms["signupform"]["firstname"].value;
          if (x==null || x=="")
            {
              alt +="First name must be filled out\n";
              
            
            }
         var y=document.forms["signupform"]["lastname"].value;
         if (y==null || y=="")
            {
              
              alt += "Last name must be filled out\n";
              
            }
			var x=document.forms["signupform"]["daytimephone"].value;
          if (x==null || x=="")
            {
              alt +="First name must be filled out\n";
              
            
            }
          var z=document.forms["signupform"]["email"].value;
          var atpos=z.indexOf("@");
          var dotpos=z.lastIndexOf(".");
              
           if (atpos<1 || dotpos<atpos+2 || dotpos+2>=z.length)
              {
             alt += "Not a valid e-mail address\n";
             
              }
         
          var v=document.forms["signupform"]["password1"].value; 
         
          if (v==null || v=="")
            {
              alt += "password must be filled out\n";
                 
            }
         var t=document.forms["signupform"]["password2"].value; 
         if (t==null || t=="")
            {
              alt += "confirm password must be filled out\n";
                
            }
			 if (v != t)
            {
              alt += "password  doesn't  match\n";
                 
            }
          if((document.forms["signupform"]["usertype1"].checked==false)&& (document.forms["signupform"]["usertype2"].checked==false))
      
            {
               alt += "payment type  must be filled out\n";
                     
            }
   
        if (alt != "")
             {
               alert(alt);
              return false;
             }
			 else {
			 	form.Submit()
			 }
}

     </script>
</head>
<body>
<div id="contenair">

<div id="l" align="left">
<h2  align="center" style="color:red">Welcome to CSIR BoardRoom Booking </h2>
<h3 align="center"><u><i>Create A Account For New User....</i></u></h3>
<table>
 <form method="POST" name="signupform" action="" onSubmit="return signup();" >
		 <tr>
		<td height="40">FirstName:</td>
		<td><input name="firstname" type="text" id="firstname" size="40" />
		
		</td>
	</tr>
	<tr>
		<td height="40">LastName:</td>
		<td><input name="lastname" type="text" id="lastname" size="40"  />
		
		</td>
	</tr>
	<tr>
		<td height="40">Phone:</td>
		<td><input name="daytimephone" type="text" id="daytimephone" size="40" class="phone" />
		
		</td>
	</tr>
	<tr>
		<td height="40">E-mail:</td>
		<td><input name="email" type="text" id="email" size="40"  />
		
		</td>
	</tr>
	
	<tr>
		<td height="40">Password:</td>
		<td><input name="password1" type="password" id="password1" size="40" />
		
		</td>
	</tr>
	<tr>
		<td height="40">Confirm Password:</td>
		<td><input name="password2" type="password" id="password2" size="40" />
		
		</td>
	</tr>
    <br>
	<tr>
		<td height="40">City/State</td>
		<td><input name="city" type="text" id="city" size="40"  />
		</td>
	</tr>
    <br>
	<tr>
		<td height="40">Country</td>
		<td><input name="country" type="text" id="country" size="40" />
		
		</td>
	</tr>
    <br>
	
	<tr>
	<td align="center" colspan="2"><input type="submit" name="Submit" value="Submit" />
		<input type="reset" name="reset" value="Reset"  /></td></tr>
    </form>
   </table>
</div>
	<div id="r" align="right">
	

	<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="POST">
	<h2 align="center" id="h"><u><i>Login</i></u></h2>
        <table align="center" id="t">
		
          <tr>
            <td width="113">Email:</td>
            <td width="215">
              <input name="username" type="text"  size="40" /></td>
          </tr>
          <tr>
            <td>Password:</td>
            <td>
              <input name="password" type="password"  size="40" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center">
			<!--<input type="submit" name="sub" value="Login" />--> 
			<button type='submit' name='login' id='login'>Login</button></td>
            </tr>
			
       </table>
		</form>
		
		
	</div>
</div>
</body>
</html>