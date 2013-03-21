<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vivacity 2010</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/events.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="javascript/updates.js"></script>
<script type="text/javascript" src="javascript/effects.js"></script>
<script type="text/javascript" src="javascript/events.js"></script>
</head>

<body onload="showSponsors();">
<div id="main">
<?php include('updates.php');
	  include('header.php');
?>  
<div class="container">

<?php

header('Content-type: text/xml');

if(!isset($_COOKIE['username']) || !isset($_COOKIE['password']))
{
 echo "<div id=\"catNav\">
	  <a href=\"events.php\"></a></div>
	  <div id=\"catBlock\" style=\"background:#000\">Not logged in</div>";
 exit;
}

include("dbInfo.php");
$con = mysql_connect($DB_HOST,$DB_USERNAME,$DB_PASSWD) or die("<xmlResponse><usrevterror>".mysql_error()."</usrevterror></xmlResponse>");
mysql_select_db($DB_DATABASENAME,$con) or die("<xmlResponse><usrevterror>".mysql_error()."</usrevterror></xmlResponse>");

$result = mysql_query("SELECT `eventID` FROM `registrations` WHERE `userID`='".$_COOKIE['username']."';");

	  echo "<div id=\"catNav\">
	  <a href=\"events.php\"></a></div>
	  <div id=\"catBlock\" style=\"background:#000\">Registration Details for ".$_COOKIE['username']."</div>
	  <div id=\"eventBlock\" style=\"background:#000\">
	  <div id=\"eventInfoBox\" style=\"margin:10px; padding:10px; background:#111; border:1px groove #444;\">
	  <table style=\"width:80%; margin:0 auto;\" cellpadding=\"5\" cellspacing=\"0\">";
	  $i=1;
	  while($row = mysql_fetch_array($result))
	  {
		$result1 = mysql_query("SELECT `eventID`,`vivacityName`,`root`,`path` FROM `events` WHERE `eventID`='".$row['eventID']."';");
		$row1 = mysql_fetch_array($result1);
		echo "<tr>";
		echo "<td style=\"text-align:left;\" width=\"40\">".$i++."</td>";
		echo "<td width=\"60\"><img src=\"".$row1['path']."\" width=\"60\" /></td>";
		echo "<td style=\"padding-left:20px;\">".$row1['vivacityName']."</td>";
		echo "<td><div class=\"btnRead\"><a href=\"events.php?cat=".$row1['root']."&amp;evt=".$row1['vivacityName']."\">READ MORE</a></div></td>";
		echo "<td><div class=\"btnClose\"><a href=\"javascript:deRegisterEvent(".$row1['eventID'].")\">X</a></div></td>";
		echo "</tr>";
	  }
	  echo "</table>";
	  echo "</div></div>";

mysql_close($con);

?>
</div>
<?php include('footer.html') ?>
</div>
</body>
</html>