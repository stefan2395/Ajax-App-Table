<?php 

	include 'connection.php';

	if (isset($_GET['ID'])) {

		$id = $_GET['ID'];

		$sql = 'DELETE FROM person WHERE ID = "'.$id.'" ';

		$result = mysqli_query($con,$sql);

		if(isset($result)) {
		   echo "YES deleted";
		} else {
		   echo "NO, its not deleted";
		}
		echo json_encode($result);
	}

?>