<?php 

	include'connection.php';

	if(isset($_POST['save'])) {

		$NAME  		= $_POST['NAME'];
		$PZN 		= $_POST['PZN'];
		$URL 		= $_POST['URL'];
		$id    		= $_POST['ID'];

		$sql = "UPDATE person SET NAME = '$NAME', PZN = '$PZN', URL = '$URL' WHERE ID = $id";
		$con->query($sql);

		echo json_encode($sql);
	}

?>