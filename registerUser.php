<?php

//input: 
//   college, course, semester, username, password, gender, name, phone, email, dateOfBirth

header('Content-type: text/xml');


if(!isset($_REQUEST['college']) || !isset($_REQUEST['course']) || !isset($_REQUEST['semester']))
{
	echo "<xmlResponse><regerror>Academic details not set</regerror></xmlResponse>";
	exit;
}
if(!isset($_REQUEST['username']) || !isset($_REQUEST['password']))
{
	echo "<xmlResponse><regerror>Username or password not set</regerror></xmlResponse>";
	exit;
}
if(!isset($_REQUEST['gender']) || !isset($_REQUEST['name']) || !isset($_REQUEST['phone']) || !isset($_REQUEST['email']) || !isset($_REQUEST['dateOfBirth'])  ||  !isset($_REQUEST['city']))
{
	echo "<xmlResponse><regerror>Personal details not set</regerror></xmlResponse>";
	exit;
}

$username = addslashes(trim($_REQUEST['username']));
$password = addslashes(trim($_REQUEST['password']));
$name = addslashes(trim($_REQUEST['name']));
$college = $_REQUEST['college'];
$course = addslashes(trim($_REQUEST['course']));
$semester = addslashes(trim($_REQUEST['semester']));
$gender = addslashes(trim($_REQUEST['gender']));
$phone = addslashes(trim($_REQUEST['phone']));
$email = addslashes(trim($_REQUEST['email']));
$dateOfBirth = addslashes(trim($_REQUEST['dateOfBirth']));
$city = addslashes(trim($_REQUEST['city']));

include("dbInfo.php");
$con = mysql_connect($DB_HOST,$DB_USERNAME,$DB_PASSWD) or die("<xmlResponse><regerror>aa".mysql_error()."</regerror></xmlResponse>");
mysql_select_db($DB_DATABASENAME,$con) or die("<xmlResponse><regerror>".mysql_error()."</regerror></xmlResponse>");

$result = mysql_query("SELECT * FROM `users` WHERE userID=\"$username\";") or die("<xmlResponse><regerror>bb".mysql_error()."</regerror></xmlResponse>");

$person1 = mysql_fetch_array( $result );  //this is person 1(one) ...a tmp variable
if( $person1['userID'] != "" )
{
	echo "<xmlResponse><regerror>Username already in use</regerror></xmlResponse>";
	mysql_close($con);
	exit;
}


$result = mysql_query("SELECT * FROM `users` WHERE `name`=\"$name\" AND `phone`=\"$phone\";") or die("<xmlResponse><regerror>".mysql_error()."</regerror></xmlResponse>");
$person1  = mysql_fetch_array($result);
if( $person1['userID'] != "")
{
	echo "<xmlResponse><regerror>Person with your name has already registered</regerror></xmlResponse>";
	mysql_close($con);
	exit;
}

mysql_query("INSERT INTO `users` VALUES ('$username','$password','$name','$college','$course', '$semester', '$gender', '$city', '$phone', '$email', '$dateOfBirth');") or die("<xmlResponse><regerror>cc".mysql_error()."</regerror></xmlResponse>");

echo "<xmlResponse><regerror>Success</regerror></xmlResponse>";
mysql_close($con);

?>