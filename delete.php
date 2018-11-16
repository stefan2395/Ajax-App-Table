<?php 

	include 'connection.php';

	if (isset($_POST['delete'])) {

		$id = $_POST['id'];

		$sql = 'DELETE FROM login_table WHERE id = "'.$id.'" ';

		$result = mysqli_query($con,$sql);

		if(isset($result)) {
		   echo "YES deleted";
		} else {
		   echo "NO, its not deleted";
		}
	}
?>