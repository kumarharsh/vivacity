var xmlhttp;
function getXmlHttpObject() //Get the correct xmlhttp for the clients browser
{
	if (window.XMLHttpRequest)
		return new XMLHttpRequest();
	if (window.ActiveXObject)
		return new ActiveXObject("Microsoft.XMLHTTP");
	return null;
}

function getUpdates(url) //Verify username and password on server
{
	xmlhttp=getXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	}
	xmlhttp.onreadystatechange=writeUpdates;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function writeUpdates() //Write result of server verification
{
	if(xmlhttp.readyState==4)
  	{
		xmlDoc = xmlhttp.responseXML;
		updateCount=xmlDoc.getElementsByTagName("update").length;
		for(i=0;i<updateCount;i++)
		{
			document.getElementById("ticker_inner").innerHTML+="<span class=\"updateTitle\">" + xmlDoc.getElementsByTagName("title")[i].childNodes[0].nodeValue + "</span> : " + xmlDoc.getElementsByTagName("body")[i].childNodes[0].nodeValue;
		}
/*		xmlDoc = xmlhttp.responseText;
		document.getElementById("ticker_inner").innerHTML=xmlDoc;*/
	}
}


/*function getEvents(url,category)
{
	xmlhttp2=getXmlHttpObject();
/*	xmlhttpEvent.onreadystatechange=writeEvents(category);
	xmlDoc2 = xmlhttp2.responseXML;
	eventCount=xmlDoc2.getElementsByTagName("event").length;
	for (i=0;i<eventCount;i++)
	{ 
		if(category.toLowerCase()==xmlDoc2.getElementsByTagName("CATEGORY")[i].childNodes[0].nodeValue)
			{
				n++;
				document.getElementById("eventHolder").innerHTML += "<div class=\"element\">" 
																	+ xmlDoc2.getElementsByTagName("V")[i].childNodes[0].nodeValue
																	+ "</div>";
				if(n%4==0)
					document.getElementById("eventHolder").innerHTML += "<br />";
			}
	 }
	xmlhttp2.open("GET",url,true);
	xmlhttp2.send(null);
}*/
var client,xhr;
function getEvents(url,category)
{
	var client;
	if (window.XMLHttpRequest)
	{
		xhr = new XMLHttpRequest();
		client='standard';
	}
	else if (window.ActiveXObject)
	{
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
		client='msie';
	}
	else
 	{
		alert ("Your browser does not support AJAX!");
		return;
 	}
	xhr.open("GET",url,true);
/*	xmlhttp2.async=true;
	xmlhttp2.load(url);*/
			alert(category);
	xhr.onreadystatechange=writeEvents(category,client);
}

function writeEvents(cat,ct) 
{
 var eXMLdoc,eCtr;
		alert("ur client is "+ct);
		alert("category is "+cat);
 document.getElementById("eventHolder").innerHTML = "";
 alert(xhr.readyState);
 if(xhr.readyState==4)
 {
	eXMLdoc = xhr.responseXML;
	eCtr=eXMLDoc.getElementsByTagName("event").length;
	alert(eCtr);
 }
 
}
/* x=xmlhttp2.documentElement.childNodes;
 var n=0;
 if(ct=='standard')
 {
  for (var i=1;i<x.length;i=i+2)
  {
  if(cat=="All")
  {
	n++;
	document.getElementById("eventHolder").innerHTML+="<div class=\"element\">"+x[i].childNodes[5].childNodes[0].nodeValue+"</div>";
	if(n%4==0)
		document.getElementById("eventHolder").innerHTML += "<br />";
  }
  else if(cat.toLowerCase()==x[i].childNodes[13].childNodes[0].nodeValue.toLowerCase())
  {
	n++;
	document.getElementById("eventHolder").innerHTML += "<div class=\"element\">"+x[i].childNodes[5].childNodes[0].nodeValue+"</div>";
	if(n%4==0)
		document.getElementById("eventHolder").innerHTML += "<br />";
  }
  }
 }
 else
 {
  for (var i=0;i<x.length;i++)
  { 
  	if(cat=="All")
	{
	 n++;
	 document.getElementById("eventHolder").innerHTML += "<div class=\"element\">"+x[i].childNodes[2].firstChild.text+"</div>";
	 if(n%4==0)
	 	document.getElementById("eventHolder").innerHTML += "<br />";
	}
	 
	else if(cat.toLowerCase()==x[i].childNodes[6].firstChild.text.toLowerCase())
	{
	 n++;
	 document.getElementById("eventHolder").innerHTML += "<div class=\"element\">"+x[i].childNodes[2].firstChild.text+"</div>";
	 if(n%4==0)
	 	document.getElementById("eventHolder").innerHTML += "<br />";
	}
  }
 }
}*/