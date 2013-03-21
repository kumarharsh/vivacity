<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vivacity 2010</title>
<link href="css/index.css" rel="stylesheet" type="text/css">
<link href="css/events.css" rel="stylesheet" type="text/css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
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
	$xml = simplexml_load_file('Scripts/events.xml') or die ("Loading of Events Failed");
	if(!isset($_REQUEST["evt"]))
	{
		if(!isset($_REQUEST["cat"]))
			echo "<div id=\"catBlock\">All Events</div>";
		else
		{
			echo "<div id=\"catNav\">";
			$cur=$_REQUEST["cat"];
 			foreach($xml->CAT as $p)
				if(!strcmp($_REQUEST["cat"],$p->NAME))
				 { 
				 	echo "<a href=\"events.php?cat=".$p->ROOT."\"></a>";
					break;
				 }
			echo "</div>";
			echo "<div id=\"catBlock\">".$cur."</div>";
		}
	}
	else
	{
		echo "<div id=\"catNav\">";
		foreach($xml->EVT as $p)
				if(!strcmp($_REQUEST["evt"],$p->V))
				 { 
				 	echo "<a href=\"events.php?cat=".$p->ROOT."\"></a>";
					break;
				 }
		echo "</div>";
		echo "<div id=\"catBlock\">".$_REQUEST["evt"]."</div>";
	}
	?>
    <div id="eventBlock">
	<div class=\"eventBlock_inside\">
    <div id="eventHolder">
    <?php
	$t="";
	if(!isset($_REQUEST["cat"]) && !isset($_REQUEST["evt"]))
	{
		foreach($xml->CAT as $x)
		{
	     if(!strcmp("All Events",$x->ROOT))
		 { 
			$t = "<div class=\"cat\">\n
             	  <a href=\"events.php?cat=".$x->NAME."\"><div class=\"catImg\"><img src=\"".$x->PATH."\"/></div></a>\n
			 	  <a href=\"events.php?cat=".$x->NAME."\"><div class=\"catDesc\">".$x->NAME."</div></a>\n
			 	  </div>\n";
			echo $t;
		 }
		}
	}
	else if(!isset($_REQUEST["evt"]) && isset($_REQUEST["cat"]))
	{
		foreach($xml->CAT as $x)
		{
	     if(!strcmp($_REQUEST["cat"],$x->ROOT))
		 { 
			$t = "<div class=\"cat\">\n
             	  <a href=\"events.php?cat=".$x->NAME."\"><div class=\"catImg\"><img src=\"".$x->PATH."\"/></div></a>\n
			 	  <a href=\"events.php?cat=".$x->NAME."\"><div class=\"catDesc\">".$x->NAME."</div></a>\n
			 	  </div>\n";
			echo $t;
		 }
		}
		if($t==="")
		{
		 foreach($xml->EVT as $y)
		 {
	       if(!strcmp($_REQUEST["cat"],$y->ROOT))
		   {
			$t = "<div class=\"cat\">\n
				    <a href=\"events.php?cat=".$y->ROOT."&amp;evt=".$y->V."\">
					  <div class=\"catImg\"><img src=\"".$y->PATH."\"/></div>
					</a>\n
				    <a href=\"events.php?cat=".$y->ROOT."&amp;evt=".$y->V."\">
					<div class=\"catDesc\" 
						onmouseover=\"this.innerHTML='".$y->R."'\"
						onmouseout=\"this.innerHTML='".$y->V."'\">".$y->V."</div></a>\n
				  </div>";
			echo $t;
		   }
		 }
		}
	}
	else
	{
		foreach($xml->EVT as $y)
		{
	       if(!strcmp($_REQUEST["evt"],$y->V))
		   {
		echo "<script type=\"text/javascript\">
	  			function writeInfo(x)
				{
				var t;
				switch(x)
				{
				case 1 : t=\"$y->DESC\";
					break;
				case 2 : t=\"$y->RULES\";
					break;
				case 3 : t=\"$y->PRIZE\";
					break;
				case 4 : t=\"$y->CONTACT\";
					break;
				default : t=\"<br />Incorrect Option Chosen\";
				}
				document.getElementById('eventInfoBox').innerHTML=t;
			}
			</script>";
			$t = "<div id=\"event\">
				  <ul id=\"eventMenu\">\n";
			switch($y->EVENTID)
			{
				case 69 : $t=$t."<li><a href=\"http://www.sunnyvaghela.com/lnmiit.html\" target=\"_blank\">REGISTER</a></li>\n";
					break;
				case 59 : $t=$t."<li><a href=\"http://iupc.lnmiit.ac.in\" target=\"_blank\">REGISTER</a></li>\n";
					break;
				default : $t=$t."<li><a href=\"#\" onclick=\"registerEvent(".$y->EVENTID.");\">REGISTER</a></li>\n";
			}
			$t=$t."<li><a href=\"#\" onclick=\"writeInfo(1);\">
							DESCRIPTION</a></li>\n
						<li><a href=\"#\" onclick=\"writeInfo(2);\">
							RULES</a></li>\n
						<li><a href=\"#\" onclick=\"writeInfo(3);\">
							PRIZES</a></li>\n
						<li><a href=\"#\" onclick=\"writeInfo(4);\">
							CONTACTS</a></li>\n
				  </ul>\n
				  <div id=\"eventImg\"><img src=\"".$y->PATH."\"/></div>\n
				  <div id=\"eventInfoBox\">".$y->DESC."</div>\n
				  </div>";
			echo $t;
		   }
		}
	}
	
	?>
		</div>
	  </div>
   </div>
 </div>
</div>

<?php include('footer.html') ?>
</body>
</html>