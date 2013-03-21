<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vivacity 2010</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel='alternate' type='application/rss+xml' title='Vivacity RSS' href='updates/feeds.xml'> 
<script type="text/javascript" src="javascript/effects.js"></script>
<script type="text/javascript" src="javascript/updates.js"></script>
</head>

<body onload="showSponsors();">
<div id="main">
<?php include('updates.php');
	  include('header.php');
?>
<div class="container">
<?php
	if(!isset($_REQUEST["data"]) || $_REQUEST["data"]==="home")
		include("pages/home.html");
	else if($_REQUEST["data"]==="schedule")
		include("pages/schedule.html");
	else if($_REQUEST["data"]==="travel")
		include("pages/travel.html");
	else if($_REQUEST["data"]==="contact")
		include("pages/contact.html");
	else if($_REQUEST["data"]==="sponsors")
		include("pages/sponsors.html");
	else
		include("pages/home.html");
?>
</div>
</div>
<?php include('footer.html'); ?>
</body>
</html>
