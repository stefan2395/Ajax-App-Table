<?php include 'header.php';  ?>


<div>


	<div class=""> 
			<h3>Row added: <?php echo $userCountRows ?></h3>
			<h3>Last legged in <span style="color: blue;"><?php echo $last_login; ?></span></h3>

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
	                    <input type="submit" name="submit" value="Change password" onclick="savePassword(<?php echo $id; ?>)">
	                </li>

	                <span id="no-match-pass" style="color: red;"></span>

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
			document.getElementById('no-match-pass').innerHTML = '';
		} else {
			message.style.color = 'red';
			message.innerHTML = 'not matching';
		}

		if (changepass == '' || repeatpass == '') {
			message.innerHTML = '';
		}
	}
	// ===========> END: Check if new password same as repeat password value <===========







   	// ===========> Save password script <===========
	function savePassword(saveId) {

		var oldpass 	= document.getElementById('oldpass').value;
		var changepass  = document.getElementById('changepass').value;
		var repeatpass  = document.getElementById('repeatpass').value;
	    // var ID 			= document.getElementById("ID").value;

		if (changepass !== repeatpass || changepass == '' || repeatpass == '') {
			if (changepass !== repeatpass) {
				document.getElementById('no-match-pass').innerHTML = 'Passwords do not match';
			}

	        if (changepass == '') {
				document.getElementById('changepass').style.border = "solid red";
			} else {
				document.getElementById('changepass').style.border = "";
			}

			if (repeatpass == '') {
				document.getElementById('repeatpass').style.border = "solid red";
			} else {
				document.getElementById('repeatpass').style.border = "";
			}
		} else {
			// Perform the AJAX request to update this use
		    var delRow 		= document.getElementById("updateRow");
		    var page 		= "change-password.php?id=" + saveId + "&oldpass=" + oldpass + "&changepass=" + changepass + "&repeatpass=" + repeatpass;
		    var xmlhttp 	= new XMLHttpRequest();

			htmlD 			= "";

			xmlhttp.open("POST", page, true);
	        xmlhttp.send();

	         xmlhttp.onreadystatechange = function() {
		            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	            	 	// Save button sweetalert2
				            swal({
				                position: 'top-end',
				                type: 'success',
				                title: 'Your work has been saved',
				                showConfirmButton: false,
				                timer: 1500
				            }).then(() => {
				                window.location = 'index.php';
				            })
			            // EDN: Save button sweetalert2 
		            } 
		        }  
		}

	}
	// ===========> END: Save password script <===========


</script>