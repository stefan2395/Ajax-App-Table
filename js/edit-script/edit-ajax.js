   	// ===========> Update script <===========
	function handleUpdateClick(updateId) {

	    var name		= document.getElementById("name").value;
	    var pzn			= document.getElementById("pzn").value;
	    var url			= document.getElementById("url").value;
	    var commentar   = document.getElementById("commentar").value;
	    // var ID 			= document.getElementById("ID").value;

	    // Perform the AJAX request to update this use
	    var delRow 		= document.getElementById("updateRow");
	    // var varsSend	= "ID=" + updateId + "&name=" + name + "&pzn=" + pzn + "&url" + url;
	    var page 		= "update.php?ID=" + updateId + "&name=" + name + "&pzn=" + pzn + "&url=" + url + "&commentar=" + commentar;
	    var xmlhttp 	= new XMLHttpRequest();
	    // var delID		= "" + userId;
		htmlD 			= "";

		xmlhttp.open("GET", page, true);
        xmlhttp.send();

	  

	        xmlhttp.onreadystatechange = function() {
	            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
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
	// ===========> END: Update script <===========