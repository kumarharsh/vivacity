<?php

include("dbInfo.php");
$con = mysql_connect($DB_HOST,$DB_USERNAME,$DB_PASSWD) or die(mysql_error());
mysql_select_db($DB_DATABASENAME,$con) or die(mysql_error());

$result = mysql_query("select u.name, u.college, e.realName, u.phone, u.email from events e, users u,registrations r where r.userID=u.userID and r.eventID=e.eventID order by e.realName");
echo "<html><title>Event Registrations</title><body><table>";
while($row = mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['college']."</td>";
	echo "<td>".$row['realName']."</td>";
	echo "<td>".$row['phone']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "</tr>";
}
echo "</table></body></html>";

mysql_close($con);

?>