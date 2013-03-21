<?php

header('Content-type: text/xml');

if(!isset($_REQUEST['eventID']))
{
	echo "<xmlResponse><evtregerror>Illegal Request! Please select an event for registration</evtregerror></xmlResponse>";
	exit;
}
if(!isset($_COOKIE['username']) || !isset($_COOKIE['password']))
{
	echo "<xmlResponse><evtregerror>You have to be signed in for event registrations!</evtregerror></xmlResponse>";
	exit;
}

include("dbInfo.php");
$con = mysql_connect($DB_HOST,$DB_USERNAME,$DB_PASSWD) or die("<xmlResponse><evtregerror>".mysql_error()."</evtregerror></xmlResponse>");
mysql_select_db($DB_DATABASENAME,$con) or die("<xmlResponse><evtregerror>".mysql_error()."</evtregerror></xmlResponse>");

$result = mysql_query("SELECT * FROM `registrations` WHERE `userID`='".$_COOKIE['username']."' AND `eventID`=".$_REQUEST['eventID'].";");
if(mysql_num_rows($result)>0)
{
	echo "<xmlResponse><evtregerror>You have already registered for this event</evtregerror></xmlResponse>";
	exit;
}

mysql_query("INSERT INTO `registrations` (`userID`, `eventID`) VALUES ('".$_COOKIE['username']."', '".$_REQUEST['eventID']."');") or die("<xmlResponse><evtregerror>".mysql_error()."</evtregerror></xmlResponse>");

echo "<xmlResponse><evtregerror>Success</evtregerror></xmlResponse>";
mysql_close($con);

?>