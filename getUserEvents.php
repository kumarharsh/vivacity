<?php

header('Content-type: text/xml');

if(!isset($_COOKIE['username']) || !isset($_COOKIE['password']))
{
	echo "<xmlResponse><error>Not logged in</error></xmlResponse>";
	exit;
}

include("dbInfo.php");
$con = mysql_connect($DB_HOST,$DB_USERNAME,$DB_PASSWD) or die("<xmlResponse><error>".mysql_error()."</error></xmlResponse>");
mysql_select_db($DB_DATABASENAME,$con) or die("<xmlResponse><error>".mysql_error()."</error></xmlResponse>");

//echo "SELECT `eventID` FROM `registrations` WHERE `userID`='".$_COOKIE['username']."';";

$result = mysql_query("SELECT `eventID` FROM `registrations` WHERE `userID`='".$_COOKIE['username']."';");
//echo "<to>$result</to>";
echo "<events>";
while($row = mysql_fetch_array($result))
{
	echo "<event>";
	$result1 = mysql_query("SELECT `vivacityName` FROM `events` WHERE `eventID`='".$row['eventID']."';");
	$row1 = mysql_fetch_array($result1);
	echo "<name>".$row1['vivacityName']."</name>";
	echo "<eventID>".$row['eventID']."</eventID>";
	echo "</event>";
}
echo "</events>";

mysql_close($con);

?>