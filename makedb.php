<?php

include("dbInfo.php");
$con = mysql_connect($DB_HOST,$DB_USERNAME,$DB_PASSWD) or die("<xmlResponse><error>".mysql_error()."</error></xmlResponse>");
mysql_select_db($DB_DATABASENAME,$con) or die("<xmlResponse><error>".mysql_error()."</error></xmlResponse>");

mysql_query("DELETE FROM `events`;");

$xml=simplexml_load_file('Scripts/events.xml') or die( "<xmlResponse><error>Could not connect to XML file</error></xmlResponse>" );
for($i=0;$xml->EVT[$i]!="";$i++)
{
	$root = $xml->EVT[$i]->ROOT;
	$path = $xml->EVT[$i]->PATH;
	$r = $xml->EVT[$i]->R;
	$v = $xml->EVT[$i]->V;
	$desc = $xml->EVT[$i]->DESC;
	$rules = $xml->EVT[$i]->RULES;
	$contacts = $xml->EVT[$i]->CONTACT;
	$eventID = $xml->EVT[$i]->EVENTID;
	
	$desc = str_replace("'","~",$desc);
	$rules = str_replace("'","~",$rules);
	$contacts = str_replace("'","~",$contacts);
	
	mysql_query("INSERT INTO `events` (`eventID`, `realName`, `vivacityName`, `description`, `rules`, `contacts`, `root`, `path`) VALUES($eventID, '$r', '$v', '$desc', '$rules', '$contacts', '$root', '$path' ); ");
	
}

echo "<xmlResponse><error>Success</error></xmlResponse>";

mysql_close($con);

?>
