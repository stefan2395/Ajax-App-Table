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

					<h3 style="cursor: pointer; color: green;" onclick="handleUpdateClick(<?php echo $data['ID'];?>);">Save</h3>
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


<?php
}
?>

<script type="text/javascript" src="js/edit-script/edit-ajax.js"></script>
<script type="text/javascript" src="js/edit-script/discard-button.js"></script>
