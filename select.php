<?php 
	include 'connection.php';

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$result = mysqli_query($con, "SELECT DISTINCT * FROM person WHERE id = $id");

		$data = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}	

		echo json_encode($data);
	}
	
?>