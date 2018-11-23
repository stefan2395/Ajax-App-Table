<?php include 'header.php'  ?>
<body>
	

	<div class="content">

		<div class="popup" onclick="popup()">My Account
		  	<div class="popuptext" id="myPopup">
		  		<a href="logout.php">
            		<p>Logout</p>
        		</a>
    		</div>
		</div>
	 	

        <div class="welcome-title">
        	<h2>Welcome, <span style="text-transform: capitalize;"><?php echo $username ?></span>!</h2>
    	</div>

    	<div class="add-new">
    		<a href="add.php">Add new</a>
    	</div>
		
		<!-- BUTTONS container -->
    	<div class="buttons-container"> 

    		<!-- Button for display tables -->
			<ul>
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
					$tableSelect = mysqli_query($con, "SELECT DISTINCT * FROM beta GROUP BY name");
					$data = array();
					while ($row = mysqli_fetch_assoc($tableSelect)) {
						$data[] = $row;
						echo "<option value=".$row['ID'].">".$row['name']."</option>";
					}
				?>
			</select>
		</div>
		
    
		</div>

		<!-- SHOW message when DELETE a row -->
		<h3 id="delete-response"></h3>

		<!-- SHOW tables when click on buttons -->
		<h3>List of products:</h3> <p id="Idealo-text" style="display: none;"> Idealo </p>
		<div id="responsveTable">
			
		</div>


		
	</div>


</body>
</html>






