


function validateTitle()
{
    var title = document.getElementById("title").value;
   
    if(title==="Select")
    {
        document.getElementById("lbltitle").innerHTML = "---Please select title";
        document.getElementById("lbltitle").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lbltitle").innerHTML = "---OK";
        document.getElementById("lbltitle").style.color = "Green";
        return true;
    }
}

function validateGander()
{
    var gander = document.getElementById("gander").value;
   
    if(gander==="Select")
    {
        document.getElementById("lblgander").innerHTML = "---Please select Gander";
        document.getElementById("lblgander").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lblgander").innerHTML = "---OK";
        document.getElementById("lblgander").style.color = "Green";
        return true;
    }
   
}

function validateMeritalStatus()
{
   
    var status = document.getElementById("status").value;
    
    if(status==="Select")
    {
        document.getElementById("lblstatus").innerHTML = "---Please select Status";
        document.getElementById("lblstatus").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lblstatus").innerHTML = "---OK";
        document.getElementById("lblstatus").style.color = "Green";
        return true;
    }
    
}

function validateAgeCat()
{
 
    var ageCat = document.getElementById("ageCat").value;
   
    if(ageCat==="Select")
    {
        document.getElementById("lblageCat").innerHTML = "---Please select Age category";
        document.getElementById("lblageCat").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lblageCat").innerHTML = "---OK";
        document.getElementById("lblageCat").style.color = "Green";
        return true;
    }
   
}

function validateAppType()
{
    var appType = document.getElementById("appType").value;
     
    if(appType==="Select")
    {
        document.getElementById("lblappType").innerHTML = "---Please select Application Type";
        document.getElementById("lblappType").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lblappType").innerHTML = "---OK";
        document.getElementById("lblappType").style.color = "Green";
        return true;
    }
   
}

function validateName()
{
	var name = document.getElementById("name").value;
	if(name.length < 2)
	{
		document.getElementById("lblName").innerHTML = "---Your name must be at least 2 characters long";
		document.getElementById("lblName").style.color = "red";
		return false;
	}
	if(name.length > 15)
	{
		document.getElementById("lblName").innerHTML = "---Your name is too long";
		document.getElementById("lblName").style.color = "red";
		return false;
	}
	if(!name.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblName").innerHTML = "---Invalid name, please insure that your name have no special characters";
		document.getElementById("lblName").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblName").innerHTML = "---Ok";
		document.getElementById("lblName").style.color ="green";
		return true;
	}
	
}

function validateSurname()
{
	var surname = document.getElementById("surname").value;
	if(surname.length < 2)
	{
		document.getElementById("lblSurname").innerHTML = "---Your surname must be at least 2 characters long";
		document.getElementById("lblSurname").style.color = "red";
		return false;
	}
	if(surname.length > 15)
	{
		document.getElementById("lblSurname").innerHTML = "---Your name is too long";
		document.getElementById("lblSurname").style.color = "red";
		return false;
	}
	if(!surname.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblSurname").innerHTML = "---Invalid surname, please insure that your surname have no special characters";
		document.getElementById("lblSurname").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblSurname").innerHTML = "---Ok";
		document.getElementById("lblSurname").style.color ="green";
		return true;
	}
        
}

function validateDateAndId()
{
    var date = document.getElementById("DOB").value;
    var id = document.getElementById("id").value;
   
    var dateArray=date.split('-');
    var idArray=id.split('');
    
    var idYear=idArray[0]+""+idArray[1];
    var idMon=idArray[2]+""+idArray[3];
    var idDay=idArray[4]+""+idArray[5];
    
    var selYear=dateArray[0];
    var selMon=dateArray[1];
    var selDay=dateArray[2];
    
    var element=selYear.split('');
    
    var theYear=element[2]+""+element[3];
    
    var idDate=idYear+" "+idMon+" "+idDay;
    var selDate=theYear+" "+selMon+" "+selDay;
    
    if(idDate===selDate)
    {
        document.getElementById("lblDOB").innerHTML = "---Ok";
        document.getElementById("lblDOB").style.color ="green";
        return true;
    }
    else
    {
        document.getElementById("lblDOB").innerHTML = "---Date of birth and your ID number must correspond, please rectify";
        document.getElementById("lblDOB").style.color ="red";
        return false;
    }
    
  

}

function validateAgecat()
{
    var currYear=new Date().getFullYear();
    var ageCat = document.getElementById("ageCat").value;
    var date = document.getElementById("DOB").value;
    var dateArray=date.split('-');
    var selYear=dateArray[0];
    
    var numYears=currYear - parseInt(selYear);
    
    var agecatElement=ageCat.split('-');
    
    var from=agecatElement[0];
    var to=agecatElement[1];
   
    if(from>=numYears && to>numYears)
    {
        document.getElementById("lblageCat").innerHTML = "---Ok";
        document.getElementById("lblageCat").style.color ="green";
        return true;
    }
    else if(from<=numYears && to>numYears)
    {
        document.getElementById("lblageCat").innerHTML = "---Ok";
        document.getElementById("lblageCat").style.color ="green";
        return true;
    }
    else
    {
        document.getElementById("lblageCat").innerHTML = "---Select valid age category,Note: it must be greater or equal to "+numYears+" and less or equal to"+numYears;
        document.getElementById("lblageCat").style.color ="red";
        return false;
    }
    
   
    
}
function validateForm()
{
    if(validateTitle() && validateSurname() && validateName() && validateDateAndId() &&  validateGander() && validateMeritalStatus() && validateAgeCat() && validateAgecat()  && validateAppType())
    {
         var gander = document.getElementById("gander").value;
         var id = document.getElementById("id").value;
         
         var elements=id.split('');
         
         /*{YYMMDD}{G}{SSS}{C}{A}{Z}
                YYMMDD : Date of birth.
                G  : Gender. 0-4 Female; 5-9 Male.
                SSS  : Sequence No. for DOB/G combination.
                C  : Citizenship. 0 SA; 1 Other.
                A  : Usually 8, or 9 [can be other values]
                Z  : Control digit calculated in the following section:*/
        if(gander==="Female" && elements[6] > 4)
        {
            document.getElementById("lblgander").innerHTML = "---Base on your ID number, Your gender must be Male, Please rectify...!!";
            document.getElementById("lblgander").style.color = "red";
            return false;
        }
        else if(gander==="Male" && elements[6] < 5)
        {
            document.getElementById("lblgander").innerHTML = "---Base on your ID number, Your gender must be Female, Please rectify...!!";
            document.getElementById("lblgander").style.color = "red";
            return false;
        }
        else
        {
           return true;
        }
    }
    else
    {
        return false;
    }
  
}
