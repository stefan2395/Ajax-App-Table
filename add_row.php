<?php 
	include 'connection.php';
	
	

		$name 		= $_POST['name'];
		$email  	= $_POST['email'];
		$url 	 	= $_POST['url'];

		$sql = "INSERT INTO beta (name, email, url) VALUES ('$name', '$email', '$url')";
		
		$query = mysqli_query($con, $sql);
		
		if ($query) {
		    echo "New record created successfully.";
		    echo json_encode($query);
		} else {
		    echo "Error: " . $sql;
		}


?>