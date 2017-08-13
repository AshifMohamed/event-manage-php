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
			
			.header{
				text-decoration:bold;
				text-align:center;
				margin-top: 50px;
				
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
			.para{
				font-size:24px;
				text-decoration:bold;
				color: black;
				font-weight: bolder;
				height:500px;
				width: 800px;
         		margin-left:250px;
         		background:url(groundtrans.png) ;
         		background-size:cover;
         		
			}
			body {background:url(cricket-stadium-backround2.jpg)}
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
		<div class="header" align="center" >
			<br /><h1>ABOUT US</h1>
		</div>

		<div class="para">
			<p><br />
				<p>MCC is the Sri Lankan leading cricket website and among the top Cricket websites in the Sri Lanka.</p><br />
<p>Founded in 2007,MCC's content includes about the details of the events venue date and time of all format of cricket matches and the registerd members can include the Events too..</p><br />
<p>This website was mainly created to findout the young talented people</p><br />
<p>Now a wholly owned subsidiary MCC has a thriving user community and reaches over 20 thousand users every month.</p><br />

<p>The editor is Ronnie.</p><br />

<p>In 2010 MCC became a part of BFCC | Press Release | Editor's Comment<br />

Registered office: 4 bloomwended avenue colombo -03,  Company no 4620511.

			</p>
		</div>
		<div id="footer">
	<div id="foot"><p>©Copyright Manchester Cricket Club</p></div>
</div>
	</body>
</html>

