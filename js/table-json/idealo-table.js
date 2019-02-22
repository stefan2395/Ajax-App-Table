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
						'<th class="sort" onclick="sortTable(0)">' + 'ID' 	       + '</th>' +
						'<th class="sort" onclick="sortTable(1)">' + 'User'        + '</th>' +
                        '<th class="sort" onclick="sortTable(1)">' + 'Name'        + '</th>' +
						'<th class="sort" onclick="sortTable(2)">' + 'Pzn'   	   + '</th>' +
						'<th class="sort" onclick="sortTable(2)">' + 'Data/Time'   + '</th>' +
						'<th>' 									   + 'Action' 										   + '</th>' +
                   '</tr>' +
                '</thead>';

            html += "<tbody id='search'>";
			for (var a = 0; a < data.length; a++) {

				var ID 			= data[a].ID;
				var updateRow   = data[a].update_row;
				var user   		= data[a].user;
				var NAME   		= data[a].NAME;
				var PZN 		= data[a].PZN;
				var URL			= data[a].URL;
				

				html += "<tr>";
					html += "<td>" + ID + "</td>";
					html += "<td>" + user + "</td>";
					html += "<td>" + NAME + "</td>";
					html += "<td>" + PZN + "</td>";
					html += "<td>" + updateRow + "</td>";	
					html += "<td>" + 
									"<button name='delete' class='delete' onclick='handleDeleteClick(event, "+ID+", this);'>Delete</button>" + 			
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