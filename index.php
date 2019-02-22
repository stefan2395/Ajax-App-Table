<?php include 'header.php'  ?>
	

	<div class="content">
	 	

        <div class="welcome-title">
        	<h2>Welcome, <span style="text-transform: capitalize;"><?php echo $username ?></span>!</h2>
    	</div>

    	<div class="add-new">
    		<a href="add.php">Add new</a>
    	</div>
		
		<!-- BUTTONS container -->
    	<div class="buttons-container"> 

    		<!-- Button for display tables -->
			<ul class="buttons-click">
				<li><p id="all-click" onclick="toggleVisibility('All'); ">All services</p></li>
    			<li><p id="idealo-click" onclick="toggleVisibility('Idealo');">Idealo</p></li>
				<li><p id="medizine-click" onclick="toggleVisibility('Medizine');">Medizine</p></li>
			</ul>
			<!-- END: Button for display tables -->


			<!-- ====> CONTAINER display SERVICE and USER info <==== -->
			<!-- ALL services -->
			<div id="All" class="service-info">
				<div class="img-service">
	        		<img src="img/idealo.png" />
	        	</div>
	        	<div class="img-service">
	        		<img src="img/medizine.png" />
	        	</div>
	        	<div>
					
				</div>
			</div>
			
			<!-- IDEALO -->
			<div id="Idealo" style="display: none;" class="service-info">
				<table class="user-info">
					<tr>
						<th>Email</th><td><?php echo $password ?></td>
	        		</tr>
	        		
	        		<tr>
	        			<th>Password</th><td><?php echo $email ?></td>
	        		</tr>   

	        		<tr>
	        			<th>URL</th><td id="to-copy">Idealo.de <img width="20" height="20" src="img/copy.png" onClick="CopyToClipboard('to-copy')"> </td>
	        		</tr>  	

	        		<tr>
	        			<th>last updated</th><td><?php echo $updateRow ?> <a href="update-history.php">Add/View updates</a></td>
	        		</tr>
	    		</table>

	        	<div class="img-service"> 
	        		<img src="img/idealo.png" />
	        	</div>

			</div>
			
			<!-- MEDIZINE -->
			<div id="Medizine" style="display: none;" class="service-info">
				<table class="user-info">
					<tr>
						<th>Email</th><td><?php echo $password ?></td>
	        		</tr>
	        		
	        		<tr>
	        			<th>Password</th><td><?php echo $email ?></td>
	        		</tr> 

	        		<tr>
	        			<th>URL</th><td id="to-copy1">Medizine.de <img width="20" height="20" src="img/copy.png" onClick="CopyToClipboard1('to-copy1')"></td>
	        		</tr> 
					
					<tr>
	        			<th>last updated</th><td><?php echo $updateRow ?> <a href="update-history.php">Add/View updates</a></td>
	        		</tr>
	    		</table>

	        	<div class="img-service"> 
	        		<img src="img/medizine.png" />
	        	</div>


			</div>
			<!-- END: CONTAINER display SERVICE and USER info  -->
			
			
    	</div>
		<!-- END: BUTTONS container -->
		
		<div class="rows-count">
			<h3 id="rows-count"></h3>
			<h4 id="service-text"></h4>
		</div>


		<div class="select_container">		
			<select name="" id="" onchange="onSelect(this.value);">
				<option value="">Select table</option>
				<?php 
					include 'connection.php';
					$tableSelect = mysqli_query($con, "SELECT DISTINCT * 
													   FROM person 
													   GROUP BY NAME 
													   ORDER BY NAME asc");
					$data = array();
					while ($row = mysqli_fetch_assoc($tableSelect)) {
						$data[] = $row;
						echo "<option value=".$row['ID'].">".$row['NAME']."</option>";
					}
				?>
			</select>
		</div>
		
    
		</div>

		<!-- SHOW message when DELETE a row -->
		<h3 id="delete-response"></h3>

		<input type="text" id="mySearch" onkeyup="Search()" placeholder="Search for products.." title="Type in a name">
		<!-- SHOW tables when click on buttons -->
		<h3>List of products:</h3> <p id="Idealo-text" style="display: none;"> Idealo </p>
		
		<div id="responsveTable" class="sortDiv"></div>

	
		
	</div>

<?php include 'footer.php'; ?>



<style type="text/css">
	.active, .btn:hover {
	    background-color: #666;
	    color: white;
	}
</style>



<!-- INDEX PAGE script -->
	<!-- table script -->
	<script type="text/javascript" src="js/table-json/idealo-table.js"></script>
	<script type="text/javascript" src="js/table-json/medizine-table.js"></script>
	<script type="text/javascript" src="js/table-json/all-services.js"></script>
	<script type="text/javascript" src="js/table-json/search-table.js"></script>
	<script type="text/javascript" src="js/table-json/sort-table.js"></script>
	<script type="text/javascript" src="js/table-json/select-list-table.js"></script>
	<script type="text/javascript" src="js/table-json/delete-button-table.js"></script>
	<script type="text/javascript" src="js/table-json/delete-medizine.js"></script>
	<!-- END: table script -->

	<!-- buttons script -->
	<script type="text/javascript" src="js/buttons-index-script/copy-clipboard.js"></script>
	<script type="text/javascript" src="js/buttons-index-script/display-inf.js"></script>
	<!-- END: buttons script -->
<!-- END: INDEX PAGE script -->