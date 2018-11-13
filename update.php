<?php 

	include'connection.php';

	$name  		= $_POST['name'];
	$email 		= $_POST['email'];
	$password 	= $_POST['password'];
	$id    		= $_POST['id'];

	$sql = "UPDATE users SET name = '{$name}', email = '{$email}', password = '{$password}' WHERE id = '{$id}'";
	$con->query($sql);

?>