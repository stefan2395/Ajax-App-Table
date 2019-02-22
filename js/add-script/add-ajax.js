
    // ===========> ADD row to Table Database IDEALO <===========
        function addRow() {

            //id from FORM inputs
            var name    = document.getElementById("name").value;
            var pzn     = document.getElementById("pzn").value;
            var url     = document.getElementById("url").value; 

            var aData = new FormData();
            aData.append('name', name);
            aData.append('pzn', pzn);
            aData.append('url', url);

            var a      = new XMLHttpRequest;
            var aGet   = 'POST';
            var aQuery = 'add_row.php';
            var aTrue  = true;



            a.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    
                }
            }

            a.open(aGet, aQuery, aTrue);
            a.send(aData);


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
    // ===========> END: ADD row to Table Database JS <===========