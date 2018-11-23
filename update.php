<?php 

	include'connection.php';

	if(isset($_POST['submit'])) {

		$name  		= $_POST['name'];
		$email 		= $_POST['email'];
		$id    		= $_POST['ID'];

		$sql = "UPDATE beta SET name = '$name', email = '$email' WHERE ID = $id";
		$con->query($sql);

		echo json_encode($sql);
	}

?>