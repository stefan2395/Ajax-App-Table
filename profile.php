<?php include 'header.php';  ?>


<div>


	<div class="welcome-title">
        	<h2>Hi, <span style="text-transform: capitalize;"><?php echo $username ?></span>!</h2>
	</div>

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

<script type="text/javascript" src="js/account-script/password-check.js"></script>
<script type="text/javascript" src="js/account-script/save-password.js"></script>
