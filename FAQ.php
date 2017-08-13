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
	
		<div class="regi">
		<h1><b>FAQs</b></h1><br/>
		
		<p>
			1.How do i find more information and contact information of Kollupity Cricket Club?<br/>
				See the <B>About Us</B> page through the Club page.
				Information such as club contact names,email addresses and location of the club.<br/>
				You can also contact Club Sports Staff, if you have any general questions about the Club.<br /><br/>
			2.What's Kollupity Cricket Club?<br />
			It's a Cricket club for young cricket players.<br/><br/>
			3.Does the Club have try-outs?<br/>
			Club is open to anyone who want play proffessional Cricket.<br/><br/>
			4.How do I play for Club Cricket Team?<br/>
			Schedule a meeting with head coach of the cricket club.<br/><br/>
			5.How do I sign-up?<br/>
			See the Sign-up in the Home Page.<br/><br/>
		</p>
		</div>
		<div id="footer">
	<div id="foot"><p>©Copyright Manchester Cricket Club</p></div>
</div>
	
	</body>
</html>