<script type="text/javascript">

	
	// ===========>  When the user clicks on div, open the popup, ACCOUNT BUTTON <===========
	function popup() {
	    var popup = document.getElementById("myPopup");
	    popup.classList.toggle("show");
	}
	// ===========> END: When the user clicks on div, open the popup, ACCOUNT BUTTON <===========




	// ===========> Button for copy text to clipboard <===========
		// --> IDEALO <--
	function CopyToClipboard1 (containerid) {
		  // Create a new textarea element and give it id='temp_element'
		  var textarea = document.createElement('textarea')
		  textarea.id = 'temp_element'
		  // Optional step to make less noise on the page, if any!
		  textarea.style.height = 0
		  // Now append it to your page somewhere, I chose <body>
		  document.body.appendChild(textarea)
		  // Give our textarea a value of whatever inside the div of id=containerid
		  textarea.value = document.getElementById(containerid).innerText
		  // Now copy whatever inside the textarea to clipboard
		  var selector = document.querySelector('#temp_element')
		  selector.select()
		  document.execCommand('copy')
		  // Remove the textarea
		  document.body.removeChild(textarea)
	}


		// --> MEDIZINE <--
	function CopyToClipboard (containerid) {
		  // Create a new textarea element and give it id='temp_element'
		  var textarea = document.createElement('textarea')
		  textarea.id = 'temp_element'
		  // Optional step to make less noise on the page, if any!
		  textarea.style.height = 0
		  // Now append it to your page somewhere, I chose <body>
		  document.body.appendChild(textarea)
		  // Give our textarea a value of whatever inside the div of id=containerid
		  textarea.value = document.getElementById(containerid).innerText
		  // Now copy whatever inside the textarea to clipboard
		  var selector = document.querySelector('#temp_element')
		  selector.select()
		  document.execCommand('copy')
		  // Remove the textarea
		  document.body.removeChild(textarea)
	}
	// ===========> END: Button for copy text to clipboard <===========





	// ===========> On click DISPLAY IMAGE and USER info <===========
    var divs = ["All", "Idealo", "Medizine"]; // Add name to the array and call it like id to your html tag and call from --> onclick="function" <--
    var visibleDivId = null;
    function toggleVisibility(divId) {
      	if(visibleDivId === divId) {
   	 		visibleDivId = null;
      	} else {
        	visibleDivId = divId;
      	}
      hideNonVisibleDivs();
    }

    function hideNonVisibleDivs() {
      	var i, divId, div;
      	for(i = 0; i < divs.length; i++) {
        divId = divs[i];
        div = document.getElementById(divId);
        	if(visibleDivId === divId) {
          		div.style.display = "block";
        	} else {
          		div.style.display = "none";
        	}
      	}
    }
    // ===========>END: On click DISPLAY IMAGE and USER info <===========


  





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

			html += '<table border="1" cellspacing="0" cellpadding="0" id="myTable" id="pagination" class="sortable table pagination">' +
				'<thead>' +
                     '<tr>'   +
                        '<th>' + 'ID' 	  + '</th>' +
                        '<th>' + 'Name'   + '</th>' +
                        '<th>' + 'Email'  + '</th>' +
                        '<th>' + 'Action' + '</th>' +
                   '</tr>' +
                '</thead>';

            html += "<tbody>";
			for (var a = 0; a < data.length; a++) {

				var ID 			= data[a].ID;
				var name   		= data[a].name;
				var email 		= data[a].email;
				var url			= data[a].url;
				

				html += "<tr>";
					html += "<td>" + ID + "</td>";
					html += "<td>" + name + "</td>";
					html += "<td>" + email + "</td>";	
					html += "<td>" + 
									"<form id='delete' method='Get' action=''>" + 
										"<input type='hidden' name='deleteRow'  value="+ID+"/>" + 
										"<button name='delete' class='delete' onclick='handleDeleteClick(event, "+ID+");'>Delete</button>" + 
									"</form>" +
									"<a href='show.php?ID="+ID+"'>Show</a><br>" + 
									"<a href='edit.php?ID="+ID+"'>Edit</a><br>" +
									"<a target='_blank' href='"+url+"'>URL</a>" +
							"</td>";
				html += "</tr>";
			}
			html += "</tbody>";
			html += '</table>';


			document.getElementById("idealo-click").addEventListener("click",function (){
					document.getElementById("responsveTable").innerHTML = html;
					document.getElementById("rows-count").innerHTML = data.length;
					document.getElementById("service-text").innerHTML = 'Idealo products';
			});

			
		}

	}


    /////////// Pokazuje element na drugom mestu (edit-js) ///////////
    
    
	// ===========> END: DISPLAY Table from Database JS <===========




	// ===========> When click on --> All services <-- Table hide <===========
 	document.getElementById("all-click").addEventListener("click",function (){
		document.getElementById("responsveTable").innerHTML= '';
		document.getElementById("rows-count").innerHTML = '';
	});
 	// ===========> END: When click on --> All services <-- Table hide <===========




	// ===========> DISPLAY Table Medizine from Database JS <===========

	// call AJAX
	var ajax 		 = new XMLHttpRequest();
	var method 		 = "POST";
	var url 		 = "medizine.php";
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

			html += '<table border="1" cellspacing="0" cellpadding="0" id="myTable" id="pagination" class="sortable table pagination">' +
				'<thead>' +
                     '<tr>'   +
                        '<th>' + 'city_id' 	  + '</th>' +
                        '<th>' + 'ity_name'   + '</th>' +
                        '<th>' + 'state_id'   + '</th>' +
                        '<th>' + 'Action' 	  + '</th>' +
                   '</tr>' +
                '</thead>';

			for (var a = 0; a < data.length; a++) {

				var city_id 			= data[a].city_id;
				var city_name   		= data[a].city_name;
				var state_id 			= data[a].state_id;
				

				html += "<tr>";
					html += "<td>" + city_id   + "</td>";
					html += "<td>" + city_name + "</td>";
					html += "<td>" + state_id  + "</td>";	
					html += "<td>" + 
									"<form id='delete' method='post' action=''>" + 
										"<input type='hidden' name='deleteRow'  value="+city_id+"/>" + 
										"<button name='delete' class='delete' onclick='handleDeleteClick(event, "+city_id+");'>Delete</button>" + 
									"</form>"
							"</td>";
				html += "</tr>";
			}
			html += '</table>';

			document.getElementById("medizine-click").addEventListener("click",function (){
					document.getElementById("responsveTable").innerHTML = html;
					document.getElementById("rows-count").innerHTML = data.length;
					document.getElementById("service-text").innerHTML = 'Medizinfucks products';
			});


		}

	}
	// ===========> END: DISPLAY Table from Database JS <===========










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
		                html +=  "<td>" + 
											"<form id='delete' method='post' action=''>" + 
												"<input type='hidden' name='deleteRow'  value="+ID+" />" + 
												"<button name='delete' class='delete' onclick='handleDeleteClick(event, "+ID+");'>Delete</button>" +
											"</form>" +
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
	    // var delID		= "" + userId;
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


 //  	// ===========> Count rows <===========
 //    var rows = document.getElementById("myTable").getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;
 //    console.log(rows);
 //    document.getElementById("rows-count").innerHTML = rows;
	// // ===========> END Count rows <===========

</script>

</html>