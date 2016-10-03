function validateName()
{
	var name = document.getElementById("name").value;
	
	document.getElementById("name").innerHTML = document.getElementById("name").innerHTML;
	document.getElementById("name").style.color = "black";
	
	if(name.length < 2)
	{
		document.getElementById("lblName").innerHTML = "**** Name is required";
		document.getElementById("name").style.color = "red";
		document.getElementById("lblName").style.color ="red";
		return false;
	}
	if(name.length > 30)
	{
		document.getElementById("lblName").innerHTML = "**** Name is too long";
		document.getElementById("lblName").style.color = "red";
		document.getElementById("name").style.  = "red";
		return false;
	}
	if(!name.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblName").innerHTML = "**** Name is invalid";
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

function validateLastname()
{
	var surname = document.getElementById("lastname").value;
	
	if(surname.length < 2)
	{
		document.getElementById("lastname").innerHTML = document.getElementById("lastname").innerHTML;
		document.getElementById("lastname").style.color = "red";
		
		return false;
	}
	if(surname.length > 30)
	{
		document.getElementById("lblLastname").innerHTML = "**** Surname is too long";
		document.getElementById("lastname").style.color = "red";
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

function validateAnswer()
{
	var answer = document.getElementById("answer").value;
	
	if(answer.length < 1)
	{
		document.getElementById("answer").innerHTML = document.getElementById("answer").innerHTML;
		document.getElementById("answer").style.color = "red";
		document.getElementById("lblAnswer").style.color ="red";
		document.getElementById("lblAnswer").innerHTML = "Please enter a valid answer";
		
		return false;
	}
	else
	{
		document.getElementById("lblAnswer").innerHTML = "Ok";
		document.getElementById("lblAnswer").style.color ="green";
		document.getElementById("answer").style.color = "black";
		return true;
	}
}

function validateMessage()
{

	var message = document.getElementById("message").value;
	
	if(message.length < 9)
	{
		document.getElementById("message").style.color ="red";
		document.getElementById("lblMessage").innerHTML = "ERROR... Message must contain atleast 10 letters";
		document.getElementById("lblMessage").style.color ="red";
		return false;
	}
	else if(message.length > 400)
	{
		document.getElementById("lblMessage").innerHTML = "ERROR... Message must contain not more than 400 letters";
		document.getElementById("lblMessage").style.color ="red";
		document.getElementById("message").style.color ="red";
		return false;
	}
	else
	{
		document.getElementById("lblMessage").innerHTML = "Ok";
		document.getElementById("lblMessage").style.color ="Green";
		document.getElementById("message").style.color ="black";
		return true;
	}

}

function validateSubject()
{

	var subject = document.getElementById("subject").value;
	
	if(subject.length < 5)
	{
		document.getElementById("subject").style.color ="red";
		document.getElementById("lblSubject").innerHTML = "Subject must contain atleast 6 letter";
		document.getElementById("lblMessage").style.color ="red";
		return false;
	}
	else if(subject.length > 100)
	{
		document.getElementById("lblSubject").innerHTML = "ERROR... Subject must contain not more than 100 letters";
		document.getElementById("lblSubject").style.color ="red";
		document.getElementById("subject").style.color ="red";
		return false;
	}
	else
	{
		document.getElementById("lblSubject").innerHTML = "Ok";
		document.getElementById("lblSubject").style.color ="Green";
		document.getElementById("subject").style.color ="black";
		return true;
	}

}

function validateForm()
{
	if(validateName() && validateLastname() && validateCellNO() && validateEmail() && validatePassword() && validatePasswordMatch() && validateAnswer())
	{
		return true;
	}
	else
	{
		return false;
	}
}

function validateContactForm()
{
	if(validateName() && validateEmail() && validatePhoneNO() && validateMessage())
	{
		return true;
	}
	else
	{
		return false;
	}
}

function validateRecoverForm()
{
	if(validatePassword() && validatePasswordMatch())
	{
		return true;
	}
	else
	{
		return false;
	}
}

function validateSendEmail()
{
	if(validateSubject() && validateMessage())
	{
		return true;
	}
	else
	{
		return false;
	}
}