<!DOCTYPE html>
<html>
<head>
	<title>Table JSON-AJAX</title>
</head>
<body>
	

	<button id="table">Display table</button>

	<form id="frm">
		<input type="hidden" id="id" name="id" value="0">

		<label>Name</label>
		<input type="text" name="name" id="name">

		<label>Email</label>
		<input type="text" name="email" id="email">

		<label>Password</label>
		<input type="text" name="password" id="password">

		<input type="submit" name="submit" id="save">
	</form>


	<div>

		<table>
			<tr>
				<th>Name</th>
				<th>Password</th>
				<th>Email</th>
			</tr>

			<tbody id="responsveTable">
				
			</tbody>

		</table>

	</div>


</body>


<script type="text/javascript">

	// call AJAX
	var ajax = new XMLHttpRequest();
	var method = "GET";
	var url = "table.php";
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
				var firstName = data[a].name;
				var password = data[a].password;
				var email = data[a].email;

				html += "<tr>";
					html += "<td>" + firstName + "</td>";
					html += "<td>" + password + "</td>";
					html += "<td>" + email + "</td>";
				html += "</tr>";
			}

			document.getElementById("responsveTable").innerHTML = html;
		}
	}


</script>

</html>