<?php

header('Content-type: text/xml');

include("dbInfo.php");
$con = mysql_connect($DB_HOST,$DB_USERNAME,$DB_PASSWD) or die("<xmlResponse><error>".mysql_error()."</error></xmlResponse>");
mysql_select_db($DB_DATABASENAME,$con) or die("<xmlResponse><error>".mysql_error()."</error></xmlResponse>");

$result = mysql_query("SELECT `*` FROM `events`;");
echo "<xmlResponse><error>";
while($row = mysql_fetch_array($result))
{
	echo "<event>";
	echo "<EVENTID><![CDATA[".$row['eventID']."]]></EVENTID>";
	echo "<R><![CDATA[".$row['realName']."]]></R>";
	echo "<V><![CDATA[".$row['vivacityName']."]]></V>";
	echo "<DESC><![CDATA[".$row['description']."]]></DESC>";
	echo "<RULES><![CDATA[".$row['rules']."]]></RULES>";
	echo "<CONTACT><![CDATA[".$row['contacts']."]]></CONTACT>";
	echo "<CATEGORY><![CDATA[".$row['category']."]]></CATEGORY>";
	echo "</event>";
}
echo "</error></xmlResponse>";

mysql_close($con);

?>