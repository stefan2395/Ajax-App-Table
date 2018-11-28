<?php include 'header.php'  ?>


<?php   

  	$oldpw = $_POST['oldpass'];
  	$newpw = $_POST['changepass'];
  	$conpw = $_POST['repeatpass'];
  	// $currentpw = $_SESSION['password'];

if (isset($_POST['submit'])) {
	
  // check whether username exists 
  $query = "SELECT password FROM login_table WHERE username= '" . $_SESSION['username'] . "' AND password='$oldpw'";
  //----------------------------------no quotes^^^^^^^--single-quotes^^^^^^^^^^^^^^^^
  // Also adds a check that $oldpass is correct!

  	$result = mysqli_query($con, $query);
	if(!$result) {
	  // This is ambiguous. It should probably show an error related to the query, not connection
	  	$message = "<p class='message'>Error: Coud not connect to the database.</p>" ;
	}else {
      // This should only be done if a row was returned previously
      // Test with mysqli_num_rows()
      	if (mysqli_num_rows($result) > 0) {
        

        // Adds single quotes to the username here too...
        $query = "UPDATE login_table SET password = '$newpw' WHERE username = '" . $_SESSION['username'] . "'";
        mysqli_query($con, $query) or
              die("Insert failed. " . mysqli_error($con));
        $message = "<p class='message'>Your password has been changed!</p>";
        echo $message;

        // Process further here 
        mysqli_free_result($result);
      	}
      	else {
         	$message = "<h4>Password not correct!</h4>";
      	}
  	}
}

?>

<div>


	<div class=""> 
			<h3>Row added: <?php echo $userCountRows ?></h3>

			<h3>Basic info</h3>
			
			<!-- Account Info -->
			<ul class="account-info">
				<li>
					<label>Name</label><br> 
					<input type="text" value="<?php echo $username ?>">
				</li><br>

				<li>
					<label>Surname</label><br> 
					<input type="text" value="<?php echo $surname ?>">
				</li><br>
				
  				<li>
  					<label>Initials</label><br>
  					<input type="text" value="<?php echo $initials ?>">
  				</li><br>

  				<li>
  					<label>Email</label><br>
  					<input type="text" value="<?php echo $email ?>">
  				</li>	
  			</ul>
			<!-- END: Account Info -->



			<!-- Change PASSWORD -->
            <ul class="change-password">
            	<form action="#" method="post" id="password-form">
	                <li>
	                    <label>Old password</label><br>
	                    <input type="text" name="oldpass" id="oldpass" value="<?php echo $password; ?>">
	                    <p class="error"><span id="empty-pass-old" style="color: red;"></span></p>
	                </li><br>

	                <li>
	                    <label>Change password</label><br>

	                    <input type="password" name="changepass" id="changepass" onkeyup="check();">
	                    <p class="error"><span id="empty-pass-change" style="color: red;"></span></p>
	                </li><br>

	                <li>
	                    <label>Repeat new password</label><br>
	                    <input type="password" name="repeatpass" id="repeatpass" onkeyup="check();"> 
	                    <span id='message'></span>

						<p class="error"><span id="empty-pass-repeat" style="color: red;"></span></p>
	                </li><br>

	                <li>
	                    <input type="submit" name="submit" value="submit">
	                </li>
	                <p><?php echo $message; ?></p>
	                <span id="no-match-pass" style="color: red;"></span>
            	</form>
            </ul>
            <!-- END Change PASSWORD -->

	</div>

</div>

<?php include 'footer.php'; ?>


<script>
	// ===========> Check if new password same as repeat password value <===========
	function check() {
		var changepass = document.getElementById('changepass').value;
		var repeatpass = document.getElementById('repeatpass').value;
		var message    = document.getElementById('message');

		if (changepass == repeatpass) {
			message.style.color = 'green';
			message.innerHTML = 'matching';
		} else {
			message.style.color = 'red';
			message.innerHTML = 'not matching';
		}

		if (changepass == '' || repeatpass == '') {
			message.innerHTML = '';
		}
	}
	// ===========> END: Check if new password same as repeat password value <===========







	// ===========> Check if input value password empty and display a message <===========

	document.getElementById("password-form").onsubmit = function () {
		var oldpass 	= document.getElementById('oldpass').value;
		var changepass  = document.getElementById('changepass').value;
		var repeatpass  = document.getElementById('repeatpass').value;

		var submit = true; 

		// if (oldpass == '') {
		// 	document.getElementById('oldpass').style.border = "solid red";
		// 	submit = false;
		// } else {
		// 	document.getElementById('oldpass').style.border = "solid green";
		// }

		if (changepass == '') {
			document.getElementById('changepass').style.border = "solid red";
			submit = false;
		} else {
			document.getElementById('changepass').style.border = "solid green";
		}

		if (repeatpass == '') {
			document.getElementById('repeatpass').style.border = "solid red";
			submit = false;
		} else {
			document.getElementById('repeatpass').style.border = "solid green";
		}

		if (changepass !== repeatpass) {
			document.getElementById('no-match-pass').innerHTML = 'Passwords do not match';
			document.getElementById('repeatpass').style.border = "solid red";
			document.getElementById('changepass').style.border = "solid red";
			submit = false;
		}

		return submit;	
	}





	/* 	******* 																		 *******
	   	******* BAG --> Ova skripta sluzi da nadje koji je id aktivan 
	   		   i kada se unese nesto u polje da u istom trenutku obrise error poruku ******* 
	   	******* 																		 ******* */
	// function removeWarning() {
 //    	document.getElementById(this.id + "_error").innerHTML = '';
	// }

	// 	document.getElementById("empty-pass-old").onkeyup	  = removeWarning;
	// 	document.getElementById("empty-pass-change").onkeyup  = removeWarning;
	// 	document.getElementById("empty-pass-repeat").onkeyup  = removeWarning;
	/* 	******* 																		 *******
   		******* BAG --> Ova skripta sluzi da nadje koji je id aktivan 
   		   i kada se unese nesto u polje da u istom trenutku obrise error poruku 		 ******* 
   		******* 																		 ******* */

	// ===========> END: Check if input value password empty and display a message <===========


</script>