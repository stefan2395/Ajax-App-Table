
	function handleDeleteClick2(e, userId, r) {

		swal({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then(function (result) {
				if (result.value) {
				e.preventDefault(); // Prevent default behaviour of this event (eg: submitting the form

			    // Perform the AJAX request to delete this user
			    var delRow 		= document.getElementById("deleteRow");
			    var page 		= "delete-medizine.php?id=" + userId;
			    var xmlhttp 	= new XMLHttpRequest();
			    // var delID		= "" + userId;
				htmlD 			= "";

		        xmlhttp.onreadystatechange = function() {
		            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	               		var i = r.parentNode.parentNode.rowIndex;
						document.getElementById("myTable").deleteRow(i);
		            }
		        }

		        xmlhttp.open("GET", page, true);
		        xmlhttp.send();

		        // Message if deletet row in table
		        swal(
			      'Deleted!',
			      'Your file has been deleted.',
			      'success'
			    )
		    } 
		})
    }