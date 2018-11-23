<?php 
    include 'header.php';
    require_once 'connection.php';
?>

<div class="content-table">
    <fieldset>
     <a href="index.php">Home</a>

     <h3 style="cursor: pointer; color: green;" >Save</h3>
     <h3 style="cursor: pointer; color: red;" onclick="discard()">Discard</h3>


        <div class="form-popup">
            <h3>Add row in IDEALO table:</h3>
            <form id="frm"  class="form__container" action="" method="post" onsubmit="addRow(); save();">    
                <!-- <a href="#" type="button" class="btn cancel">&times;</a> -->
                <ul>

                    <li><p id="require"></p>
                        <label>Name</label><br>
                        <input type="text" name="name" id="name">   
                    </li>

                    <li>
                        <label>Email</label><br>
                        <input type="text" name="email" id="email">
                    </li>


                    <li>
                        <label>URL</label><br>
                        <input type="text" name="url" id="url">
                    </li>

                    <li><br>
                        <input type="submit" name="submit" id="submit" value="submit">
                    </li>

                </ul>
            </form>



        </form>     
    </fieldset>

</div>
</body>
</html>


    
<script>
    // ===========> Sweetalert2 <===========

    // Discard button
    function discard() {
        swal({
            title: 'Discard changes?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, discard it!'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php';
            }
        })
    }

    // Save button
    function save() {
        swal({
            position: 'top-end',
            type: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500,
            
        }).then(function(){
            window.location.href = "index.php";
         });
    }
    // ===========> END: Sweetalert2 <===========





    // ===========> ADD row to Table Database IDEALO <===========
        function addRow() {

            //id from FORM inputs
            var name    = document.getElementById("name").value;
            var email   = document.getElementById("email").value;
            var url     = document.getElementById("url").value; 

            var aData = new FormData();
            aData.append('name', name);
            aData.append('email', email);
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


            // sweetalert2
            swal({
            position: 'top-end',
            type: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500,
            
            }).then(function(){
                window.location.href = "index.php";
            });
            // sweetalert2
        }   
    // ===========> END: ADD row to Table Database JS <===========



    // ===========> Display popup when click od discard <===========

        function getConfirmation() {
            var retVal = confirm("Do you want to continue ?");
            if (retVal == true)
            {
                window.location = 'index.php';
            } 
        }
    // ===========> END: Display popup when click od discard <===========





    /*
    $("#percentage").change(function () {
    var perc = parseFloat($("#purchase_price").val());
    var purch = parseFloat($("#percentage").val());

    $("#menu_price").val((purch * perc).toFixed(2));
    });
    */
</script>