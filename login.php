


<?php


 //Start the Session

require_once 'conection-user.php'; 


//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$user = $_POST['username'];
$pass = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `user_table` WHERE username='$user' and password='$pass'";
 
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['username'] = $user;
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
	$user = $_SESSION['username'];
	header('Location: index.php');
 
}else{

	if (!empty($user)) {

		echo "<h3 style='color:red;'>Error username or password</h3>";

	}
	// echo "Error to login";
}


?>



<!doctype html>
 	<html>
 	    <head>
 	        <meta charset="utf-8">
 	        <title></title>
 	        <link rel="stylesheet" href="css/style.css">
 	        <!-- <script src="js/main.js"></script> -->
 	    </head>
 	    <body>
 	<div class="login-container">

	      <form class="login-form" method="POST" action="#">
	        
			<div class="inko-img">
				<!-- <img src="img/logo_inko-versand_login.svg" alt=""> -->
			</div>

			<h2 class="form-signin-heading">Inko-versand login for Idealo</h2>

	        <div class="input-login login-width">
	        	<p id="name-error"></p>
		  		<label class="input-group-addon" id="basic-addon1">
		  			<p>username</p>
		  		</label>

		  		<input id="username" type="text" name="username" class="form-control" placeholder="Username" required>
			</div>

			<div class="input-login login-width">
	        	<label for="inputPassword" class="sr-only">
	        		<p>Password</p>
	        	</label>

	        	<input id="password" type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
	        </div>

	        <input class="" type="submit" onclick="return validateFrom();" value="Login">
	        
	        <div id="messageDiv"></div><!-- Display error message -->

	      </form>
	</div>
 	    </body>
 	</html>
 	 	

<!-- Validation form login-->
<script>
	function validateFrom() {
		var errorMsg = '';

		var username = document.getElementById('username').value;
		var password = document.getElementById('password').value;

		if (username == null || username == '') {
			errorMsg += '<br><p style="color:red;"> You must enter a Username</p>';
		}

		if (password == null || password == '') {
			errorMsg += '<p style="color:red;"> You must enter a Password</p>';
		} 

		var messageDiv = document.getElementById('messageDiv');

		messageDiv.innerHTML = errorMsg;

		if (errorMsg == '') {
			return true;
		} else {
			return false;
		}
	}
</script>
