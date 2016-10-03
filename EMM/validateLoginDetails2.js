function validateId()
{
	var id = document.getElementById("id").value;
	if(id.length != 13)
	{
		document.getElementById("lblId").innerHTML = "---Valid ID number is required";
		document.getElementById("lblId").style.color = "red";
		return false;
	}
    else
	{
                /*{YYMMDD}{G}{SSS}{C}{A}{Z}
                YYMMDD : Date of birth.
                G  : Gender. 0-4 Female; 5-9 Male.
                SSS  : Sequence No. for DOB/G combination.
                C  : Citizenship. 0 SA; 1 Other.
                A  : Usually 8, or 9 [can be other values]
                Z  : Control digit calculated in the following section:*/
                
                
        
                
                var elements=id.split('');
                
                var year=elements[0]+""+elements[1];
                var mon=elements[2]+""+elements[3];
                var day=elements[4]+""+elements[5];
                var citizenship=parseInt(elements[10]);
                
                var intYear=parseInt(year);
                var intMon=parseInt(mon);
                var intDay=parseInt(day);
                
                if(intMon>12 || intMon<1 || intDay>31 ||intDay<1 || intYear<0)
                {
                    document.getElementById("lblId").innerHTML = "---Valid ID number is required, Please rectify...!!";
                    document.getElementById("lblId").style.color = "red";
                    return false;
                }
                else if(citizenship !==0)
                {
                    document.getElementById("lblId").innerHTML = "---Please provide South African ID number...!!";
                    document.getElementById("lblId").style.color = "red";
                    return false;  
                }
                else
                {
                    
                    document.getElementById("lblId").innerHTML = "---Ok";
                    document.getElementById("lblId").style.color ="green";
                    return true; 
                }
            
		
	}
}

function validateEmail()
{
	var email = document.getElementById("username").value;
	
	if(!email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/))
	{
		document.getElementById("lblEmail").innerHTML = "---Please provide a valid email address";
		document.getElementById("lblEmail").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblEmail").innerHTML = "---Ok";
		document.getElementById("lblEmail").style.color ="green";
		return true;
	}
}

function validatePassword()
{
	var password = document.getElementById("password").value;
	
	if(password.length > 30)
	{
		document.getElementById("lblPassword").innerHTML = "---Your password is too long";
		document.getElementById("lblPassword").style.color = "red";
		return false;
	}
	if(!password.match(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/))
	{
		document.getElementById("lblPassword").innerHTML = "---Your password must contain at least one number, one lowercase and one uppercase letter, at least six characters";
		document.getElementById("lblPassword").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblPassword").innerHTML = "---Ok";
		document.getElementById("lblPassword").style.color ="green";
		return true;
	}
}

function validatePasswordTwo()
{
	var passwordTwo = document.getElementById("confirmPass").value;
	var passwordOne = document.getElementById("password").value;
	if(passwordOne == passwordTwo)
	{
		document.getElementById("lblPasswordTwo").innerHTML = "---Ok";
		document.getElementById("lblPasswordTwo").style.color ="green";
		return true;
	}
	else
	{
		document.getElementById("lblPasswordTwo").innerHTML = "---Password and confirm password must match";
		document.getElementById("lblPasswordTwo").style.color = "red";
		return false;
	}
}

function validateForm()
{
	if( validateEmail() && validatePassword() && validatePasswordTwo() && validatePasswordTwo() )
	{
		return true;
	}
	else
	{
		return false;
	}
	
	var passwordTwo = document.getElementById("confirmPass").value;
	var passwordOne = document.getElementById("password").value;
	if(passwordOne == passwordTwo)
	{
		document.getElementById("lblPasswordTwo").innerHTML = "---Ok";
		document.getElementById("lblPasswordTwo").style.color ="green";
		return true;
	}
	else
	{
		document.getElementById("lblPasswordTwo").innerHTML = "---Password and confirm password must match";
		document.getElementById("lblPasswordTwo").style.color = "red";
		return false;
	}
}


