<?php 
    include 'header.php';
    require_once 'connection.php';
?>

<div class="content-table">
    <fieldset>

     <h3 style="cursor: pointer; color: green;" onclick="addRow();">Save</h3>
     <h3 style="cursor: pointer; color: red;" onclick="discard();">Discard</h3>

    <div id="checkboxes" class="models">
        <input type="checkbox" id="checkAll" checked="checked">All Services<br/>

        <input type="checkbox" id="idealoCheck" rel="idealo" name="c1" checked="checked" onchange="change();">Idealo
        <input type="checkbox" id="medizineCheck" rel="medizine" name="c2" checked="checked" onchange="change();">Medizine
    </div>

        <div class="form-popup" id="idealoDiv">
            <h3>Add row in IDEALO table:</h3>   
                <!-- <a href="#" type="button" class="btn cancel">&times;</a> -->

                
                <ul id="idealoDiv" class="result">
                    
                    <li class="idealo"><p id="require"></p><!-- IDEALO input fields -->
                        <label>Name <span style="color: blue;">IDEALO</span></label><br>
                        <input type="text" name="name" id="name">   
                    </li>

                    <li class="idealo"><!-- IDEALO input fields -->
                        <label>Pzn <span style="color: blue;">IDEALO</span></label><br>
                        <input type="text" name="pzn" id="pzn">
                    </li>
                

                    <li class="medizine"><!-- MEDIZINE input fields -->
                        <label>URL <span style="color: red;">MEDIZINE</span></label><br>
                        <input type="text" name="url" id="url">
                    </li>

                    <li class="idealo"><!-- IDEALO input fields -->
                        <label>Brand(test) <span style="color: blue;">IDEALO</span></label><br>
                        <input type="text" name="pzn" id="pzn">
                    </li>

                </ul>
                


        </form>     
    </fieldset>

</div>

<?php include 'footer.php'; ?>
</body>
</html>



<style>

</style>


    
<script>

    // ===========> Checkbox <===========
    // Check all checkboxes on check
    document.getElementById('checkboxes').addEventListener('change', function(e) {
        var el = e.target;
        var inputs = document.getElementById('checkboxes').getElementsByTagName('input');
        // If 'all' was clicked
        if (el.id === 'checkAll') {
        
            // loop through all the inputs, skipping the first one
            for (var i = 1, input; input = inputs[i++]; ) {
            
                // Set each input's value to 'all'.
                input.checked = el.checked;
               
            } document.getElementById("idealoDiv").style.display   = 'none';
               
        }

        // We need to check if all checkboxes have been checked
        else {
            var numChecked = 0;
            
            for (var i = 1, input; input = inputs[i++]; ) {
                if (input.checked) {
                    numChecked++;

                }
            }
            document.getElementById("idealoDiv").style.display   = 'block';
            // If all checkboxes have been checked, then check 'all' as well
            inputs[0].checked = numChecked === inputs.length - 1;
       }

    });




/*      
If you need more input fields with Idealo, Medizine or something else, just add class with same name like rel="" in <input type="checkbox">

                              On check display li

                                      ||
                                      ||
                                      ||
                                     \  /
                                      \/
*/
    function change() {
        var modelCheck = document.querySelectorAll(".models input[type='checkbox']");
        var filters = {
            models: getClassOfCheckedCheckboxes(modelCheck),
        }; 
        filterResults(filters);
        console.log(filters);
    }

    function getClassOfCheckedCheckboxes(checkboxes) {
        var classes = [];

        if (checkboxes && checkboxes.length > 0) {
            for (var i = 0; i < checkboxes.length; i++) {
                var cb = checkboxes[i];

                if (cb.checked) {
                    classes.push(cb.getAttribute("rel"));
                }
            }
        }
        return classes;
    }

    function filterResults(filters) {
        var rElems = document.querySelectorAll(".result li");
        var hiddenElems = [];

        if (!rElems || rElems.length <= 0) {
            return;
        }

        for (var i = 0; i < rElems.length; i++) {
            var el = rElems[i];

        if (filters.models.length > 0) {
          var isHidden = true;

            for (var j = 0; j < filters.models.length; j++) {
                var filter = filters.models[j];

                if (el.classList.contains(filter)) {
                    isHidden = false;
                    break;
                }
            }

            if (isHidden) {
                    hiddenElems.push(el);
                }
            }

        }

        for (var i = 0; i < rElems.length; i++) {
            rElems[i].style.display = "block";
        }

        if (hiddenElems.length <= 0) {
            return;
        }

        for (var i = 0; i < hiddenElems.length; i++) {
            hiddenElems[i].style.display = "none";
        }
    }

/*                          
                                      /\
                                     /  \
                                      ||
                                      ||
                                      ||  
                            END: On check display li                               
*/


        // document.getElementById('checkboxes').addEventListener('change', function(e) {
    //    // Idealo check
    //     idealoCheck = document.getElementById("idealoCheck");
    //     if (idealoCheck.checked == true) {
    //         document.getElementById("idealoDiv").style.display = 'block';
    //     } else {
    //         document.getElementById("idealoDiv").style.display = 'none';
    //     }
    //     // END: Idealo check


    //     // Medizine check
    //     medizineCheck = document.getElementById("medizineCheck");
    //     if (medizineCheck.checked == true) {
    //         document.getElementById("medizineDiv").style.display = 'block';
    //     } else {
    //         document.getElementById("medizineDiv").style.display = 'none';
    //     }
    //     // END: Medizine check
    // });
    // ===========> END: Checkbox <===========






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

    // ===========> END: Sweetalert2 <===========





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







    /*
    $("#percentage").change(function () {
    var perc = parseFloat($("#purchase_price").val());
    var purch = parseFloat($("#percentage").val());

    $("#menu_price").val((purch * perc).toFixed(2));
    });
    */
</script>