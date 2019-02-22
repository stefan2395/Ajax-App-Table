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
               
            } document.getElementById("idealoDiv").style.display  = 'none';

        }

        // We need to check if all checkboxes have been checked
        else {
            var numChecked = 0;
            
            for (var i = 1, input; input = inputs[i++]; ) {
                if (input.checked) {
                    numChecked++;

                }
            }
            document.getElementById("idealoDiv").style.display   = 'none';
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
        var rElems = document.querySelectorAll(".idealoDiv li");
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