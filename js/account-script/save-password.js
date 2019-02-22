   	// ===========> Save password script <===========
	function savePassword(saveId) {

		var oldpass 	= document.getElementById('oldpass').value;
		var changepass  = document.getElementById('changepass').value;
		var repeatpass  = document.getElementById('repeatpass').value;
	    // var ID 			= document.getElementById("ID").value;

		if (changepass !== repeatpass || changepass == '' || repeatpass == '') {
			if (changepass !== repeatpass) {
				document.getElementById('no-match-pass').innerHTML = 'Passwords do not match';
			}

	        if (changepass == '') {
				document.getElementById('changepass').style.border = "solid red";
			} else {
				document.getElementById('changepass').style.border = "";
			}

			if (repeatpass == '') {
				document.getElementById('repeatpass').style.border = "solid red";
			} else {
				document.getElementById('repeatpass').style.border = "";
			}
		} else {
			// Perform the AJAX request to update this use
		    var delRow 		= document.getElementById("updateRow");
		    var page 		= "change-password.php?id=" + saveId + "&oldpass=" + oldpass + "&changepass=" + changepass + "&repeatpass=" + repeatpass;
		    var xmlhttp 	= new XMLHttpRequest();

			htmlD 			= "";

			xmlhttp.open("POST", page, true);
	        xmlhttp.send();

	         xmlhttp.onreadystatechange = function() {
		            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	            	 	// Save button sweetalert2
				            swal({
				                position: 'top-end',
				                type: 'success',
				                title: 'Your work has been saved',
				                showConfirmButton: false,
				                timer: 1500
				            }).then(() => {
				                window.location = 'index.php';
				            })
			            // EDN: Save button sweetalert2 
		            } 
		        }  
		}

	}
	// ===========> END: Save password script <===========