
function validateForm()
{
        
	if(validateDesc())
        {
            return true;
        }
        else
        {
            return false;
        }
}


function validateDesc()
{
        var name = document.getElementById("description").value;
	if(name.length < 2)
	{
		document.getElementById("lbldescription").innerHTML = "---Your description must be at least 2 characters long";
		document.getElementById("lbldescription").style.color = "red";
		return false;
	}
	if(name.length > 15)
	{
		document.getElementById("lbldescription").innerHTML = "---Your description is too long";
		document.getElementById("lbldescription").style.color = "red";
		return false;
	}
	
	else
	{
		document.getElementById("lbldescription").innerHTML = "---Ok";
		document.getElementById("lbldescription").style.color ="green";
		return true;
	}
}


