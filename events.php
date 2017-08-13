<?php
    $deets = $_POST ['deets'];
	$deets = preg_replace('#[^0-9/]#i','' , $deets);
	
	include 'connect.php';
	
	$events ='';
	$query =mysqli_query($con,'select opposition,venue from events where evdate ="'.$deets.'"');
	$num_rows=mysqli_num_rows($query);
	if($num_rows>0){
		$events  .='<div id="eventsControl"><button onMouseDown="overlay()">Close</button><br/><b> Date: '.$deets.'</b><br/></div>';
		
		while($row=mysqli_fetch_array($query)){
			$opp=$row['opposition'];
			$venue=$row['venue'];
			$events .='<div id="eventsBody">Opposition:'.$opp .'<br />Venue:'.$venue .'<br /><hr><br/></div>';
		}
	}
	echo $events;
    ?>