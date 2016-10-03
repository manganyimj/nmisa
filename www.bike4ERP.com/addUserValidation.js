function validateName()
{
	var name = document.getElementById("name").value;
	
	document.getElementById("name").innerHTML = document.getElementById("name").innerHTML;
	document.getElementById("name").style.color = "black";
	
	if(name.length < 2)
	{
		document.getElementById("name").style.color = "red";
		return false;
	}
	if(name.length > 30)
	{
		document.getElementById("name").style.color = "red";
		return false;
	}
	if(!name.match(/^[A-Za-z]*$/))
	{
		document.getElementById("name").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("name").style.color ="green";
		return true;
	}
	
}

function validatesurname()
{
	var surname = document.getElementById("surname").value;
	
	if(surname.length < 2)
	{
		document.getElementById("surname").innerHTML = document.getElementById("surname").innerHTML;
		document.getElementById("surname").style.color = "red";
		
		return false;
	}
	if(surname.length > 30)
	{
		document.getElementById("lblLastname").innerHTML = "**** Surname is too long";
		document.getElementById("surname").style.color = "red";
		document.getElementById("lblLastname").style.color = "red";
		return false;
	}
	if(!surname.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblLastname").innerHTML = "**** surname is invalid";
		document.getElementById("lblLastname").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblLastname").innerHTML = "Ok";
		document.getElementById("lblLastname").style.color ="green";
		document.getElementById("lastname").style.color = "black";
		return true;
	}
}

function validateIDNO()
{
	var phone = document.getElementById("idno").value;
	
	if(phone.length == 13)
	{
		document.getElementById("lblIDNO").innerHTML = "Ok";
		document.getElementById("lblIDNO").style.color ="green";
		document.getElementById("idno").style.color = "black";
		
		return true;
		
	}
	else 
	{
		document.getElementById("lblIDNO").innerHTML = "**** Valid id number is required";
		document.getElementById("lblIDNO").style.color = "red";
		document.getElementById("cellNO").style.color = "red";
		return false;
	}
}

function validateCellNO()
{
	var phone = document.getElementById("cellNO").value;
	
	if(phone.length == 10)
	{
		document.getElementById("lblCellNO").innerHTML = "Ok";
		document.getElementById("lblCellNO").style.color ="green";
		document.getElementById("cellNO").style.color = "black";
		
		return true;
		
	}
	else 
	{
		document.getElementById("lblCellNO").innerHTML = "**** Valid phone number is required";
		document.getElementById("lblCellNO").style.color = "red";
		document.getElementById("cellNO").style.color = "red";
		return false;
	}
}

function validateEmail()
{
	var email = document.getElementById("email").value;
	
	if(!email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/))
	{
		document.getElementById("lblEmail").innerHTML = "**** Please provide a valid email address";
		document.getElementById("lblEmail").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblEmail").innerHTML = "Ok";
		document.getElementById("lblEmail").style.color ="green";
		
		return true;
	}
}
function validatePassword()
{
	var password = document.getElementById("password").value;
	
	if(password.length < 5)
	{
		document.getElementById("lblPassword").innerHTML = "**** Password should contain atleast 5 characters";
		document.getElementById("lblPassword").style.color = "red";
		return false;
	}
	if(password.length > 20)
	{
		document.getElementById("lblPassword").innerHTML = "**** Password should not contain more than 20 characters";
		document.getElementById("lblPassword").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblPassword").innerHTML = "**** Ok";
		document.getElementById("lblPassword").style.color = "green";
		return true;
	}
}

function validatePasswordMatch()
{
	var password = document.getElementById("password").value;
	var confirm = document.getElementById("confirmPassword").value;
	
	if(confirm == password)
	{
		document.getElementById("lblConfirm").innerHTML = "Ok";
		document.getElementById("lblConfirm").style.color ="green";
	
		return true;
	}
	else
	{
		document.getElementById("lblConfirm").innerHTML = "**** Passwords do not match";
		document.getElementById("lblConfirm").style.color = "red";
		return false;
	}
}

function validateForm()
{
	if(validateName() && validateLastname() && validateIDNO() && validateCellNO() && validateEmail())
	{
		return true;
	}
	else
	{
		return false;
	}
}

function validateUpdateForm()
{
	if(validateName() && validateLastname() && validateIDNO() && validateCellNO() && validateEmail() && validatePassword() && validatePasswordMatch() && validateAnswer())
	{
		return true;
	}
	else
	{
		return false;
	}
}