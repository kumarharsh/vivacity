<?php

header('Content-type: text/xml');

include("dbInfo.php");
$con = mysql_connect($DB_HOST,$DB_USERNAME,$DB_PASSWD) or die("<xmlResponse><error>".mysql_error()."</error></xmlResponse>");
mysql_select_db($DB_DATABASENAME,$con) or die("<xmlResponse><error>".mysql_error()."</error></xmlResponse>");

$result = mysql_query("SELECT `name`,`email`,`phone` FROM `vivacity`.`evt_org` WHERE `realName`=\"Web Development\";");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
echo "<USERDB>\n";
while($row = mysql_fetch_array($result))
{
	echo "<user>\n";
	echo "\t<name>".$row['name']."</name>\n";
	echo "\t<email>".$row['email']."</email>\n";
	echo "\t<phone>".$row['phone']."</phone>\n";
	echo "</user>\n";
}
echo "</USERDB>\n";

mysql_close($con);
?>
