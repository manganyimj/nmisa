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
		document.getElementById("name").style.color = "red";
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

function validateSurname()
{
	var surname = document.getElementById("surname").value;
	
	if(surname.length < 2)
	{
		document.getElementById("surname").innerHTML = document.getElementById("surname").innerHTML;
		document.getElementById("surname").style.color = "red";
		document.getElementById("lblLastname").style.color = "red";
		
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
		document.getElementById("surname").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblLastname").innerHTML = "Ok";
		document.getElementById("lblLastname").style.color ="green";
		document.getElementById("surname").style.color = "black";
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

function validateMarks()
{
	var marks = document.getElementById("marks").value;
	
	if(marks < 0)
	{
		document.getElementById("lblMarks").innerHTML = "**** Average marks can't be less than 0";
		document.getElementById("lblMarks").style.color ="red";
		document.getElementById("marks").style.color = "red";
		
		return false;
	}
	else if(marks > 100)
	{
		document.getElementById("lblMarks").innerHTML = "**** Average marks can't be more than 100";
		document.getElementById("lblMarks").style.color ="red";
		document.getElementById("marks").style.color = "red";
		return false;
	}
	else 
	{
	
		document.getElementById("lblMarks").innerHTML = "Ok";
		document.getElementById("lblMarks").style.color ="green";
		document.getElementById("marks").style.color = "black";
		return true;
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

function validateEitForm()
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

function validateSchoolName()
{
	var name = document.getElementById("schoolName").value;
	
	if(name.length < 2)
	{
		document.getElementById("lblSchoolName").innerHTML = "**** Name is required";
		document.getElementById("schoolName").style.color = "red";
		document.getElementById("lblSchoolName").style.color ="red";
		return false;
	}
	if(name.length > 100)
	{
		document.getElementById("lblSchoolName").innerHTML = "**** Name is too long";
		document.getElementById("lblSchoolName").style.color = "red";
		document.getElementById("schoolName").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblSchoolName").innerHTML = "Ok";
		document.getElementById("lblSchoolName").style.color ="green";
		document.getElementById("schoolName").style.color = "black";
		return true;
	}
	
}

function validateVillage()
{
	var village = document.getElementById("village").value;
	
	if(village.length < 2)
	{
		document.getElementById("lblVillage").innerHTML = "**** Village name is required";
		document.getElementById("village").style.color = "red";
		document.getElementById("lblVillage").style.color ="red";
		return false;
	}
	if(village.length > 100)
	{
		document.getElementById("lblVillage").innerHTML = "**** Village name is too long";
		document.getElementById("lblVillage").style.color = "red";
		document.getElementById("village").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblVillage").innerHTML = "Ok";
		document.getElementById("lblVillage").style.color ="green";
		document.getElementById("village").style.color = "black";
		return true;
	}
	
}

function validateSchoolEmail()
{
	var email = document.getElementById("schoolEmail").value;
	
	if(!email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/))
	{
		document.getElementById("lblSchoolEmail").innerHTML = "**** Please provide a valid email address";
		document.getElementById("lblSchoolEmail").style.color = "red";
		document.getElementById("schoolEmail").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblSchoolEmail").innerHTML = "Ok";
		document.getElementById("lblSchoolEmail").style.color ="green";
		document.getElementById("schoolEmail").style.color = "black";
		
		return true;
	}
}

function validateSchoolNumber()
{
	var phone = document.getElementById("schoolNumber").value;
	
	if(phone.length == 10)
	{
		document.getElementById("lblSchoolNO").innerHTML = "Ok";
		document.getElementById("lblSchoolNO").style.color ="green";
		document.getElementById("schoolNumber").style.color = "black";
		
		return true;
		
	}
	else 
	{
		document.getElementById("lblSchoolNO").innerHTML = "**** Valid phone number is required";
		document.getElementById("lblSchoolNO").style.color = "red";
		document.getElementById("schoolNumber").style.color = "red";
		return false;
	}
}

function validateSchoolForm()
{
	if(validateSchoolName() && validateVillage() && validateSchoolEmail() && validateSchoolNumber())
	{
		return true;
	}
	else
	{
		return false;
	}
}

function validateBikeNumber()
{
	var bike = document.getElementById("bikeNO").value;
	
	if(bike.length > 1)
	{
		document.getElementById("lblBikeNO").innerHTML = "Ok";
		document.getElementById("lblBikeNO").style.color ="green";
		document.getElementById("bikeNO").style.color = "black";
		
		return true;
	}
	else 
	{
		document.getElementById("lblBikeNO").innerHTML = "**** Valid bike number is required";
		document.getElementById("lblBikeNO").style.color = "red";
		document.getElementById("bikeNO").style.color = "red";
		return false;
	}
}

function validateGrade()
{
	var grade = document.getElementById("grade").value;
	
	if(grade < 1)
	{
		document.getElementById("lblGrade").innerHTML = "**** Valid grade is required";
		document.getElementById("lblGrade").style.color ="red";
		document.getElementById("grade").style.color = "red";
		
		return false;
		
	}
	else if(grade > 12)
	{
		document.getElementById("lblGrade").innerHTML = "**** Valid grade is required";
		document.getElementById("lblGrade").style.color ="red";
		document.getElementById("grade").style.color = "red";
		
		return false;
		
	}
	else 
	{
		document.getElementById("lblGrade").innerHTML = "OK";
		document.getElementById("lblGrade").style.color = "green";
		document.getElementById("grade").style.color = "black";
		return true;
	}
}

function validateDistance()
{
	var distance = document.getElementById("distance").value;
	
	if(distance < 0)
	{
		document.getElementById("lblDistance").innerHTML = "**** Distance can't be more than required";
		document.getElementById("lblDistance").style.color ="red";
		document.getElementById("distance").style.color = "red";
		
		return false;
		
	}
	else if(distance > 50)
	{
		document.getElementById("lblDistance").innerHTML = "**** Distance can't be more than required";
		document.getElementById("lblDistance").style.color ="red";
		document.getElementById("distance").style.color = "red";
		
		return false;
		
	}
	else 
	{
		document.getElementById("lblDistance").innerHTML = "OK";
		document.getElementById("lblDistance").style.color = "green";
		document.getElementById("distance").style.color = "black";
		return true;
	}
}



