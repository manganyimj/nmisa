function validateOwnershipType()
{
    var data = document.getElementById("owner").value;
   
    if(data==="Select")
    {
        document.getElementById("lblowner").innerHTML = "---Please select ownership type";
        document.getElementById("lblowner").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lblowner").innerHTML = "---OK";
        document.getElementById("lblowner").style.color = "Green";
        return true;
    }
}

function validateHouseType()
{
    var data = document.getElementById("typeOfHouse").value;
   
    if(data==="Select")
    {
        document.getElementById("lbltypeOfHouse").innerHTML = "---Please select house type";
        document.getElementById("lbltypeOfHouse").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lbltypeOfHouse").innerHTML = "---OK";
        document.getElementById("lbltypeOfHouse").style.color = "Green";
        return true;
    }
}

function validateInsideRoom()
{
    var data = document.getElementById("insideRoom").value;
   
    if(data==="Select")
    {
        document.getElementById("lblinsideRoom").innerHTML = "---Please select Inside Room";
        document.getElementById("lblinsideRoom").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lblinsideRoom").innerHTML = "---OK";
        document.getElementById("lblinsideRoom").style.color = "Green";
        return true;
    }
}

function validateOusideRoom()
{
    var data = document.getElementById("outsideRoom").value;
   
    if(data==="Select")
    {
        document.getElementById("lbloutsideRoom").innerHTML = "---Please select Outside room ";
        document.getElementById("lbloutsideRoom").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lbloutsideRoom").innerHTML = "---OK";
        document.getElementById("lbloutsideRoom").style.color = "Green";
        return true;
    }
}

function validateForm()
{
    if(validateOwnershipType() && validateHouseType() && validateInsideRoom() && validateOusideRoom())
    {
        return true;
    }
    else
    {
        return false;
    }
}
