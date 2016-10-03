function validateMonIncome()
{
	var num = document.getElementById("monIncome").value;
	if(num<0)
	{
		document.getElementById("lblmonIncome").innerHTML = "---The value you entered must be greater or equal to zero(0)";
		document.getElementById("lblmonIncome").style.color = "red";
		return false;
	}
	else if(num=="")
	{
		document.getElementById("lblmonIncome").innerHTML = "---Please enter value that is equal or greater than zero(0)";
		document.getElementById("lblmonIncome").style.color = "red";
		return false;
	}
        else
	{
            document.getElementById("lblmonIncome").innerHTML = "---Ok";
            document.getElementById("lblmonIncome").style.color ="green";
            return true; 
        }
}

function validateBond()
{
	var num = document.getElementById("bondPay").value;
	if(num<0)
	{
		document.getElementById("lblbondPay").innerHTML = "---The value you entered must be greater or equal to zero(0)";
		document.getElementById("lblbondPay").style.color = "red";
		return false;
	}
	else if(num=="")
	{
		document.getElementById("lblbondPay").innerHTML = "---Please enter value that is equal or greater than zero(0)";
		document.getElementById("lblbondPay").style.color = "red";
		return false;
	}
        else
	{
            document.getElementById("lblbondPay").innerHTML = "---Ok";
            document.getElementById("lblbondPay").style.color ="green";
            return true; 
        }
}

function validateRent()
{
	var num = document.getElementById("rental").value;
	if(num<0)
	{
		document.getElementById("lblrental").innerHTML = "---The value you entered must be greater or equal to zero(0)";
		document.getElementById("lblrental").style.color = "red";
		return false;
	}
	else if(num=="")
	{
		document.getElementById("lblrental").innerHTML = "---Please enter value that is equal or greater than zero(0)";
		document.getElementById("lblrental").style.color = "red";
		return false;
	}
        else
	{
            document.getElementById("lblrental").innerHTML = "---Ok";
            document.getElementById("lblrental").style.color ="green";
            return true; 
        }
}


function validateElectricity()
{
	var num = document.getElementById("electricity").value;
	if(num<0)
	{
		document.getElementById("lblelectricity").innerHTML = "---The value you entered must be greater or equal to zero(0)";
		document.getElementById("lblelectricity").style.color = "red";
		return false;
	}
	else if(num=="")
	{
		document.getElementById("lblelectricity").innerHTML = "---Please enter value that is equal or greater than zero(0)";
		document.getElementById("lblelectricity").style.color = "red";
		return false;
	}
        else
	{
            document.getElementById("lblelectricity").innerHTML = "---Ok";
            document.getElementById("lblelectricity").style.color ="green";
            return true; 
        }
}

function validateWater()
{
	var num = document.getElementById("water").value;
	if(num<0)
	{
		document.getElementById("lblwater").innerHTML = "---The value you entered must be greater or equal to zero(0)";
		document.getElementById("lblwater").style.color = "red";
		return false;
	}
	else if(num=="")
	{
		document.getElementById("lblwater").innerHTML = "---Please enter value that is equal or greater than zero(0)";
		document.getElementById("lblwater").style.color = "red";
		return false;
	}
        else
	{
            document.getElementById("lblwater").innerHTML = "---Ok";
            document.getElementById("lblwater").style.color ="green";
            return true; 
        }
}

function validateFood()
{
	var num = document.getElementById("food").value;
	if(num<0)
	{
		document.getElementById("lblfood").innerHTML = "---The value you entered must be greater or equal to zero(0)";
		document.getElementById("lblfood").style.color = "red";
		return false;
	}
	else if(num=="")
	{
		document.getElementById("lblfood").innerHTML = "---Please enter value that is equal or greater than zero(0)";
		document.getElementById("lblfood").style.color = "red";
		return false;
	}
        else
	{
            document.getElementById("lblfood").innerHTML = "---Ok";
            document.getElementById("lblfood").style.color ="green";
            return true; 
        }
}

function validateTransport()
{
	var num = document.getElementById("transport").value;
	if(num<0)
	{
		document.getElementById("lbltransport").innerHTML = "---The value you entered must be greater or equal to zero(0)";
		document.getElementById("lbltransport").style.color = "red";
		return false;
	}
	else if(num=="")
	{
		document.getElementById("lbltransport").innerHTML = "---Please enter value that is equal or greater than zero(0)";
		document.getElementById("lbltransport").style.color = "red";
		return false;
	}
        else
	{
            document.getElementById("lbltransport").innerHTML = "---Ok";
            document.getElementById("lbltransport").style.color ="green";
            return true; 
        }
}

function validateEducation()
{
	var num = document.getElementById("education").value;
	if(num<0)
	{
		document.getElementById("lbleducation").innerHTML = "---The value you entered must be greater or equal to zero(0)";
		document.getElementById("lbleducation").style.color = "red";
		return false;
	}
	else if(num=="")
	{
		document.getElementById("lbleducation").innerHTML = "---Please enter value that is equal or greater than zero(0)";
		document.getElementById("lbleducation").style.color = "red";
		return false;
	}
        else
	{
            document.getElementById("lbleducation").innerHTML = "---Ok";
            document.getElementById("lbleducation").style.color ="green";
            return true; 
        }
}

function validatemedExp()
{
	var num = document.getElementById("medExp").value;
	if(num<0)
	{
		document.getElementById("lblmedExp").innerHTML = "---The value you entered must be greater or equal to zero(0)";
		document.getElementById("lblmedExp").style.color = "red";
		return false;
	}
	else if(num=="")
	{
		document.getElementById("lblmedExp").innerHTML = "---Please enter value that is equal or greater than zero(0)";
		document.getElementById("lblmedExp").style.color = "red";
		return false;
	}
        else
	{
            document.getElementById("lblmedExp").innerHTML = "---Ok";
            document.getElementById("lblmedExp").style.color ="green";
            return true; 
        }
}


function validateOtherExp()
{
	var num = document.getElementById("otherExp").value;
	if(num<0)
	{
		document.getElementById("lblotherExp").innerHTML = "---The value you entered must be greater or equal to zero(0)";
		document.getElementById("lblotherExp").style.color = "red";
		return false;
	}
	else if(num=="")
	{
		document.getElementById("lblotherExp").innerHTML = "---Please enter value that is equal or greater than zero(0)";
		document.getElementById("lblotherExp").style.color = "red";
		return false;
	}
        else
	{
            document.getElementById("lblotherExp").innerHTML = "---Ok";
            document.getElementById("lblotherExp").style.color ="green";
            return true; 
        }
}





function validateForm()
{
	if(validateMonIncome() &&  validateBond() && validateRent() && validateElectricity() && validateWater() && validateFood() && validateTransport() && validateEducation() && validatemedExp() && validateOtherExp())
	{
		return true;
	}
	else
	{
		return false;
	}
}


