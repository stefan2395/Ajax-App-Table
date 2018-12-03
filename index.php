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
					$tableSelect = mysqli_query($con, "SELECT DISTINCT * FROM person GROUP BY NAME");
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
</body>
</html>


<style type="text/css">
	.active, .btn:hover {
	    background-color: #666;
	    color: white;
	}
</style>



<script type="text/javascript">

	// ===========>  Search table --> FROM w3s site <===========
	function Search() {
		const input = document.getElementById('mySearch')
		const filter = input.value.toLowerCase()
		const table = document.getElementById('search')
		const tr = [...table.getElementsByTagName('tr')]

		tr.forEach((t) => {
			const foundMatch = [...t.getElementsByTagName('td')].some((td) => {
		  	return td.innerHTML.toLowerCase().indexOf(filter) > -1
		})
			if (foundMatch) {
			  	t.style.display = ''
			} else {
			  	t.style.display = 'none'
			}
		})
	}
	// ===========>  Search table --> FROM w3s site <===========




	// ===========>  Sort table --> FROM w3s site <===========
    function sortTable(n) {
	var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
	table = document.getElementById("myTable");
	switching = true;
	//Set the sorting direction to ascending:
	dir = "asc"; 
	/*Make a loop that will continue until
	no switching has been done:*/
		while (switching) {
			//start by saying: no switching is done:
			switching = false;
			rows = table.rows;
			/*Loop through all table rows (except the
			first, which contains table headers):*/
			for (i = 1; i < (rows.length - 1); i++) {
				//start by saying there should be no switching:
				shouldSwitch = false;
				/*Get the two elements you want to compare,
				one from current row and one from the next:*/
				x = rows[i].getElementsByTagName("TD")[n];
				y = rows[i + 1].getElementsByTagName("TD")[n];
				/*check if the two rows should switch place,
				based on the direction, asc or desc:*/
			  	if (dir == "asc") {
					if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
						//if so, mark as a switch and break the loop:
						shouldSwitch= true;
						break;
					}
			  	} else if (dir == "desc") {
				    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
						//if so, mark as a switch and break the loop:
						shouldSwitch = true;
						break;
				    }
			  	}
			}
			if (shouldSwitch) {
				/*If a switch has been marked, make the switch
				and mark that a switch has been done:*/
				rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
				switching = true;
				//Each time a switch is done, increase this count by 1:
			  switchcount ++;      
			} else {
			  /*If no switching has been done AND the direction is "asc",
			  set the direction to "desc" and run the while loop again.*/
			  if (switchcount == 0 && dir == "asc") {
				    dir = "desc";
				    switching = true;
			   	}
			}	
		}
	}
    // ===========> END: Sort table --> FROM w3s site <===========






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
                 	'<tr>' +
                        '<th class="sort" onclick="sortTable(0)">' + 'ID' 	  + '</th>' +
                        '<th class="sort" onclick="sortTable(1)">' + 'Name'  + '</th>' +
                        '<th class="sort" onclick="sortTable(2)">' + 'Pzn'   + '</th>' +
                        '<th>' + 'Action' + '</th>' +
                   '</tr>' +
                '</thead>';

            html += "<tbody id='search'>";
			for (var a = 0; a < data.length; a++) {

				var ID 			= data[a].ID;
				var NAME   		= data[a].NAME;
				var PZN 		= data[a].PZN;
				var URL			= data[a].URL;
				

				html += "<tr>";
					html += "<td>" + ID + "</td>";
					html += "<td>" + NAME + "</td>";
					html += "<td>" + PZN + "</td>";	
					html += "<td>" + 
									"<form id='delete' method='Get' action=''>" + 
										"<input type='hidden' name='deleteRow'  value="+ID+"/>" + 
										"<button name='delete' class='delete' onclick='handleDeleteClick(event, "+ID+", this);'>Delete</button>" + 
									"</form>" +
									"<a href='show.php?ID="+ID+"'>Show</a><br>" + 
									"<a href='edit.php?ID="+ID+"'>Edit</a><br>" +
									"<a target='_blank' href='"+URL+"'>URL</a>" +
							"</td>";
				html += "</tr>";
			}
			html += "</tbody>";
			html += '</table>';





			document.getElementById("idealo-click").addEventListener("click",function (){
					document.getElementById("responsveTable").innerHTML = html;
					document.getElementById("rows-count").innerHTML 	= data.length;
					document.getElementById("service-text").innerHTML 	= 'Idealo products';
			});
			/////////// Pokazuje element na drugom mestu (edit-js) ///////////
			
		}

	}
    
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
                        '<th>' + 'id' 	      + '</th>' +
                        '<th>' + 'name'       + '</th>' +
                        '<th>' + 'Brand'      + '</th>' +
                        '<th>' + 'Action' 	  + '</th>' +
                   '</tr>' +
                '</thead>';

            html += '<tbody id="search">';
			for (var a = 0; a < data.length; a++) {

				var id 			= data[a].id;
				var nickname    = data[a].nickname;
				var lastname 	= data[a].lastname;
				

				html += "<tr>";
					html += "<td>" + id   + "</td>";
					html += "<td>" + nickname + "</td>";
					html += "<td>" + lastname  + "</td>";	
					html += "<td>" + 
									"<button name='delete' class='delete' onclick='handleDeleteClick(event, "+id+");'>Delete</button>" + 
							"</td>";
				html += "</tr>";
			}
			html += '</tbody>';
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

			html += '<table border="1" cellspacing="0" cellpadding="0" id="myTable" id="pagination" class="sortable table pagination">' +
				'<thead>' +
                     '<tr>'   +
                        '<th>' + 'id' 	  + '</th>' +
                        '<th>' + 'name'   + '</th>' +
                        '<th>' + 'Brand'   + '</th>' +
                        '<th>' + 'Action' 	  + '</th>' +
                   '</tr>' +
                '</thead>';

               


				for (var a = 0; a < data.length; a++) {

					var ID 				= data[a].ID;
					var NAME   			= data[a].NAME;
					var EMAIL 			= data[a].EMAIL;
					

					html += "<tr>";
						html += "<td>" + ID + "</td>";
						html += "<td>" + NAME + "</td>";
						html += "<td>" + EMAIL + "</td>";	
		                html +=  "<td>" + 
											"<form id='delete' method='post' action=''>" + 
												"<input type='hidden' name='deleteRow'  value="+ID+" />" + 
												"<button name='delete' class='delete' onclick='handleDeleteClick(event, "+ID+",this);'>Delete</button>" +
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






	function handleDeleteClick(e, userId, r) {

		swal({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		})

		if (confirmButtonText) {
    		e.preventDefault(); // Prevent default behaviour of this event (eg: submitting the form

		    // Perform the AJAX request to delete this user
		    var delRow 		= document.getElementById("deleteRow");
		    var page 		= "delete.php?ID=" + userId;
		    var xmlhttp 	= new XMLHttpRequest();
		    // var delID		= "" + userId;
			htmlD 			= "";

	        xmlhttp.onreadystatechange = function() {
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               		var i = r.parentNode.parentNode.parentNode.rowIndex;
					document.getElementById("myTable").deleteRow(i);
	            }
	        }

	        xmlhttp.open("GET", page, true);
	        xmlhttp.send();

	        swal(
				'Deleted!',
				'Your file has been deleted.',
				'success'
		    )
		} 
	 
    }
	




</script>

</html>