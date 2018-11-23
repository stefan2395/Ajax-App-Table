<?php 
	// include 'header.php';
	require_once 'connection.php';

	if($_GET['ID']) {
		$id = $_GET['ID'];

		$sql = "SELECT * FROM beta WHERE ID = {$id}";
		$result = $con->query($sql);

		$data = $result->fetch_assoc();

		$con->close();

	?>

<?php include 'header.php'  ?>

	<a href="index.php">HOME</a>
	<div class="content-table">
        <div class="welcome-title">
			<h3>Welcome 
				<span style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></span> 
			</h3>
		</div>

		<div class="udate-cont">

			<h3>Last updated</h3>

		    <div class="date-time-cont">
		        <h4><?php echo $data['DATE'] ?></h4>
		    </div>


		</div>

		<fieldset>

				<div class="details-buttons-container">
					<div class="title-details">
						<h3>Edit product</h3>
					</div>

					<div class="save-delete">	
				</div>

				<form action="" method="POST">

						<input type="hidden" name="ID" id="ID" value="<?php echo $data['ID']?>" />
						<div class="save">
							<input name="save" id="save" type="submit" value="Save" onclick='handleUpdateClick(<?php echo $data['ID']?>);'>
								<!-- <img src="img/save.svg" alt=""> -->
								
							
						</div>
					</div>
				

					<table cellspacing="0" cellpadding="0" class="show-table">

						<tr>
							<th>Name</th>
							<td><input type="text" id="name" name="name" placeholder="name" value="<?php echo $data['name'] ?>" /></td>
						</tr>

						<tr>
							<th>Email</th>
							<td><input rows="4" id="email" type="text" name="email" placeholder="email" value="<?php echo $data['email'] ?>"></input></td>
						</tr>

					</table>
			
				</form>

		<div id="update-response"></div>
		<div id="txtHint"></div>
		</fieldset>

	</div>

</body>
</html>

<?php
}
?>


<script>
	function handleUpdateClick(updateId) {

	    var name		= document.getElementById("name").value;
	    var email		= document.getElementById("email").value;
	    var save		= document.getElementById("save").value;

	    // Perform the AJAX request to update this use
	    var delRow 		= document.getElementById("updateRow");
	    var varsSend	= "ID=" + updateId + "&name=" + name + "&email=" + email + "&save" + save;
	    var page 		= "update.php";
	    var xmlhttp 	= new XMLHttpRequest();
	    // var delID		= "" + userId;
		htmlD 			= "";

		xmlhttp.open("POST", page, true);
        xmlhttp.send(varsSend);

	    if (confirm('Are you sure you want to SAVE this?') == true) {

	        xmlhttp.onreadystatechange = function() {
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	                document.getElementById("update-response").innerHTML = "Successful SAVED";   
	                alert(xmlhttp.responseText);  
	            }
	        }

	        
	    } else {
	    	document.getElementById("update-response").innerHTML = "Sometning went wrong!";
	    }

	    document.getElementById("update-response").innerHTML = htmlD;
	}



/*
	function discard() {
		swal({
		  title: '<strong>Are you sure you do not want to save changes?</strong>',
		  type: 'info',
		  html:
		    '',
		  showCloseButton: true,
		  showCancelButton: true,
		  focusConfirm: false,
		  confirmButtonText:
		    '<a style="color:white;" href="index.php"> Yes</a>',
		  confirmButtonAriaLabel: 'Thumbs up, great!',
		  cancelButtonText:
		    '<a style="color:white;">No</a>',
		  cancelButtonAriaLabel: 'Thumbs down',
		})
	}




    $("#percentage").change(function () {
    var perc = parseFloat($("#purchase_price").val());
    var purch = parseFloat($("#percentage").val());

    $("#menu_price").val((purch * perc).toFixed(2));
	});
*/
</script>