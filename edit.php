<?php 
	
	require_once 'connection.php';

	if($_GET['ID']) {
		$id = $_GET['ID'];

		$sql = "SELECT * FROM person WHERE ID = {$id}";
		$result = $con->query($sql);

		$data = $result->fetch_assoc();

		$con->close();
	?>

<?php include 'header.php'  ?>

	<div class="content-table">
        <div class="welcome-title">
			<h3>Welcome 
				<span style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></span> 
			</h3>
		</div>

		<div class="udate-cont">

			<h3>Last updated</h3>

		    <div class="date-time-cont">
		        <!-- <h4><?php echo $data['DATE'] ?></h4> -->
		    </div>


		</div>

		<fieldset>

				<div class="details-buttons-container">
					<div class="title-details">
						<h3>Edit product</h3>
					</div>

					<div class="save-delete"></div>

					<h3 style="cursor: pointer; color: green;" onclick='handleUpdateClick(<?php echo $data['ID']?>);'>Save</h3>
     				<h3 style="cursor: pointer; color: red;" onclick="discard();">Discard</h3>
						<!-- <input type="hidden" name="ID" id="ID" value="<?php echo $data['ID']?>" /> -->
					</div>
				

					<table cellspacing="0" cellpadding="0" class="show-table">

						<tr>
							<th>Name</th>
							<td><input type="text" id="name" name="name" placeholder="NAME" value="<?php echo $data['NAME'] ?>" /></td>
						</tr>

						<tr>
							<th>Pzn</th>
							<td><input id="pzn" type="text" name="pzn" placeholder="PZN" value="<?php echo $data['PZN'] ?>"></input></td>
						</tr>

						<tr>
							<th>URL</th>
							<td><input id="url" type="text" name="url" placeholder="URL" value="<?php echo $data['URL'] ?>"></input></td>
						</tr>

					</table>
				</div>

			<div>
				<p><?php echo $initials; ?></p>
				<p><?php echo $data['update_row']; ?></p>

				<h4>Commentar</h4>
				<input id="commentar" type="text" name="commentar" placeholder="commentar" value="<?php echo $data['commentar'] ?>"></input>
			</div>

		<div id="update-response"></div>

		</fieldset>

	</div>

<?php include 'footer.php'; ?>
</body>
</html>

<?php
}
?>


<script>

   	// ===========> Update script <===========
	function handleUpdateClick(updateId) {

	    var name		= document.getElementById("name").value;
	    var pzn			= document.getElementById("pzn").value;
	    var url			= document.getElementById("url").value;
	    var commentar   = document.getElementById("commentar").value;
	    // var ID 			= document.getElementById("ID").value;

	    // Perform the AJAX request to update this use
	    var delRow 		= document.getElementById("updateRow");
	    // var varsSend	= "ID=" + updateId + "&name=" + name + "&pzn=" + pzn + "&url" + url;
	    var page 		= "update.php?ID=" + updateId + "&name=" + name + "&pzn=" + pzn + "&url=" + url + "&commentar=" + commentar;
	    var xmlhttp 	= new XMLHttpRequest();
	    // var delID		= "" + userId;
		htmlD 			= "";

		xmlhttp.open("GET", page, true);
        xmlhttp.send();

	  

	        xmlhttp.onreadystatechange = function() {
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
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
	// ===========> END: Update script <===========





   	// ===========> Sweetalert2 <===========

    // Discard button
    function discard() {
        swal({
            title: 'Discard changes?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, discard it!'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php';
            }
        })
    }

    // ===========> END: Sweetalert2 <===========



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