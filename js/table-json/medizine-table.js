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
								"<button name='delete' class='delete' onclick='handleDeleteClick2(event, "+id+", this);'>Delete</button>" + 
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