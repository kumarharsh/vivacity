var xmlhttp; //AJAX XMLHTTP request

function GetXmlHttpObject() //Get the correct xmlhttp for the clients browser
{
	if (window.XMLHttpRequest)
		return new XMLHttpRequest();
	if (window.ActiveXObject)
		return new ActiveXObject("Microsoft.XMLHTTP");
	return null;
}

function login() //Act as entry point to the whole login process
{
	var logUsr = document.getElementById("loginUsername").value;
	var logPass = document.getElementById("loginPassword").value;
	callServerLogin(logUsr,logPass);
}
function callServerLogin(logUsr, logPass) //Verify username and password on server
{
	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	}
	var url = "login.php";
	var params = "loginName="+logUsr+"&loginPass="+logPass;
	xmlhttp.onreadystatechange=loginReply;
	xmlhttp.open("POST",url,true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(params);
}
function loginReply() //Write result of server verification
{
	if(xmlhttp.readyState==4)
  	{
		xmlResponse = xmlhttp.responseXML;
		var error = xmlResponse.getElementsByTagName("loginerror")[0].childNodes[0].nodeValue;
		if(error!="Success")
		{
			 document.getElementById("loginError").innerHTML = error;
 			 alert(error);
			 return;
		}
		window.location.reload();
	}
}

/* Logout function... Works as a charm */
function logout()
{
	callServerLogout();
}
function callServerLogout()
{
	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	}
	var url = "logout.php";
	params="";
	xmlhttp.onreadystatechange=logoutReply;
	xmlhttp.open("POST",url,true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(params);
}
function logoutReply()
{
	if(xmlhttp.readyState==4)
  	{
		alert('You have logged out of Vivacity!');
		if(window.location.href=="http://vivacity.lnmiit.ac.in/getUserEventsHTML.php")
			window.location.href="http://vivacity.lnmiit.ac.in/home.php";
		else
			window.location.reload();
	}
}