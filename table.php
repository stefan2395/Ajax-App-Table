<?php

	include("connection.php");

	$result = mysqli_query($con,"SELECT * FROM person ORDER BY ID DESC");

	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}

	echo json_encode($data);
?>