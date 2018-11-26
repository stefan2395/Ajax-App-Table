<?php 
	include 'connection.php';
	
	

		$NAME 		= $_POST['name'];
		$PZN  		= $_POST['pzn'];
		$URL 	 	= $_POST['url'];

		$sql = "INSERT INTO person (NAME, PZN, URL) VALUES ('$NAME', '$PZN', '$URL')";
		
		$query = mysqli_query($con, $sql);
		
		if ($query) {
		    echo "New record created successfully.";
		    echo json_encode($query);
		} else {
		    echo "Error: " . $sql;
		}


?>