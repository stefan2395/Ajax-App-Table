<?php 

	include 'connection.php';

	if (isset($_GET['id'])) {

		$id = $_GET['id'];

		$sql = 'DELETE FROM person WHERE id = "'.$id.'" ';

		$result = mysqli_query($con,$sql);

		if(isset($result)) {
		   echo "YES deleted";
		} else {
		   echo "NO, its not deleted";
		}
		echo json_encode($result);
	}

?>