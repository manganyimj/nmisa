function validateAccountNumber()
{
	var account = document.getElementById("accNum").value;
	if(account.length != 9)
	{
		document.getElementById("lblAccount").innerHTML = "---Invalid Account number,please insure that your account number consists of 9 digits";
		document.getElementById("lblAccount").style.color = "red";
		return false;
	}
	else if(!name.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblAccount").innerHTML = "---Invalid Account number, please insure that your account number have no special characters";
		document.getElementById("lblAccount").style.color = "red";
		return false;
	}
        else
        {
            document.getElementById("lblAccount").innerHTML = "---Ok";
            document.getElementById("lblAccount").style.color ="green";
            return true;
        }
        
       
}



function validateWardNum()
{
        var data = document.getElementById("wardNum").value;
	if(data.length < 2)
	{
		document.getElementById("lblWardNumber").innerHTML = "---Your ward number must be at least 2 characters long";
		document.getElementById("lblWardNumber").style.color = "red";
		return false;
	}
	if(data.length > 15)
	{
		document.getElementById("lblWardNumber").innerHTML = "---Your ward number is too long";
		document.getElementById("lblWardNumber").style.color = "red";
		return false;
	}
	else
	{
            var hasNum=false;
           
            var theElem=data.split('');
            for(var x=0;x<theElem.length;x++)
            {
               
                var dataAtIndex=theElem[x];
                if(!isNaN(parseFloat(dataAtIndex)) && isFinite(dataAtIndex))
                {
                    hasNum=true;
                }
            }
            
            if(hasNum)
            {
                document.getElementById("lblWardNumber").innerHTML = "---Ok";
		document.getElementById("lblWardNumber").style.color ="green";
		return true;
            }
            else
            {
                document.getElementById("lblWardNumber").innerHTML = "---Ward number must have at least 1 digit";
		document.getElementById("lblWardNumber").style.color ="red";
		return false;
            }
		
	}
     
       
         
}

function validateHouseNum()
{
        var data = document.getElementById("houseNum").value;
	if(data.length < 2)
	{
		document.getElementById("lblHouseNum").innerHTML = "---Your house number must be at least 2 characters long";
		document.getElementById("lblHouseNum").style.color = "red";
		return false;
	}
	if(data.length > 15)
	{
		document.getElementById("lblHouseNum").innerHTML = "---Your house number is too long";
		document.getElementById("lblHouseNum").style.color = "red";
		return false;
	}
	
	else
	{
	    var hasNum=false;
           
            var theElem=data.split('');
            for(var x=0;x<theElem.length;x++)
            {
               
                var dataAtIndex=theElem[x];
                if(!isNaN(parseFloat(dataAtIndex)) && isFinite(dataAtIndex))
                {
                    hasNum=true;
                }
            }
            
            if(hasNum)
            {
                document.getElementById("lblHouseNum").innerHTML = "---Ok";
		document.getElementById("lblHouseNum").style.color ="green";
		return true;
            }
            else
            {
                document.getElementById("lblHouseNum").innerHTML = "---House number must have at least 1 digit";
		document.getElementById("lblHouseNum").style.color ="red";
		return false;
            }
	}
}

function validateStreetNum()
{
        var data = document.getElementById("streetNum").value;
	if(data.length < 2)
	{
		document.getElementById("tblStreetMun").innerHTML = "---Your Street number must be at least 2 characters long";
		document.getElementById("tblStreetMun").style.color = "red";
		return false;
	}
	if(data.length > 15)
	{
		document.getElementById("tblStreetMun").innerHTML = "---Your Street number is too long";
		document.getElementById("tblStreetMun").style.color = "red";
		return false;
	}

	else
	{
		document.getElementById("tblStreetMun").innerHTML = "---Ok";
		document.getElementById("tblStreetMun").style.color ="green";
		return true;
	}
}

function validateSuburb()
{
     var data = document.getElementById("suburb").value;

    if(data==="Select")
    {
        document.getElementById("lblSub").innerHTML = "---Please select suburb";
        document.getElementById("lblSub").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lblSub").innerHTML = "---OK";
        document.getElementById("lblSub").style.color = "Green";
        return true;
    }
}

function validateCity()
{
    var data = document.getElementById("city").value;
   
    if(data==="Select")
    {
        document.getElementById("lblCity").innerHTML = "---Please select city";
        document.getElementById("lblCity").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lblCity").innerHTML = "---OK";
        document.getElementById("lblCity").style.color = "Green";
        return true;
    }
}
function validatePostCode()
{
    var data = document.getElementById("postalCode").value;
   
 
     var regNotZero = /^[0]{4}$/;

     var regPostcode = /^([0-9]){4}$/;

     obj = document.getElementById("status");

     if(regNotZero.test(data) == false)
     {

          if(regPostcode.test(data) == false)
          {

            document.getElementById("lblpostcode").innerHTML = "---Invalid postal code, Note: provide a number from the range of 0001-9999";
            document.getElementById("lblpostcode").style.color = "red";
            return false;

          }
          else
          {

              document.getElementById("lblpostcode").innerHTML = "---OK";
              document.getElementById("lblpostcode").style.color = "green";
              return true;

          }

     }
     else
     {

            document.getElementById("lblpostcode").innerHTML = "---Invalid postal code, Note: provide a number from the range of 0001-9999";
            document.getElementById("lblpostcode").style.color = "red";
            return false;

     }
    
}
function validatePOBox()
{
        var data = document.getElementById("pobNum").value;
	if(data.length !==4 )
	{
		document.getElementById("lblPOBox").innerHTML = "---Your P.O.Box  number must be 4 digits long";
		document.getElementById("lblPOBox").style.color = "red";
		return false;
	}
	
	else
	{
		document.getElementById("lblPOBox").innerHTML = "---Ok";
		document.getElementById("lblPOBox").style.color ="green";
		return true;
	}
}

function validateForm()
{
    if( validateAccountNumber() && validateWardNum() && validateHouseNum && validateStreetNum && validateSuburb() && validateCity() && validatePostCode() && validatePOBox())
    {
        return true;
    }
    else
    {
      return false;  
    }
}


