
function validateForm()
{
	var tel = document.forms["frmAddSchool"]["tel"].value;
	var email = document.forms["frmAddSchool"]["email"].value;
	if(tel.length <10)
	{
		
		alert ("Telephone numbers must be 10 digits");
		return false;
		
	}
	else if(!tel.match(/^[A-Za-z]*$/))
	{
		alert ("Telephone numbers must only be numeric");
		return false;
	}
	else 
	{
	
	}


	if(!email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/))
	{
		alert ("Invalid email");
		return false;
	}
	
}