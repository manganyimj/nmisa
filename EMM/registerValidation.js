function validateName()
{
	var name = document.getElementById("txtName").value;
	if(name.length < 2)
	{
		document.getElementById("lblName").innerHTML = "Your name must be at least 2 characters long";
		document.getElementById("lblName").style.color = "red";
		return false;
	}
	if(name.length > 12)
	{
		document.getElementById("lblName").innerHTML = "Your name is too long";
		document.getElementById("lblName").style.color = "red";
		return false;
	}
	if(!name.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblName").innerHTML = "Invalid name, please insure that your name have no special characters";
		document.getElementById("lblName").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblName").innerHTML = "Ok";
		document.getElementById("lblName").style.color ="green";
		return true;
	}
	
}

function validateSurname()
{
	var surname = document.getElementById("txtSurname").value;
	if(surname.length < 2)
	{
		document.getElementById("lblSurname").innerHTML = "Your surname must be at least 2 characters long";
		document.getElementById("lblSurname").style.color = "red";
		return false;
	}
	if(surname.length > 12)
	{
		document.getElementById("lblSurname").innerHTML = "Your name is too long";
		document.getElementById("lblSurname").style.color = "red";
		return false;
	}
	if(!surname.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblSurname").innerHTML = "Invalid surname, please insure that your surname have no special characters";
		document.getElementById("lblSurname").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblSurname").innerHTML = "Ok";
		document.getElementById("lblSurname").style.color ="green";
		return true;
	}
}

function validatePhone()
{
	var phone = document.getElementById("txtPhone").value;
	if(phone.length != 10)
	{
		document.getElementById("lblPhone").innerHTML = "Invalid phone number,please insure that your phone consists of 10 digits";
		document.getElementById("lblPhone").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblPhone").innerHTML = "Ok";
		document.getElementById("lblPhone").style.color ="green";
		return true;
	}
}

function validateEmail()
{
	var email = document.getElementById("txtEmail").value;
	
	if(!email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/))
	{
		document.getElementById("lblEmail").innerHTML = "Invalid email address, please rectify...";
		document.getElementById("lblEmail").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblEmail").innerHTML = "Ok";
		document.getElementById("lblEmail").style.color ="green";
	}
}

function validateUsername()
{
	var username = document.getElementById("txtUsername").value;
	if(username.length < 2)
	{
		document.getElementById("lblUsername").innerHTML = "**** Valid Username is required";
		document.getElementById("lblUsername").style.color = "red";
		return false;
	}
	if(username.length > 30)
	{
		document.getElementById("lblUsername").innerHTML = "**** Username is too long";
		document.getElementById("lblUsername").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblUsername").innerHTML = "Ok";
		document.getElementById("lblUsername").style.color ="green";
		return true;
	}
}

function validatePassword()
{
	var password = document.getElementById("txtPassword").value;
	if(password.length < 6)
	{
		document.getElementById("lblPassword").innerHTML = "Your password must be at least 6 characters long";
		document.getElementById("lblPassword").style.color = "red";
		return false;
	}
	if(password.length > 30)
	{
		document.getElementById("lblPassword").innerHTML = "Your password is too long";
		document.getElementById("lblPassword").style.color = "red";
		return false;
	}
	if(!password.match(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/))
	{
		document.getElementById("lblPassword").innerHTML = "Please insure that your password has at least one number, one lowercase and one uppercase letter, at least six characters";
		document.getElementById("lblPassword").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblPassword").innerHTML = "Ok";
		document.getElementById("lblPassword").style.color ="green";
		return true;
	}
}

function validatePasswordTwo()
{
	var passwordTwo = document.getElementById("txtPasswordTwo").value;
	var passwordOne = document.getElementById("txtPassword").value;
	if(passwordOne == passwordTwo)
	{
		document.getElementById("lblPasswordTwo").innerHTML = "Ok";
		document.getElementById("lblPasswordTwo").style.color ="green";
		return true;
	}
	else
	{
		document.getElementById("lblPasswordTwo").innerHTML = "Passwords must match";
		document.getElementById("lblPasswordTwo").style.color = "red";
		return false;
	}
}

function validateEmail()
{
	var email = document.getElementById("txtEmail").value;
	
	if(!email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/))
	{
		document.getElementById("lblEmail").innerHTML = "Please provide a valid email address";
		document.getElementById("lblEmail").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblEmail").innerHTML = "Ok";
		document.getElementById("lblEmail").style.color ="green";
	}
}

function validateForm()
{
	if(validatePasswordTwo() && validatePassword() && validateUsername() && validatePhone() && validateSurname() && validateName())
	{
		return true;
	}
	else
	{
		return false;
	}
}
