/* function validateName()
{
	var name = document.getElementById("txtName").value;
	if(name.length < 2)
	{
		document.getElementById("lblName").innerHTML = "Name is required";
		document.getElementById("lblName").style.color = "red";
		return false;
	}
	if(name.length > 12)
	{
		document.getElementById("lblName").innerHTML = "Name is too long";
		document.getElementById("lblName").style.color = "red";
		return false;
	}
	if(!name.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblName").innerHTML = "Name is not valid";
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
		document.getElementById("lblSurname").innerHTML = "Surname is required";
		document.getElementById("lblSurname").style.color = "red";
		return false;
	}
	if(surname.length > 12)
	{
		document.getElementById("lblSurname").innerHTML = "Name is too long";
		document.getElementById("lblSurname").style.color = "red";
		return false;
	}
	if(!surname.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblSurname").innerHTML = "surname is not valid";
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
		document.getElementById("lblPhone").innerHTML = "**** Valid phone number is required";
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
 */
function validateEmail()
{
	var email = document.getElementById("txtEmail").value;
	
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
	}
}

/* function validateUsername()
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
} */

function validatePassword()
{
	var password = document.getElementById("txtPassword").value;
	if(password.length < 2)
	{
		document.getElementById("lblPassword").innerHTML = "**** Valid Password is required";
		document.getElementById("lblPassword").style.color = "red";
		return false;
	}
	if(password.length > 30)
	{
		document.getElementById("lblPassword").innerHTML = "**** Password is too long";
		document.getElementById("lblPassword").style.color = "red";
		return false;
	}
	if(!password.match(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/))
	{
		document.getElementById("lblPassword").innerHTML = "at least one number, one lowercase and one uppercase letter, at least six characters";
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

/* function validatePasswordTwo()
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
		document.getElementById("lblPasswordTwo").innerHTML = "**** Passwords must match";
		document.getElementById("lblPasswordTwo").style.color = "red";
		return false;
	}
}

function validateProvince()
{
	var name = document.getElementById("txtProvince").value;
	if(name.length < 2)
	{
		document.getElementById("lblProvince").innerHTML = "Province Name is required";
		document.getElementById("lblProvince").style.color = "red";
		return false;
	}
	if(name.length > 12)
	{
		document.getElementById("lblProvince").innerHTML = "Province Name is too long";
		document.getElementById("lblProvince").style.color = "red";
		return false;
	}
	if(!name.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblProvince").innerHTML = "Province Name is not valid";
		document.getElementById("lblProvince").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblProvince").innerHTML = "Ok";
		document.getElementById("lblProvince").style.color ="green";
		return true;
	}
	
}

function validateCity()
{
	var name = document.getElementById("txtCity").value;
	if(name.length < 2)
	{
		document.getElementById("lblCity").innerHTML = "City Name is required";
		document.getElementById("lblCity").style.color = "red";
		return false;
	}
	if(name.length > 12)
	{
		document.getElementById("lblCity").innerHTML = "City Name is too long";
		document.getElementById("lblCity").style.color = "red";
		return false;
	}
	if(!name.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblCity").innerHTML = "City Name is not valid";
		document.getElementById("lblCity").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblCity").innerHTML = "Ok";
		document.getElementById("lblCity").style.color ="green";
		return true;
	}
	
}
function validateForm()
{
	if(validateProvince()  && validateCity() && validateEmail() && validatePasswordTwo() && validatePassword() && validateUsername() && validatePhone() && validateSurname() && validateName())
	{
		return true;
	}
	else
	{
		return false;
	}
} */
