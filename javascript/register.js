var username;
var password;
var name;
var college;
var course;
var semester;
var gender;
var phone;
var email;
var dateOfBirth;
var city;

function callServerReg() //Verify registration data on server
{
	xmlhttp=getXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	}
	var url = "registerUser.php";
	var params = "username="+username;
	params += "&password="+password;
	params += "&name="+name;
	params += "&college="+college;
	params += "&course="+course;
	params += "&semester="+semester;
	params += "&gender="+gender;
	params += "&phone="+phone;
	params += "&email="+email;
	params += "&dateOfBirth="+dateOfBirth;
	params += "&city="+city;
	xmlhttp.onreadystatechange=regReply;
	xmlhttp.open("POST",url,true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(params);
}

function regReply() //Write result of server verification
{
	if(xmlhttp.readyState==4)
  	{
		xmlResponse = xmlhttp.responseXML;
		var error = xmlResponse.getElementsByTagName("regerror")[0].childNodes[0].nodeValue;
		if(error=="Success")
		{
			alert("Registration Sucessful");
			window.location.href = "home.php";
		}
		else if(error!="#")
		{
			document.getElementById("regError").innerHTML = error;
			return;
		}
	}
}

function validate() //Validate if user is giving correct input
{
	var truePass = true;
	var verPass = true;
	var trueUser = true;
	var truePhone = true;
	if(username.length<4)
		trueUser = false;
	if(password.length<6)
		truePass = false;
	if(password!=repassword)
		verPass = false;
	/*var nameRegex = new RegExp(/^[A-Z][a-zA-Z]*$/);
	var trueName = nameRegex.test(name);
	var collRegex = new RegExp(/^[A-Z][a-zA-Z]*$/);
	var trueColl = collRegex.test(college);*/
	if(phone!=="")
	{
		if(isNaN(phone))
			truePhone = false;
	}
	var emailRegex = new RegExp(/^([\w]+)(.[\w]+)*@([\w]+)(.[\w]{2,3}){1,2}$/);
	var trueEmail = emailRegex.test(email);
	var err="";
	if(!trueUser)
		err += "Use a username which is atleast 4 characters long!!<br>";
	if(!truePass)
		err += "Password is too short. Make it atleast 6 characters long<br>";
	if(!verPass)
		err += "The Passwords do not match! Please retype<br>";
	if(!truePhone)
		err += "Check your Phone Number<br>";
	if(!trueEmail)
		err += "Give a valid Email Address. We won't spam it!<br>";
	document.getElementById("regError").innerHTML=err;
	return  truePhone && verPass && trueEmail && truePass && trueUser;
}

function getValues()
{
	username = document.getElementById("username").value;
	password = document.getElementById("password").value;
	repassword = document.getElementById("repassword").value;
	name = document.getElementById("name").value;
	college = document.getElementById("college").value;
	course = document.getElementById("course").value;
	semester = document.getElementById("semester").value;
	gender = document.getElementById("gender").value;
	phone = document.getElementById("phone").value;
	email = document.getElementById("email").value;
	dateOfBirth = document.getElementById("dateOfBirth").value;
	city = document.getElementById("city").value;
}

function registerMe() //Act as entry point to the whole login process
{
	getValues();
	if(!validate())
		return;
	callServerReg();
}
