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
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
		<style type="text/css">
		
			#main{background-color: white;
			height:100px
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
				
			}
		
			#header{
				position:relative;
				display:inline;
				width:100%;
				height: 32px;
				margin:0;
				background:#00A300;
				padding: 0;
				float: left;
			}
			
			
			body{
				margin: 0;
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
	<br />
	<br />
	
	</body>

<?php
    $showmonth= $_POST['showmonth'];
    $showyear=  $_POST['showyear'];
    
	$length=strlen($showmonth);
	if($length<=1)
	{
		$showmonth='0'.$showmonth;
	}
  
	$showmonth =preg_replace('#[^0-9]#i',"", $showmonth);
	$showyear =preg_replace('#[^0-9]#i',"", $showyear);
	
	$day_count=cal_days_in_month(CAL_GREGORIAN, $showmonth, $showyear);
	$pre_days =date('w',mktime(0,0,0, $showmonth,1,$showyear));
	$post_days=(6-(date('w',mktime(0,0,0, $showmonth,$day_count,$showyear))));

	//date('w')- returns the day of the week(0-sunday,6-saturday)
    echo'<div class="calendar_wrap">';
	echo'<div class="title_bar">';	
	echo'<div class="previous_month"><button type="submit" name="myBtn"  onClick="javascript:last_month();" ><</button></div>';
	echo'<div class="show_month">'.$showmonth."/ ".$showyear. '</div>';
	echo'<div class="next_month"><button type="submit" name="myBtn" onClick="javascript:next_month();" >></button></div>';
	echo '</div>';
	
	echo '<div class="week_days">';
	echo '<div class="days_of_week">Sun</div>';
	echo '<div class="days_of_week">Mon</div>';
	echo '<div class="days_of_week">Tue</div>';
	echo '<div class="days_of_week">Wed</div>';
	echo '<div class="days_of_week">Thur</div>';
	echo '<div class="days_of_week">Fri</div>';
	echo '<div class="days_of_week">Sat</div>';
	echo '<div class="clear"></div>';
	echo '</div>';//id=week_days
	
	
	// previous month filler days
	if ($pre_days !=0){
		for($i=1;$i<=$pre_days;$i++){
			echo '<div class="non_cal_day"></div>';
		}
	}
	//current month
	include 'connect.php';
	for ($i=1; $i <=$day_count ; $i++) { 
	//get event
	$lengthday=strlen($i);
	if($lengthday<=1)
	{
		$i='0'.$i;
	}
	$date=$showmonth.'/'.$i.'/'.$showyear;
	$query=mysqli_query($con,'select id from events where evdate="'.$date.'"');
	$num_rows =mysqli_num_rows($query);
	if($num_rows>0){
		$event="<button name='$date' type='submit' id='$date' onClick='javascript:show_details(this);'>View Events</button>";
	}
	//end get event
	 echo '<div class="cal_day">';
	echo '<div class="day_heading">'.$i.'</div>';
	//show event button
	if($num_rows !=0){
		echo "<div class='openings'><br /><br/><br/>". $event . "</div>";
	}
	//end button
	echo '</div>';
}
 
	//next month filler days
	 if($post_days !=0){
	 	for ($i=1; $i <$post_days ; $i++) { 
			 echo '<div class="non_cal_day"></div>';
		 }
	 }




?>
</html>