<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$fname=  mysql_real_escape_string($_POST['fname']);
	$lname=  mysql_real_escape_string($_POST['lname']);
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	$repass = md5(mysql_real_escape_string($_POST['repass']));
	
	if($upass!=$repass)
	{
		?>
        <script>alert('password not matched ');</script>
        <?php
	}
	else
	
	if(mysql_query("INSERT INTO users(fname,lname,username,email,password) VALUES('$fname','$lname','$uname','$email','$upass')"))
	{
		?>
        <script>alert('successfully registered ');</script>
        <?php
	}
	else
	{
		?>
        <script>alert('error while registering you...');</script>
        <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<style>
	body{
	

}
#header{
	background:#000000;
}
	table{
		margin-right: 200px;
	}
	
	#welcome{
		font-size: 50px;
		font-weight: bolder;
		margin-top:200px;
		margin-left: 60px;
		
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
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
		<div style="background-color:#D2D2D2" id="header" >
	<div id="left">
    <label><img src="eventpic.png" height="55px"/></label>
    </div>
       <div id="right">
    	<div id="content">
        </div>
    </div>
</div>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="700px" border="0">
<tr>
	<td><input type="text" name="fname" placeholder="First Name" required= /></td>
	<td><input type="text" name="lname" placeholder="Last Name" required="" /></td>
</tr>
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
<td><input type="password" name="repass" placeholder="Retype Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup" >Sign Me Up</button></td>
</tr>
<tr>
<td><a href="index.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
<div id="footer">
	<div id="foot"><p>©Copyright Manchester Cricket Club</p></div>
</div>
</body>
</html>