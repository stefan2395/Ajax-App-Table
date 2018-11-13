<?php 

	include 'connection.php';

	$name 		= $_POST['name'];
	$email 		= $_POST['email'];
	$password   = $_POST['password'];

	$sql = "INSERT INTO users (name, email, password) VALUES ('{$name}', '{$email}', '{$password}' )";
	$con->query($sql);

	echo "<td>{$name}</td>";
	echo "<td>{$email}</td>";
	echo "<td>{$password}</td>";

?>