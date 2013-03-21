<?php

header('Content-type: text/xml');

if(!isset($_REQUEST['loginName']) || $_REQUEST['loginName']==="")
{
	echo "<xmlResponse><loginerror>Enter the username!!</loginerror></xmlResponse>";
	exit;
}
if(!isset($_REQUEST['loginPass']) || $_REQUEST['loginPass']==="")
{
	echo "<xmlResponse><loginerror>Enter the password!!</loginerror></xmlResponse>";
	exit;
}

$loginName = $_REQUEST["loginName"];
$loginPass = $_REQUEST["loginPass"];

include("dbInfo.php");

$con = mysql_connect($DB_HOST,$DB_USERNAME,$DB_PASSWD) or die("<xmlResponse><loginerror>".mysql_error()."</loginerror></xmlResponse>");
mysql_select_db($DB_DATABASENAME,$con) or die("<xmlResponse><loginerror>".mysql_error()."</loginerror></xmlResponse>");
$result = mysql_query("SELECT * FROM `users` WHERE `userID`='$loginName' AND `password`='$loginPass';") or die("<xmlResponse><loginerror>".mysql_error()."</loginerror></xmlResponse>");

if(mysql_num_rows($result)>0)
{
	setcookie("username",$loginName,time()+1800);
	setcookie("password",$loginPass,time()+1800);
	echo "<xmlResponse><loginerror>Success</loginerror></xmlResponse>";
}
else
{
	echo "<xmlResponse><loginerror>You are not Registered! Please Click on REGISTER to get an account</loginerror></xmlResponse>";
}

mysql_close($con);
?>