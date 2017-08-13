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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" href="style.css" type="text/css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Kollupitty Cricket Club-FAQs</title>
		<style type="text/css">
		body {background:url(background_calendar.jpg)}
	
		.regi{
         margin-left: 200px;
         }
         #header1{
				position:relative;
				display:inline;
				width:100%;
				height: 32px;
				margin:0;
				background:#00A300;
				padding: 0;
				float: left;
			}
			
			#footer{
				background-color: #515151;
				position: absolute;
    			bottom: 0px;
    			width: 100%;
    			height:50px;
			}
			
			#foot{
				margin-top:10px;
				text-align: center;
			}
			#ev{
				margin-right:10px;
				float: right;
			}
			#back{
				width:100%;
				background-color: green;
			}
		
		#ag {
				width: 57%;
				margin: 0 auto;
				float: left;
				
				
				
				
			}

			ul#nav {
				position:absolute;
				bottom:0;
				font-family: Verdana;
				font-size: 14px;
				list-style: none;
				margin: 0 auto;
				padding: 0;
				width: 1000px;
				height: 100%;
			}

			#nav li {
				display: inline;
			}

			#nav li a {
				text-decoration: none;
				display: block;
				padding: 6px 15px;
				color: #eee;
				float: left;
				text-align: center;
				
			}
			#nav li a:hover {
				background: white;
				display: block;
				color: #000;
				border-top: 1px solid white;
				border-right: 2px solid white;
				border-bottom: 1px solid white;
				border-left: 1px solid white;
			}
			
</style>
	</head>
	<body>
		<div id="header">
	<div id="left">
    <label><img src="eventpic.png" height="55px"/></label>
    </div>
    <div id="right">
    	<div id="content">
        	Hi  ' <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
    
    </div>
		<div id="header1">
	
	
	
	<div id="ag">
			<ul id="nav">
				<li>
					<a href="home.php">Home</a>
				</li>
				<li>
					<a href="FAQ.php">FAQ</a>
				</li>
				<li>
					<a href="about.php">About Us</a>
				</li>
				<li>
					<a href="contact.php">Contact Us</a>
				</li>
				<li>
					<a href="show_calendar.php"> show events</a>
				</li>
			</ul>
			
		
	</div>
	</div>
	<div  style="margin-left: 0.6%;margin-top: 1.5%; float: left;height: 150%;width:65%">
			<h1 style="color: red;padding-left: 1%;margin-bottom: 1%;float: 10">CONTACT US</h1>
			<br />

			<h3 style="color: red;padding-left: 1%;margin-bottom: 0%;padding-bottom: 0">AG Mohammed</h3>
			<p style="color: black;padding-left: 1%">
				Email - agmohammed1@gmail.com
				<br />
				Phone Number - +94776916988
				<br />
			</p>

			<h3 style="color: red;padding-left: 1%;margin-bottom: 0%;padding-bottom: 0">Mohammed Ashif</h3>
			<p style="color: black;padding-left: 1%">
				Email - ashifm4@gmail.com
				<br />
				Phone Number - +94778582995
				<br />
			</p>

			<h3 style="color: red;padding-left: 1%;margin-bottom: 0%;padding-bottom: 0">Apisajan Rajamohan </h3>
			<p style="color: black;padding-left: 1%">
				Email - apisajan@ymail.com
				<br />
				Phone Number - +94750766788
				<br />
			</p>

			
			<h3 style="color: red;padding-left: 1%;margin-bottom: 0%;padding-bottom: 0">Kaushekan Ravichandran</h3>
			<p style="color: black;padding-left: 1%">
				Email - kaushek.kr@gmail.com
				<br />
				Phone Number - +94777532068
				<br />
			</p>
			
			<h3 style="color: red;padding-left: 1%;margin-bottom: 0%;padding-bottom: 0">Nahanaa Gunasekaran </h3>
			<p style="color: black;padding-left: 1%">
				Email - nahanaag@yahoomail.com
				<br />
				Phone Number - +94774937448
				<br />
			</p>
			
			<h3 style="color: red;padding-left: 1%;margin-bottom: 0%;padding-bottom: 0">Divvyashini Ganeshamoorthy </h3>
			<p style="color: black;padding-left: 1%">
				Email - divvyashini196@gmail.com
				<br />
				Phone Number - +94775725612
				<br />
			</p>


</div>
<div id="footer">
	<div id="foot"><p>©Copyright Manchester Cricket Club</p></div>
</div>
	</body>
</html>