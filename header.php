 <?php 
 	// Connection for user. Same connection like connection.php, but with sessin_start();
	include 'conection-user.php';
	  
	// Back user to login page if not logen in
  	if (!isset($_SESSION['username'])){
        header('Location: login.php');
    }

    // Script display username, password nad email of user
	$username = $_SESSION["username"];

	$sql = "SELECT * FROM login_table WHERE username='$username'";
	$result = mysqli_query($con, $sql);

	if($row = mysqli_fetch_array($result)) {
	    $username   = $row["username"];
	    $password   = $row["password"];
	    $email 	    = $row["email"];
	    $initials   = $row["initials"];
	    $surname    = $row["surname"];
	}
	// END: Script display username, password, email, surname and initials of user



	// Script display count added rows from user
	$sqlCount = "SELECT count(*) user FROM person WHERE user = '".$_SESSION['username']."'";
	$resultCount = mysqli_query($con, $sqlCount);

 	if ($row = mysqli_fetch_assoc($resultCount)) {

     	$userCountRows = $row['user'];
	}
	// END: Script display count added rows from user




?>

<!DOCTYPE html>
<html>
<head>
	<title>Table JSON-AJAX</title>

	    <link rel="stylesheet" type="text/css" href="css/style.css">

     	<!-- JQuery libraly -->
	 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 	<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

</head>
<body>
	<header>
	 	<a href="index.php">Home</a>

		<div class="popup" onclick="popup()">My Account
		  	<div class="popuptext" id="myPopup">
		  		<a href="logout.php">
            		<p>Logout</p>
        		</a>
        		<a href="profile.php">
            		<p>Edit profile</p>
        		</a>
    		</div>
		</div>
	</header>