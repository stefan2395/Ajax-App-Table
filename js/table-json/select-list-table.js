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
										'<tr>'+
                        '<th>' + 'id' 	      + '</th>' +
                        '<th>' + 'name'       + '</th>' +
                        '<th>' + 'PZN'        + '</th>' +
                        '<th>' + 'Action' 	  + '</th>' +
                    '</tr>' +
                '</thead>';

               


				for (var a = 0; a < data.length; a++) {

					var ID 				  = data[a].ID;
					var NAME   			= data[a].NAME;
					var PZN 			  = data[a].PZN;
					

					html += "<tr>";
						html += "<td>" + ID + "</td>";
						html += "<td>" + NAME + "</td>";
						html += "<td>" + PZN + "</td>";	
		                html +=  "<td>" +  
										"<button name='delete' class='delete' onclick='handleDeleteClick(event, "+ID+",this);'>Delete</button>" +
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