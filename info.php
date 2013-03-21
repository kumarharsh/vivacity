<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vivacity 2010</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/features.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> 
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
	$xml = simplexml_load_file('Scripts/events.xml') or die ("Loading of Events Failed");
	echo "<div id='featBox'>";
	echo "<div id='cur_feat'>
    	    <div id='cur_img'><img src='feature/feat_01.jpg'/></div>
            <div id='cur_info'>The vivacity WHAT'S HOT feature is in beta stage as of now... lets see if i can implement this before 10th... If this is done then i'd be so... happie !!!</div>
	      </div>";
	echo "<div id='thumb_featBox'>
		  <ul class='thumb_feat'>";
    foreach($xml->FEATURE as $f)
		echo "<li><img src=\"".$f->image." width="100" height="100" onclick=\"loadFeat(".$id.")\" /></li>";
	echo "</ul>
	      </div>";
	echo "</div>";
?>
</div>
</div>
<?php include('footer.html'); ?>
</body>
</html>