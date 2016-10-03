function validateName()
{
	var name = document.getElementById("name").value;
	
	document.getElementById("name").innerHTML = document.getElementById("name").innerHTML;
	document.getElementById("name").style.color = "black";
	
	if(name.length < 5)
	{
		document.getElementById("lblFname").innerHTML = "**** Name is too short";
		document.getElementById("name").style.color = "red";
		document.getElementById("lblFname").style.color ="red";
		return false;
	}
	if(name.length > 30)
	{
		document.getElementById("lblFname").innerHTML = "**** Name is too long";
		document.getElementById("name").style.color = "red";
		document.getElementById("lblFname").style.color ="red";
		return false;
	}
	if(!name.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblFname").innerHTML = "*Invalid name";
		document.getElementById("lblFname").style.color ="red";
		return false;
		
	}
	else
	{
		document.getElementById("lblFnameName").innerHTML = "Ok";
		document.getElementById("lblFnameName").style.color ="green";
		return true;
	}
	
}

function validateLastname()
{
	var surname = document.getElementById("sname").value;
	document.getElementById("sname").innerHTML = document.getElementById("sname").innerHTML;
		document.getElementById("sname").style.color = "black";
	
	if(surname.length < 2)
	{
		document.getElementById("lblSname").innerHTML = "* Name is too short";
		document.getElementById("sname").style.color = "red";
		document.getElementById("lblSname").style.color ="red";
		
		return false;
		
	}
	if(surname.length > 30)
	{
		document.getElementById("lblSname").innerHTML = "*Name is too long";
		document.getElementById("sname").style.color = "red";
		document.getElementById("lblSname").style.color ="red";
		return false;
	}
	if(!surname.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblSname").innerHTML = "* surname is invalid";
		document.getElementById("lblSname").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblsname").innerHTML = "Ok";
		document.getElementById("lblSname").style.color ="green";
		document.getElementById("sname").style.color = "black";
		return true;
	}
}
function validateIDNO()
{
	var phone = document.getElementById("idnum").value;
	
	if(phone.length == 10)
	{
		document.getElementById("lblIDnumber").innerHTML = "Ok";
		document.getElementById("lblIDnumber").style.color ="green";
		document.getElementById("idnum").style.color = "black";
		
		return true;
		
	}
	else 
	{
		document.getElementById("lblIDnumber").innerHTML = "*Invalid  cellphone numbers";
		document.getElementById("lblIDnumber").style.color = "red";
		document.getElementById("idnum").style.color = "red";
		return false;
	}
}

function validateCellNO()
{
	var phone = document.getElementById("cell").value;
	
	if(phone.length == 10)
	{
		document.getElementById("lblCellNo").innerHTML = "Ok";
		document.getElementById("lblCellNo").style.color ="green";
		document.getElementById("cell").style.color = "black";
		
		return true;
		
	}
	else 
	{
		document.getElementById("lblCellNo").innerHTML = "*Invalid  cellphone numbers";
		document.getElementById("lblCellNo").style.color = "red";
		document.getElementById("cell").style.color = "red";
		return false;
	}
}

function validateEmail()
{
	var email = document.getElementById("email").value;
	
	if(!email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/))
	{
		document.getElementById("lblEmailAdd").innerHTML = "**** Please provide a valid email address";
		document.getElementById("lblEmailAdd").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblEmailAdd").innerHTML = "Ok";
		document.getElementById("lblEmailAdd").style.color ="green";
		
		return true;
	}
}
 