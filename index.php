<!DOCTYPE html>
<html>
<head>
	<title>Table JSON-AJAX</title>

	    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	



	<div class="content">

		<div class="button_container">
			<button id="click" >Show Table</button>
		</div>

		<div class="select_container">		
			<select name="" id="" onchange="onSelect(this.value);">
				<option value="">Select table</option>
				<?php 
					include 'connection.php';
					$tableSelect = mysqli_query($con, "SELECT * FROM person");
					$data = array();
					while ($row = mysqli_fetch_assoc($tableSelect)) {
						$data[] = $row;
						echo "<option value=".$row['id'].">".$row['NAME']."</option>";
					}
				?>
			</select>
		</div>


		<div class="form-popup">

			<form id="frm"  class="form__container" action="" method="post">	
				<!-- <a href="#" type="button" class="btn cancel">&times;</a> -->
				<ul>

					<li>
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
		<div class="table_container">


			<table>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Password</th>
					<th>Action</th>
				</tr>

				<tbody id="responsveTable">
					
				</tbody>

			</table>
		</div>
	</div>



</body>


<script type="text/javascript">
	

	// ===========> DISPLAY Table from Database JS <===========

	// call AJAX
	var ajax 		 = new XMLHttpRequest();
	var method 		 = "POST";
	var url 		 = "table.php";
	var asynchronous = true;

	ajax.open(method, url, asynchronous);
	// Sending AJAX request
	ajax.send();

	// receiving response from data.php
	ajax.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {

			// Converting JSON
			var data = JSON.parse(this.responseText);
			console.log(data);

			// html value
			var html = "";

			for (var a = 0; a < data.length; a++) {

				var id 			= data[a].id;
				var NAME   		= data[a].NAME;
				var PZN 		= data[a].PZN;
				

				html += "<tr>";
					html += "<td>" + id + "</td>";
					html += "<td>" + NAME + "</td>";
					html += "<td>" + PZN + "</td>";	
					html += "<td>" + 
									"<form id='delete' method='post' action=''>" + 
										"<input type='hidden' name='deleteRow'  value='<?php echo $row['id']; ?>'/>" + 
										"<button name='delete' class='delete' onclick='javascript:handleDeleteClick(event, <?php echo $row["id"]; ?>);'>Delete</button>" + 
									"</form>"
							"</td>";
				html += "</tr>";
			}

			document.getElementById("click").addEventListener("click",function (){
					document.getElementById("responsveTable").innerHTML = html;
			});
		}

	}
	// ===========> END: DISPLAY Table from Database JS <===========





		

		document.getElementById("submit").addEventListener("click", function () {

		//id from FORM 
		var name = document.getElementById("name");

		var a      = new XMLHttpRequest;
		var aGet   = 'POST';
		var aQuery = 'add_row.php';
		var aTrue  = true;
		var data   = "name=" + name + "&pzn=" + pzn;

			a.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					console.log("Added row");
				}
			}

			a.open(aGet, aQuery, aTrue);
			a.send(data);
		});	







	// ===========> SELECT list JS <===========
	function onSelect(str) {
		var s      = new XMLHttpRequest;
		var sGet   = 'GET';
		var sQuery = 'select.php?id='+str;
		var sTrue  = true;

		if (str.length == 0) {
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

					var id 			= data[a].id;
					var NAME   		= data[a].NAME;
					var PZN 		= data[a].PZN;
					

					html += "<tr>";
					html += "<td>" + id + "</td>";
					html += "<td>" + NAME + "</td>";
					html += "<td>" + PZN + "</td>";	
					html += "<td>" + 
									"<form id='delete' method='post' action=''>" + 
										"<input type='hidden' name='deleteRow'  value='<?php echo $row['id']; ?>'/>" + 
										"<button name='delete' class='delete' onclick='javascript:handleDeleteClick(event, <?php echo $row["id"]; ?>);'>Delete</button>" + 
									"</form>"
							"</td>";
				html += "</tr>";
				}

				document.getElementById("responsveTable").innerHTML = html;
			}
		}

		s.open(sGet, sQuery, sTrue);
		s.send();
	}
	// ===========> END: SELECT list JS <===========






	function handleDeleteClick(e, userId) {
	    e.preventDefault(); // Prevent default behaviour of this event (eg: submitting the form

	    // Perform the AJAX request to delete this user
	    var delRow = document.getElementById("deleteRow");
	    var page = "delete.php";
	    var parameters = 'delete=true&deleteRow=' + delRow;
	    var xmlhttp = new XMLHttpRequest();
		htmlD = "";

	    if (confirm('Are you sure you want to delete this?') == true) {

	    	

	        xmlhttp.onreadystatechange = function() {
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	                htmlD += "Successful DELETED";
	            }
	        }

	        xmlhttp.open("POST", page, true);
	        xmlhttp.send(parameters);
	    } else {
	    	htmlD += "Sometning went wrong!";
	    }

	    document.getElementById("delete-response").innerHTML = htmlD;
	}






	// function addRow() {

	// 	var ajaxA 		  = new XMLHttpRequest();
	// 	var methodA 	  = "GET";
	// 	var urlA 		  = "add_row.php";
	// 	var asynchronousA = true;

	// 	ajax.onreadystatechange = function() {
	// 		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
 //           		alert(xmlhttp.responseText); // Here is the response
 //        	} else {
 //        		alert('nope');
 //        	}

 //    		var username = document.getElementById('username').innerHTML;
 //    		var password = document.getElementById('password').innerHTML;
	// 	}

	// 	ajax.open(methodA, urlA, asynchronousA);
	// 	// Sending AJAX request
	// 	ajax.send("username=" + username + "&password=" + password);
	// }

</script>

</html>