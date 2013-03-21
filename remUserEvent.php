<?php

header('Content-type: text/xml');

if(!isset($_COOKIE['username']) || !isset($_COOKIE['password']))
{
	echo "<xmlResponse><deregerror>Not logged in</deregerror></xmlResponse>";
	exit;
}
if(!isset($_REQUEST['eventID']))
{
	echo "<xmlResponse><deregerror>Event Not Set</deregerror></xmlResponse>";
	exit;
}

$eventid = addslashes(trim($_REQUEST['eventID']));

include("dbInfo.php");
$con = mysql_connect($DB_HOST,$DB_USERNAME,$DB_PASSWD) or die("<xmlResponse><deregerror>".mysql_error()."</deregerror></xmlResponse>");
mysql_select_db($DB_DATABASENAME,$con) or die("<xmlResponse><deregerror>".mysql_error()."</deregerror></xmlResponse>");

$result = mysql_query("DELETE FROM `registrations` WHERE `eventID`=".$eventid." AND `userID`='".$_COOKIE['username']."';") or die("<xmlResponse><deregerror>Query Failure</deregerror></xmlResponse>");

echo "<xmlResponse><deregerror>Success</deregerror></xmlResponse>";

mysql_close($con);

?>