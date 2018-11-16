<?php 
	include 'connection.php';
	
	if ($_POST['submit']) {
		$username 		= $_POST['username'];
		$password  		= $_POST['password'];

		$sql = "INSERT INTO login_table (username, password) VALUES ('$username', '$password')";
		
		$query = mysqli_query($con, $sql);
		
		if ($query) {
		    echo "New record created successfully.";
		} else {
		    echo "Error: " . $sql;
		}

	}


?>