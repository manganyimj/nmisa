function validateId()
{
	var id = document.getElementById("id").value;
	if(id.length != 13)
	{
		document.getElementById("lblId").innerHTML = "---Valid ID number is required";
		document.getElementById("lblId").style.color = "red";
		return false;
	}
	else
	{
		 /*{YYMMDD}{G}{SSS}{C}{A}{Z}
                YYMMDD : Date of birth.
                G  : Gender. 0-4 Female; 5-9 Male.
                SSS  : Sequence No. for DOB/G combination.
                C  : Citizenship. 0 SA; 1 Other.
                A  : Usually 8, or 9 [can be other values]
                Z  : Control digit calculated in the following section:*/
                
                
        
                
                var elements=id.split('');
                
                var year=elements[0]+""+elements[1];
                var mon=elements[2]+""+elements[3];
                var day=elements[4]+""+elements[5];
                var citizenship=parseInt(elements[10]);
                
                var intYear=parseInt(year);
                var intMon=parseInt(mon);
                var intDay=parseInt(day);
                
                if(intMon>12 || intMon<1 || intDay>31 ||intDay<1 || intYear<0)
                {
                    document.getElementById("lblId").innerHTML = "---Valid ID number is required, Please rectify...!!";
                    document.getElementById("lblId").style.color = "red";
                    return false;
                }
                else if(citizenship !==0)
                {
                    document.getElementById("lblId").innerHTML = "---Please provide South African ID number...!!";
                    document.getElementById("lblId").style.color = "red";
                    return false;  
                }
                else
                {
                    
                    document.getElementById("lblId").innerHTML = "---Ok";
                    document.getElementById("lblId").style.color ="green";
                    return true; 
                }
	}
}

function validateIndType()
{
    var data = document.getElementById("indigentType").value;
   
    if(data==="Select")
    {
        document.getElementById("lblIndType").innerHTML = "---Please select indigent type";
        document.getElementById("lblIndType").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lblIndType").innerHTML = "---OK";
        document.getElementById("lblIndType").style.color = "Green";
        return true;
    }
}

function validateSurname()
{
	var name = document.getElementById("surname").value;
	if(name.length < 2)
	{
		document.getElementById("lblName").innerHTML = "---Your surname must be at least 2 characters long";
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
		document.getElementById("lblName").innerHTML = "---Invalid surname, please insure that your surname have no special characters";
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

function validateInit()
{
	var name = document.getElementById("init").value;
	if(name.length < 1)
	{
		document.getElementById("lblinit").innerHTML = "---Your initial must be at least 1 characters long";
		document.getElementById("lblinit").style.color = "red";
		return false;
	}
	if(name.length > 5)
	{
		document.getElementById("lblinit").innerHTML = "---Your initial is too long";
		document.getElementById("lblinit").style.color = "red";
		return false;
	}
	if(!name.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblinit").innerHTML = "---Invalid initial, please insure that your initial have no special characters";
		document.getElementById("lblinit").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblinit").innerHTML = "---Ok";
		document.getElementById("lblinit").style.color ="green";
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
    
  
  
function validateApplStatus()
{
    var data = document.getElementById("status").value;
   
    if(data==="Select")
    {
        document.getElementById("lblAppStatus").innerHTML = "---Please select Application Status";
        document.getElementById("lblAppStatus").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lblAppStatus").innerHTML = "---OK";
        document.getElementById("lblAppStatus").style.color = "Green";
        return true;
    }
}

function validateEmployer()
{
    var employer = document.getElementById("employer").value;
    var status = document.getElementById("status").value;
    
    if(!(status==="Employed"))
    {
        document.getElementById("lblEmployer").innerHTML = "---OK";
        document.getElementById("lblEmployer").style.color = "Green";
        return true;
    }
    else
    {
        if(employer.length < 2)
	{
		document.getElementById("lblEmployer").innerHTML = "---Your employer must be at least 2 characters long";
		document.getElementById("lblEmployer").style.color = "red";
		return false;
	}
        if(employer.length > 30)
	{
		document.getElementById("lblEmployer").innerHTML = "---Your employer is too long";
		document.getElementById("lblEmployer").style.color = "red";
		return false;
	}
	if(!employer.match(/^[A-Za-z]*$/))
	{
		document.getElementById("lblEmployer").innerHTML = "---Invalid employer, please insure that your employer have no special characters";
		document.getElementById("lblEmployer").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblEmployer").innerHTML = "---Ok";
		document.getElementById("lblEmployer").style.color ="green";
		return true;
	}
    }
   
}

function validateEducation()
{
    var data = document.getElementById("education").value;
   
    if(data==="Select")
    {
        document.getElementById("lbledu").innerHTML = "---Please select education ";
        document.getElementById("lbledu").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lbledu").innerHTML = "---OK";
        document.getElementById("lbledu").style.color = "Green";
        return true;
    }
}


function validateDisability()
{
    var data = document.getElementById("disability").value;
   
    if(data==="Select")
    {
        document.getElementById("lblDisability").innerHTML = "---Please select ";
        document.getElementById("lblDisability").style.color = "red";
        return false;
        
    }
    else
    {
        document.getElementById("lblDisability").innerHTML = "---OK";
        document.getElementById("lblDisability").style.color = "Green";
        return true;
    }
}

function validateDisabilityDes()
{
    var disabilityDesc = document.getElementById("disabilityDesc").value;
    var disability = document.getElementById("disability").value;
    
    if(disability==="No")
    {
        document.getElementById("lblDisabilityDesc").innerHTML = "---OK";
        document.getElementById("lblDisabilityDesc").style.color = "Green";
        return true; 
    }
    else
    {
        if(disabilityDesc.length < 2)
	{
		document.getElementById("lblDisabilityDesc").innerHTML = "---Your description must be at least 2 characters long";
		document.getElementById("lblDisabilityDesc").style.color = "red";
		return false;
	}
        if(disabilityDesc.length > 30)
	{
		document.getElementById("lblDisabilityDesc").innerHTML = "---Your description is too long";
		document.getElementById("lblDisabilityDesc").style.color = "red";
		return false;
	}
	else
	{
		document.getElementById("lblDisabilityDesc").innerHTML = "---Ok";
		document.getElementById("lblDisabilityDesc").style.color ="green";
		return true;
	}
    }
   
   
}


function validateForm()
{
    //if(validateId() && validateIndType() && validateSurname() && validateInit()&& validateDateAndId()&& validateApplStatus()) 
   if(validateId() && validateIndType() && validateSurname() && validateInit() && validateDateAndId() && validateApplStatus() && validateEmployer() && validateEducation() && validateDisability() && validateDisabilityDes()) 
    
    {
       
        return true;
    }
    else
    {
        return false;
        
    }
}

