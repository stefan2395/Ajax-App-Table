<!DOCTYPE html>
<html>
<head>
	<title>Table JSON-AJAX</title>

	    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	



	<div class="content">


		<div class="select_container">		
			<select name="" id="" onchange="onSelect(this.value);">
				<option value="">Select table</option>
				<?php 
					include 'connection.php';
					$tableSelect = mysqli_query($con, "SELECT DISTINCT * FROM beta GROUP BY name");
					$data = array();
					while ($row = mysqli_fetch_assoc($tableSelect)) {
						$data[] = $row;
						echo "<option value=".$row['ID'].">".$row['name']."</option>";
					}
				?>
			</select>
		</div>


		<div class="form-popup">

			<form id="frm"  class="form__container" action="" method="post" onsubmit="addRow()">	
				<!-- <a href="#" type="button" class="btn cancel">&times;</a> -->
				<ul>

					<li><p id="require"></p>
						<label>Username</label>
						<input type="text" name="name" id="name">	
					</li>

					<li>
						<label>Pssword</label>
						<input type="text" name="pzn" id="pzn">
					</li>

					<li>
						<label>Submit</label>
						<input type="submit" name="submit" id="submit" value="submit">
					</li>

				</ul>
			</form>

		</div>


<h3 id="delete-response"></h3>
		
	</div>

<table border="1" cellspacing="0" cellpadding="0" id="myTable" id="pagination" class="sortable table pagination"><!-- Start table -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="responsveTable">
                <?php
                	include 'connection.php';

                	$sql = "SELECT * FROM beta";
                    $result = $con->query($sql);
         
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { ?>
                            <tr class="inko-product" id="<?php echo strtolower($row['ID']); ?>">
                                <td><?php echo $row['ID']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td>  
                                        <div class='img-cont delete'>
                                        	<form id='delete' method='post' action=''>
	                                        	<input type='hidden' name='deleteRow' value='<?php echo $row['ID']; ?>'/>
	                                            <button name='delete' class='delete' onclick='handleDeleteClick(event, <?php echo $row["ID"]; ?>);'>Delete</button>
	                                        </form>
                                        </div>
                                    </a>
                                  
                                </td>
                            </tr>
                        <?php }
                    } else {
                        echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
                    }
                ?>
                </tbody>
            </table><!-- END table -->

</body>


<script type="text/javascript">
	

	// ===========> DISPLAY Table from Database JS <===========

	// call AJAX
	// var ajax 		 = new XMLHttpRequest();
	// var method 		 = "POST";
	// var url 		 = "table.php";
	// var asynchronous = true;

	// ajax.open(method, url, asynchronous);
	// // Sending AJAX request
	// ajax.send();

	// // receiving response from data.php
	// ajax.onreadystatechange = function() {
	// 	if (this.readyState == 4 && this.status == 200) {

	// 		// Converting JSON
	// 		var data = JSON.parse(this.responseText);
	// 		console.log(data);

	// 		// html value
	// 		var html = "";

	// 		for (var a = 0; a < data.length; a++) {

	// 			var ID 			= data[a].ID;
	// 			var name   		= data[a].name;
	// 			var email 		= data[a].email;
				

	// 			html += "<tr>";
	// 				html += "<td>" + ID + "</td>";
	// 				html += "<td>" + name + "</td>";
	// 				html += "<td>" + email + "</td>";	
	// 				html += "<td>" + 
	// 								"<form id='delete' method='post' action=''>" + 
	// 									"<input type='hidden' name='deleteRow'  value='<?php echo $row['ID']; ?>'/>" + 
	// 									"<button name='delete' class='delete' onclick='handleDeleteClick(event, <?php echo $row["ID"]; ?>);'>Delete</button>" + 
	// 								"</form>"
	// 						"</td>";
	// 			html += "</tr>";
	// 		}

	// 		document.getElementById("click").addEventListener("click",function (){
	// 				document.getElementById("responsveTable").innerHTML = html;
	// 		});
	// 	}

	// }
	// ===========> END: DISPLAY Table from Database JS <===========





		
	// ===========> ADD row to Table Database JS <===========
		 function addRow() {

			//id from FORM inputs
			var name  = document.getElementById("name").value;
			var pzn   = document.getElementById("pzn").value;
			var aData = new FormData();
			aData.append('name', name);
			aData.append('pzn', pzn);

			var a      = new XMLHttpRequest;
			var aGet   = 'POST';
			var aQuery = 'add_row.php';
			var aTrue  = true;

			// checks if the fields are filled
			if(name == "" || pzn == ""){
				document.getElementById("require").innerHTML = "Please enter your details";
				return;
			} else {
				document.getElementById("require").innerHTML = "The order was added";
			}

			a.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					
				}
			}

			// alert(name + " " + pzn);
			a.open(aGet, aQuery, aTrue);
			a.send(aData);
		}	
	// ===========> END: ADD row to Table Database JS <===========







	// ===========> SELECT list JS <===========
	function onSelect(str) {
		var s      = new XMLHttpRequest;
		var sGet   = 'GET';
		var sQuery = 'select.php?ID='+str;
		var sTrue  = true;

		if (str.length == '') {
			document.getElementById("responsveTable").innerHTML = '';
		}

		s.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {

			// Converting JSON
			var data = JSON.parse(this.responseText);
			console.log(data);

			// html value
			var html = "";

				for (var a = 0; a < data.length; a++) {

					var ID 				= data[a].ID;
					var name   			= data[a].name;
					var email 			= data[a].email;
					

					html += "<tr>";
						html += "<td>" + ID + "</td>";
						html += "<td>" + name + "</td>";
						html += "<td>" + email + "</td>";	
						html += "<td>" + 
										"<?php include 'connection.php';

					                	$sql = "SELECT * FROM beta";
					                    $result = $con->query($sql);
					                    while($row = $result->fetch_assoc()) { ?>" +

											"<form id='delete' method='post' action=''>" + 
												"<input type='hidden' name='deleteRow'  value='<?php echo $row['ID']; ?>'/>" + 
												"<button name='delete' class='delete' onclick='javascript:handleDeleteClick(event, <?php echo $row["ID"]; ?>);'>Delete</button>" +
											"</form>" +
											
										"<?php } ?>"
								"</td>";
					html += "</tr>";
				}

				if (html == 1) {
					document.getElementById("responsveTable").innerHTML = html;
				} else {
					document.getElementById("responsveTable").innerHTML = html;
				}
			}
		}

		s.open(sGet, sQuery, sTrue);
		s.send();
	}
	// ===========> END: SELECT list JS <===========






	function handleDeleteClick(e, userId) {
	    e.preventDefault(); // Prevent default behaviour of this event (eg: submitting the form

	    // Perform the AJAX request to delete this user
	    var delRow 		= document.getElementById("deleteRow");
	    var page 		= "delete.php?ID=" + userId;
	    var xmlhttp 	= new XMLHttpRequest();
		htmlD 			= "";

	    if (confirm('Are you sure you want to delete this?') == true) {

	        xmlhttp.onreadystatechange = function() {
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	                document.getElementById("delete-response").innerHTML = "Successful DELETED";
	            }
	        }

	        xmlhttp.open("GET", page, true);
	        xmlhttp.send();
	    } else {
	    	document.getElementById("delete-response").innerHTML = "Sometning went wrong!";
	    }

	    document.getElementById("delete-response").innerHTML = htmlD;
	}




</script>

</html>