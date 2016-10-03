
function validateName()
{
	var name = document.getElementById("name").value;
	if(name.length < 2)
	{
		document.getElementById("lblName").innerHTML = "---Your name must be at least 2 characters long";
		document.getElementById("lblName").style.color = "red";
		return false;
	}
	if(name.length > 15)
	{
		document.getElementById("lblName").innerHTML = "---Your name is too long";
		document.getElementById("lblName").style.color = "red";
		return false;
	}
	if(!name.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblName").innerHTML = "---Invalid name, please insure that your name have no special characters";
		document.getElementById("lblName").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblName").innerHTML = "---Ok";
		document.getElementById("lblName").style.color ="green";
		return true;
	}
	
}

function validateSurname()
{
	var surname = document.getElementById("surname").value;
	if(surname.length < 2)
	{
		document.getElementById("lblSurname").innerHTML = "---Your surname must be at least 2 characters long";
		document.getElementById("lblSurname").style.color = "red";
		return false;
	}
	if(surname.length > 15)
	{
		document.getElementById("lblSurname").innerHTML = "---Your name is too long";
		document.getElementById("lblSurname").style.color = "red";
		return false;
	}
	if(!surname.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblSurname").innerHTML = "---Invalid surname, please insure that your surname have no special characters";
		document.getElementById("lblSurname").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblSurname").innerHTML = "---Ok";
		document.getElementById("lblSurname").style.color ="green";
		return true;
	}
        
}

function validateGander()
{
    var gander = document.getElementById("gander").value;
   
    if(gander==="Select")
    {
        document.getElementById("lblgander").innerHTML = "---Please select Gander";
        document.getElementById("lblgander").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lblgander").innerHTML = "---OK";
        document.getElementById("lblgander").style.color = "Green";
        return true;
    }
   
}

function validatePhone()
{
	var phone = document.getElementById("phone").value;
	if(phone.length != 10)
	{
		document.getElementById("lblCell").innerHTML = "---Invalid phone number,please insure that your phone consists of 10 digits";
		document.getElementById("lblCell").style.color = "red";
		return false;
	}
	else
	{
                var element=phone.split('');
                
                if(element[0] !="0")
                {
                    document.getElementById("lblCell").innerHTML = "---Your phone number must start with 0";
                    document.getElementById("lblCell").style.color ="red";
                    return false;
                }
                else
                {
                    document.getElementById("lblCell").innerHTML = "---Ok";
                    document.getElementById("lblCell").style.color ="green";
                    return true; 
                }
		
	}
}

function validateEmail()
{
	var email = document.getElementById("email").value;
	
	if(!email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/))
	{
		document.getElementById("lblEmail").innerHTML = "---Invalid email address, please rectify";
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

function validateRole()
{
    var gander = document.getElementById("role").value;
   
    if(gander==="Select")
    {
        document.getElementById("lblrole").innerHTML = "---Please select Gander";
        document.getElementById("lblrole").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lblrole").innerHTML = "---OK";
        document.getElementById("lblrole").style.color = "Green";
        return true;
    }
   
}

function validateForm()
{
    if(validateName() && validateSurname() && validateGander() && validatePhone() && validateEmail() && validateRole())
    {
        return true;
    }
    else
    {
      return false;  
    }
}