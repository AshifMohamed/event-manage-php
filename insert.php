
<?php
    $con=mysqli_connect("localhost", "root", "","ecalender");
	
	if(mysqli_connect_errno()){
		echo "Failed to connect ".mysqli_connect_error();
	}
	
	$date=$_POST['evdate'];
	$oppo=$_POST['opposition'];
	$ven=$_POST['venue'];
	
	$sql="insert into events(evdate,opposition,venue) values('$date','$oppo','$ven')";
	
	if(!mysqli_query($con, $sql))
	{
		die('Error:'.mysqli_error($con));
	}
	?>
        
        <?php
        echo "1 Event Added";
        header("Location: show_calendar.php");
        
	
?>