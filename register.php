<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vivacity 2010 : Register</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
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
<script type="text/javascript" src="javascript/register.js"></script>
<script src="javascript/cal/jscal2.js"></script>
<script src="javascript/cal/lang/en.js"></script>

<link type="text/css" rel="stylesheet" href="css/cal/jscal2.css" />
<link type="text/css" rel="stylesheet" href="css/cal/border-radius.css" />
<link id="skin-win2k" title="Win 2K" type="text/css" rel="alternate stylesheet" href="css/cal/win2k/win2k.css" />
<link id="skinhelper-compact" type="text/css" rel="alternate stylesheet" href="css/cal/reduce-spacing.css" />

<div class="block_inside" style="background:none; width:600px; margin:0 auto">
    <div id="regError">	</div>
	<form onkeypress="if(event && event.which==13) registerMe(); else if(window.event && window.event.keyCode==13) registerMe();">
    	<label class="formHeader">LOGIN DETAILS</label>
        <div class="formWrapper">
		<label>Username</label>	<input type="text" id="username" size="30"/>
    		<div class="formAnnotation">Username is subject to availability</div>
		<label>Password</label>	<input type="password" id="password" size="30" maxlength="45" />
            <div class="formAnnotation">Password should be atleast 6 characters long</div>
   		<label>Re-Type Password</label><input type="password" id="repassword" size="30" maxlength="45" />
            <div class="formAnnotation">Make sure the two match!</div> <br />
		</div>
    	<label class="formHeader">PERSONAL DETAILS</label> <br />
        <div class="formWrapper">
    	<label>Name</label>			<input type="text" id="name" size="30" />
      		<div class="formAnnotation">&nbsp;</div>
        <label>Contact No</label>		<input type="text" id="phone" size="30" />
			<div class="formAnnotation">If you want SMS updates, give a Mobile Number formatted as : +91xxxxxxxxxx</div>
        <label>E-Mail</label>		<input type="text" id="email" size="30" />
      		<div class="formAnnotation">&nbsp;</div>
        <label>Gender</label>	<select id="gender">
        							<option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
      		<div class="formAnnotation">&nbsp;</div>
        <label>Date Of Birth</label>        
        <input name="date" value="" id="dateOfBirth" size="25" type="text">
       	<img src="css/images/cal.gif" style="margin-left:5px;" width="16" height="16" border="0" alt="Calendar" id="calTrigger"/>
		<script type="text/javascript">
                  new Calendar({
                          inputField: "dateOfBirth",
                          dateFormat: "%B %d, %Y",
                          trigger: "calTrigger",
                          bottomBar: false,
                          onSelect: function() {
                                  var date = Calendar.intToDate(this.selection.get());
                                  LEFT_CAL.args.min = date;
                                  LEFT_CAL.redraw();
                                  this.hide();
                          }
                  });
                  function clearRangeStart() {
                          document.getElementById("f_rangeStart").value = "";
                          LEFT_CAL.args.min = null;
                          LEFT_CAL.redraw();
                  };
                </script>


<!--        <input name="date" value="" id="dateOfBirth" size="25" type="text">
		<a href="javascript:NewCal('dateOfBirth','ddmmmyyyy',false,24)">
        	<img src="css/images/cal.gif" width="16" height="16" border="0" alt="Calendar"/></a>  -->
   		<div class="formAnnotation">MonthName MM, YYYY</div> <br />
		</div>
    	<label class="formHeader">ACADEMIC DETAILS</label> <br />
        <div class="formWrapper">
        <label>College</label>	<input type="text" id="college" size="50" />
      		<div class="formAnnotation">&nbsp;</div>
        <label>Course</label>	<input type="text" id="course" size="50" />
      		<div class="formAnnotation">&nbsp;</div>
        <label>Semester / Year</label>	<input type="text" id="semester" size="8" />
      		<div class="formAnnotation">&nbsp;</div>
		<label>City</label>	<input type="text" id="city" size="50" />
      		<div class="formAnnotation">&nbsp;</div>
		</div>
      <br />
      <div class="btnRegister"><a href="#" onclick="registerMe();" >REGISTER</a></div>
	</form>
</div>
</div>
<div class="spacer"></div>
<div class="spacer"></div>
<div class="spacer"></div>
</div>
<?php include('footer.html') ?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
</body>
</html>
