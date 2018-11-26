<?php 
	include 'connection.php';

	if (isset($_GET['ID'])) {
		$id = $_GET['ID'];

		$result = mysqli_query($con, "SELECT * FROM person WHERE ID = $id");

		$data = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}	

		echo json_encode($data);
	}
	
?>