<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>

<!DOCTYPE html>
<html>
	<head>
		<link href="calCss.css" rel="stylesheet" type="text/css" media="all" />
		<script language="JavaScript" type="text/javascript">
			var showmonth;
			var showyear;
			function initialCalendar()
			{
				var hr= new XMLHttpRequest();
				var url="calendar_start.php";
				var currentTime= new Date();
				var month= currentTime.getMonth()+1;
				
				var year=currentTime.getFullYear();
				showmonth=month;
				showyear=year;
				var vars="showmonth="+showmonth+"&showyear="+showyear;
				hr.open("POST",url,true);
				hr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				hr.onreadystatechange =function() {
					if (hr.readyState ==4 && hr.status==200){
						var return_data =hr.responseText;
						document.getElementById("showCalendar").innerHTML = return_data;
					}
				}
				hr.send(vars);
				document.getElementById("showCalendar").innerHTMl ="processing ...";
			}
		</script>
		
		<script language="JavaScript" type="text/javascript">
			function next_month()
			{
				var nextmonth =showmonth+1;
				if(nextmonth>12)
				{
					nextmonth =1;
					showyear =showyear +1;
				}
				showmonth=nextmonth;
				var hr= new XMLHttpRequest();
				var url="calendar_start.php";
				
				var vars="showmonth="+showmonth+"&showyear="+showyear;
				hr.open("POST",url,true);
				hr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				hr.onreadystatechange =function() {
					if (hr.readyState ==4 && hr.status==200){
						var return_data =hr.responseText;
						document.getElementById("showCalendar").innerHTML = return_data;
					}
				}
				hr.send(vars);
				document.getElementById("showCalendar").innerHTMl ="processing ...";
			}
		</script>
		
		<script language="JavaScript" type="text/javascript">
			function last_month()
			{
				var lastmonth =showmonth-1;
				if(lastmonth<1)
				{
					lastmonth =12;
					showyear =showyear -1;
				}
				showmonth=lastmonth;
				var hr= new XMLHttpRequest();
				var url="calendar_start.php";
				
				var vars="showmonth="+showmonth+"&showyear="+showyear;
				hr.open("POST",url,true);
				hr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				hr.onreadystatechange =function() {
					if (hr.readyState ==4 && hr.status==200){
						var return_data =hr.responseText;
						document.getElementById("showCalendar").innerHTML = return_data;
					}
				}
				hr.send(vars);
				document.getElementById("showCalendar").innerHTMl ="processing ...";
			}
		</script>
		<script type="text/javascript">
			function overlay(){
				e1=document.getElementById("overlay");
				e1.style.display= (e1.style.display=="block") ? "none" : "block";
				e1=document.getElementById("events");
				e1.style.display= (e1.style.display=="block") ? "none" : "block";
				e1=document.getElementById("eventsBody");
				e1.style.display= (e1.style.display=="block") ? "none" : "block";
			}
		</script>
		<script language="JavaScript" type="text/javascript">
		function show_details(theId){
			var deets=(theId.id);
			e1=document.getElementById("overlay");
			e1.style.display= (e1.style.display=="block") ? "none" : "block";
			e1=document.getElementById("events");
			e1.style.display= (e1.style.display=="block") ? "none" : "block";
			var hr= new XMLHttpRequest();
			var url="events.php";
				
			var vars="deets="+deets;
				hr.open("POST",url,true);
				hr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				hr.onreadystatechange =function() {
					if (hr.readyState ==4 && hr.status==200){
						var return_data =hr.responseText;
						document.getElementById("events").innerHTML = return_data;
					}
				}
				hr.send(vars);
				document.getElementById("events").innerHTMl ="processing ...";
		}
		</script>
	</head>
	
	<body onload="initialCalendar();">
		
		<div id="showCalendar"></div>
	<div id="overlay">
		<div id="events"></div>
	</div>
	</body>
</html>