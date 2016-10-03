function validatePhone()
{
	var phone = document.getElementById("cellNum").value;
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

function validateHomeTel()
{
        
	var phone = document.getElementById("homeTell").value;
        
        if(phone=="")
        {
             document.getElementById("lblTell").innerHTML = "---Ok( this field is optional)";
             document.getElementById("lblTell").style.color ="green";
             return true;  
        }
        else
        {
            if(phone.length != 10)
            {
                    document.getElementById("lblTell").innerHTML = "---Invalid tellphone number,please insure that your phone consists of 10 digits";
                    document.getElementById("lblTell").style.color = "red";
                    return false;
            }
            else
            {
                    var element=phone.split('');

                    if(element[0] !="0")
                    {
                        document.getElementById("lblTell").innerHTML = "---Your tellphone number must start with 0";
                        document.getElementById("lblTell").style.color ="red";
                        return false;
                    }
                    else
                    {
                        document.getElementById("lblTell").innerHTML = "---Ok";
                        document.getElementById("lblTell").style.color ="green";
                        return true; 
                    }

            }
    }
        
       
}


function validateWorkTel()
{
	var phone = document.getElementById("workTell").value;
        
        if(phone=="")
        {
             document.getElementById("lblworkTell").innerHTML = "---Ok( this field is optional)";
             document.getElementById("lblworkTell").style.color ="green";
             return true;  
        }
        else
        {
            if(phone.length != 10)
            {
                    document.getElementById("lblworkTell").innerHTML = "---Invalid tellphone number,please insure that your phone consists of 10 digits";
                    document.getElementById("lblworkTell").style.color = "red";
                    return false;
            }
            else
            {
                    var element=phone.split('');

                    if(element[0] !="0")
                    {
                        document.getElementById("lblworkTell").innerHTML = "---Your tellphone number must start with 0";
                        document.getElementById("lblworkTell").style.color ="red";
                        return false;
                    }
                    else
                    {
                        document.getElementById("lblworkTell").innerHTML = "---Ok";
                        document.getElementById("lblworkTell").style.color ="green";
                        return true; 
                    }

            }
    }
        
       
}


function validateEmail()
{
	var email = document.getElementById("email").value;
	
	if(!email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/))
	{
		document.getElementById("lblEmail").innerHTML = "---Invalid email address, please rectify...";
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





function validateForm()
{
    if(validatePhone() && validateHomeTel() && validateWorkTel() && validateEmail() )
    {
        return true;
    }
    else
    {
      return false;  
    }
}




