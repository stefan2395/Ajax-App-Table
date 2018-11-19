<?php 

	include 'connection.php';

	if (isset($_GET['ID'])) {

		$id = $_GET['ID'];

		$sql = 'DELETE FROM beta WHERE ID = "'.$id.'" ';

		$result = mysqli_query($con,$sql);

		if(isset($result)) {
		   echo "YES deleted";
		} else {
		   echo "NO, its not deleted";
		}
	}
?>