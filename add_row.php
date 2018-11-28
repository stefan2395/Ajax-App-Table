<?php 
	include 'connection.php';
	session_start();
	

		$NAME 		= $_POST['name'];
		$PZN  		= $_POST['pzn'];
		$URL 	 	= $_POST['url'];
		$user       = $_SESSION['username'];

		$sql = "INSERT INTO person (NAME, PZN, URL, user) VALUES ('$NAME', '$PZN', '$URL', '$user')";
		
		$query = mysqli_query($con, $sql);
		
		if ($query) {
		    echo "New record created successfully.";
		    echo json_encode($query);
		} else {
		    echo "Error: " . $sql;
		}


?>