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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
<style type="text/css">

			body{
				background-image: url("red_cricket_ball.jpg");
				background-size:cover;
			}
			
		#next{
			margin-right:30px;
			height: 487px;
		}
		table{
			
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
			#event{
				width: 1000px;
				float: right;
				margin-top:5px;
				height:550px;
				
			}
			#ev{
				float:left;
				width: 720px;
				
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
<div id="event">
	<div id="ev">
	<form action="insert.php" method="post">
			<table width="700px" height="350px"  border="0">
				<caption>ADD AN EVENT</caption>
				<tr>
		<td>Event Date:</td><td><input type="text" name="evdate" required placeholder="mm/dd/yyy"/></tr><br />
		<tr>
		<td>Opposition :</td><td><input type="text" name="opposition" required /></td></tr><br />
		<tr>
		<td>Venue :</td><td><input type="text"  name="venue" required/></td></tr><br />
		<tr>
		<td></td><td><button type="submit" name="submit" >Add Event</button></td></tr>
		</table>
		</form>
		</div>
<div id="next">
	<br /><br /><br /><br />
	<h1>Upcoming Events</h1><br />
	    <?php
$today=date	("m/d/Y");
$d=strtotime("+7 days");
$upcoming=date("m/d/Y ", $d);
	
	include 'connect.php';
		
		$events ='';
		$query =mysqli_query($con,'select opposition,venue,evdate from events where evdate between "'.$today.'" and  "'.$upcoming.'" ');
		$num_rows=mysqli_num_rows($query);
		
			
			
			while($row=mysqli_fetch_array($query)){
				$date=$row['evdate'];
				$opp=$row['opposition'];
				$venue=$row['venue'];
				$events .='<b><h2>Date : '.$date.'<br/> Opposition:'.$opp .'<br />Venue:'.$venue .'<br /><hr><br/></h2></b>';
			}
		
		echo $events;
		?>

</div>
</div>
<div id="footer">
	<div id="foot"><p>©Copyright Manchester Cricket Club</p></div>
</div>
</body>
</html>