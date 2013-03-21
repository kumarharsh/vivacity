<script type="text/javascript" src="javascript/login.js"></script>
<div id="logo">
<a href="home.php"><img src="css/images/logo-viva.png" alt="Logo" height="100px"  onmouseover="this.src='css/images/logo-viva-glow.png'" onmouseout="this.src='css/images/logo-viva.png'"/></a>
</div>
<div id="header">
	<a href="home.php?data=sponsors">
   	<div id="sponsors">
        	<div id="sponsorImage"></div>
            <div id="sponsorDesc"></div>
    </div>
    </a>
    <div id="login">
    <div id='loginBox' style="overflow: hidden; display: none; height: 85px;">
    <?php
		if(!isset($_COOKIE["username"]) || !isset($_COOKIE["password"]))
		{

			echo "<form>
					<label>Username</label>
					<input id='loginUsername'></input>
					<label>Password</label>
					<input id='loginPassword' type='password'></input>
				  </form>";
			echo "<div style=\"margin:0 auto; overflow:auto;\">
						<div class=\"btn\"><a href=\"register.php\">REGISTER</a></div>
						<div class=\"btn\"><a href=\"javascript:login();\">SIGN IN</a></div>
				  </div>";
		}
		else
		{
			echo "<div style=\"overflow:auto; margin:0 auto; font-size:10px; text-align:center; font-weight: bold; color:#000\">
					View your registration details<br/>
					<div class=\"btn\"><a href=\"javascript:logout();\">SIGN OUT</a></div>
					<div class=\"btn\"><a href=\"getUserEventsHTML.php\">EVENTS</a></div>
				  </div>";
		}
	?>    
	<div id="loginError"></div>
    </div>
    <div id="pull">
	<a href="javascript:;" onmousedown="toggleSlide('loginBox');">

    <?php
		if(!isset($_COOKIE["username"]) || !isset($_COOKIE["password"]))
			echo "<img src=\"css/images/signout.png\"/>&nbsp;Signed Out";
		else
			echo "<img src=\"css/images/signin.png\"/>&nbsp;Signed In (".$_COOKIE['username'].")";
	?>
    </a>
    </div>
    </div>
    
    
    <div id="links">
		<a href="http://www.facebook.com/pages/VIVACITY-2010/137100748250?ref=ts#"><img src="css/images/links/link-fb.png" onmouseover="this.height='40'" onmouseout="this.height='30'" alt="Facebook" /></a>
	    <a href="http://twitter.com/vivacity2010"><img src="css/images/links/link-twitter.png" alt="Twitter" onmouseover="this.height='40'" onmouseout="this.height='30'"/></a>
    	<a href="http://www.orkut.co.in/Main#Community?cmm=94300455"><img src="css/images/links/link-orkut.png" onmouseover="this.height='40'" onmouseout="this.height='30'" alt="Orkut" /></a>
	    <a href="http://www.youtube.com/user/vivacity2010"><img src="css/images/links/link-youtube.png" onmouseover="this.height='40'" onmouseout="this.height='30'" alt="Youtube" /></a>
    	<a href="http://vivacity.lnmiit.ac.in/updates/feeds.xml"><img src="css/images/links/link-rss.png" onmouseover="this.height='40'" onmouseout="this.height='30'" alt="RSS" /></a>
	</div>
	<ul id="menuBar">
        	<li><a href="home.php" 
            		onmouseover="this.style.color='#039'; this.style.fontSize='13px'"
                    onmouseout="this.style.color='#000';  this.style.fontSize='11px'">HOME</a></li>
			<li><a href="events.php"
            		onmouseover="this.style.color='#c00';  this.style.fontSize='13px'"
                    onmouseout="this.style.color='#000';  this.style.fontSize='11px'">EVENTS</a></li>
   			<li><a href="gallery.php"
               		onmouseover="this.style.color='#60c';  this.style.fontSize='13px'"
                    onmouseout="this.style.color='#000';  this.style.fontSize='11px'">GALLERY</a></li>
			<li><a href="home.php?data=schedule"
               		onmouseover="this.style.color='#880';  this.style.fontSize='13px'"
                    onmouseout="this.style.color='#000';  this.style.fontSize='11px'">SCHEDULE</a></li>
			<li><a href="home.php?data=travel"
            		onmouseover="this.style.color='#060';  this.style.fontSize='13px'"
                    onmouseout="this.style.color='#000';  this.style.fontSize='11px'">TRAVEL</a></li>
   			<li><a href="home.php?data=contact"
            		onmouseover="this.style.color='#c30';  this.style.fontSize='13px'"
                    onmouseout="this.style.color='#000';  this.style.fontSize='11px'">CONTACT US</a></li>
  			<?php if(!isset($_COOKIE['username']) || !isset($_COOKIE['password']))
					echo "<li><a href=\"register.php\"
              		onmouseover=\"this.style.color='#000';  this.style.fontSize='13px'\"
            		onmouseout=\"this.style.color='#000';  this.style.fontSize='11px'\">REGISTER</a></li>"; ?>
	</ul>
</div>
<div class="spacer" style="height:170px"></div>