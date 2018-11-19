<?php 
	include 'connection.php';
	
	

		$name 		= $_POST['name'];
		$pzn  		= $_POST['pzn'];

		$sql = "INSERT INTO beta (name, email) VALUES ('$name', '$pzn')";
		
		$query = mysqli_query($con, $sql);
		
		if ($query) {
		    echo "New record created successfully.";
		    echo json_encode($query);
		} else {
		    echo "Error: " . $sql;
		}
	

?>