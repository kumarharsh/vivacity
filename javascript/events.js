var xmlhttp,evtCount=0,catCount=0;

function getXmlHttpObject() //Get the correct xmlhttp for the clients browser
{
	if (window.XMLHttpRequest)
		return new XMLHttpRequest();
	if (window.ActiveXObject)
		return new ActiveXObject("Microsoft.XMLHTTP");
	return null;
}

function registerEvent(id) //Verify registration data on server
{
	xmlhttp=getXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	}
	var url = "registerEvent.php";
	var params = "eventID="+id;
	xmlhttp.onreadystatechange=registerEventReply;
	xmlhttp.open("POST",url,true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(params);
}

function registerEventReply() //Write result of server verification
{
	if(xmlhttp.readyState==4)
  	{
		xmlResponse = xmlhttp.responseXML;
		var error = xmlResponse.getElementsByTagName("evtregerror")[0].childNodes[0].nodeValue;
		if(error!="Success")
		{
			alert(error);
			return;
		}
		alert("Event Registration Successful");
	}
}

function deRegisterEvent(id) //Verify registration data on server
{
	xmlhttp=getXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	}
	var url = "remUserEvent.php";
	var params = "eventID="+id;
	xmlhttp.onreadystatechange=deRegisterEventReply;
	xmlhttp.open("POST",url,true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(params);
}

function deRegisterEventReply() //Write result of server verification
{
	if(xmlhttp.readyState==4)
  	{
		xmlResponse = xmlhttp.responseXML;
		var error = xmlResponse.getElementsByTagName("deregerror")[0].childNodes[0].nodeValue;
		if(error!="Success")
		{
			alert(error);
			return;
		}
		alert("You have successfully unregistered from this event");
		window.location.reload();
	}
}
