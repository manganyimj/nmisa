function validateName()
{
	var name = document.getElementById("name").value;
	
	document.getElementById("name").innerHTML = document.getElementById("name").innerHTML;
	document.getElementById("name").style.color = "black";
	
	if(name.length < 2)
	{
		document.getElementById("lblName").innerHTML = "**** Name is too short";
		document.getElementById("name").style.color = "red";
		document.getElementById("lblName").style.color ="red";
		return false;
	}
	if(name.length > 30)
	{
		document.getElementById("lblName").innerHTML = "**** Name is too long";
		document.getElementById("name").style.color = "red";
		document.getElementById("lblName").style.color ="red";
		return false;
	}
	if(!name.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblName").innerHTML = "*Invalid name";
		document.getElementById("lblName").style.color ="red";
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
	document.getElementById("surname").innerHTML = document.getElementById("surname").innerHTML;
		document.getElementById("surname").style.color = "black";
	
	if(surname.length < 2)
	{
		document.getElementById("lblSname").innerHTML = "* Name is too short";
		document.getElementById("surname").style.color = "red";
		document.getElementById("lblSname").style.color ="red";
		
		return false;
		
	}
	if(surname.length > 30)
	{
		document.getElementById("lblSname").innerHTML = "*Name is too long";
		document.getElementById("surname").style.color = "red";
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
		document.getElementById("surname").style.color = "black";
		return true;
	}
}
function validateIDNO()
{
	var id = document.getElementById("idno").value;
	
	if(id.length == 13)
	{
		document.getElementById("lblIDNO").innerHTML = "Ok";
		document.getElementById("lblIDNO").style.color ="green";
		document.getElementById("idno").style.color = "black";
		
		return true;
		
	}
	else 
	{
		document.getElementById("lblIDNO").innerHTML = "*Invalid  cellphone numbers";
		document.getElementById("lblIDNO").style.color = "red";
		document.getElementById("idno").style.color = "red";
		return false;
	}
}

function validateGrade()
{
	var grade = document.getElementById("grade").value;
	
	if(grade.length == 2)
	{
		document.getElementById("lblGrade").innerHTML = "Ok";
		document.getElementById("lblGrade").style.color ="green";
		document.getElementById("grade").style.color = "black";
		
		return true; 
		
	}
	else 
	{
		document.getElementById("lblGrade").innerHTML = "*Invalid grade";
		document.getElementById("lblGrade").style.color = "red";
		document.getElementById("grade").style.color = "red";
		return false;
	}
}
function validateDistance()
{
	var grade = document.getElementById("distance").value;
	
	if(grade.length > 2)
	{
		document.getElementById("lblDistance").innerHTML = "Ok";
		document.getElementById("lblDistance").style.color ="green";
		document.getElementById("distance").style.color = "black";
		
		return true;
		
	}
	else 
	{
		document.getElementById("lblDistance").innerHTML = "*Invalid  cellphone numbers";
		document.getElementById("lblDistance").style.color = "red";
		document.getElementById("distance").style.color = "red";
		return false;
	}
}

function validateBike()
{
	var bikenum = document.getElementById("bike").value;
	
	if(bikenum.length == 6 )
	{
		document.getElementById("lblBike").innerHTML = "Ok";
		document.getElementById("lblBike").style.color ="green";
		document.getElementById("bike").style.color = "black";
		
		return true;
		
	}
	else 
	{
		document.getElementById("lblBike").innerHTML = "*Invalid  bike number";
		document.getElementById("lblBike").style.color = "red";
		document.getElementById("bike").style.color = "red";
		return false;
	}
}

function validatePrevMark()
{
	var mark = document.getElementById("previousMark").value;
	
	if(bikenum.length < 6 )
	{
		document.getElementById("lblPrev").innerHTML = "Ok";
		document.getElementById("lblPrev").style.color ="green";
		document.getElementById("previousMark").style.color = "black";
		
		return true;
		
	}
	else 
	{
		document.getElementById("lblPrev").innerHTML = "*Invalid  bike number";
		document.getElementById("lblPrev").style.color = "red";
		document.getElementById("previousMark").style.color = "red";
		return false;
	}
}
