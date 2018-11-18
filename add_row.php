<?php 
	include 'connection.php';
	
	if (isset($_POST)) {

		$name 		= $_POST['name'];
		$pzn  		= $_POST['pzn'];

		$sql = "INSERT INTO person (NAME, PZN) VALUES ('$name', '$pzn')";
		
		$query = mysqli_query($con, $sql);
		
		if ($query) {
		    echo "New record created successfully.";
		} else {
		    echo "Error: " . $sql;
		}

		echo json_encode($query);
	}
	

?>