<?php 
	session_start();
	$con = mysqli_connect("localhost","root",""); 
	mysqli_select_db($con,"schulcheck");

	if (!$con)
	{
	    die('Could not connect: ' . mysqli_error());
	}   
	
?>