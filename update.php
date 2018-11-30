<?php 

	include'connection.php';

	if($_GET['ID']) {

		$NAME 		= $_GET['name'];
		$PZN  		= $_GET['pzn'];
		$URL 	 	= $_GET['url'];
		$commentar  = $_GET['commentar'];
		$id    		= $_GET['ID'];

		$sql = "UPDATE person SET NAME = '$NAME', PZN = '$PZN', URL = '$URL', commentar = '$commentar' WHERE ID = $id";
		$con->query($sql);

		echo json_encode($sql);
	}

?>