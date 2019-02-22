	// ===========> On click DISPLAY IMAGE and USER info <===========
    var divs = ["All", "Idealo", "Medizine"]; // Add name to the array and call it like id to your html tag and call from --> onclick="function" <--
    var visibleDivId = null;
    function toggleVisibility(divId) {
      	if(visibleDivId === divId) {
   	 		visibleDivId = divId;
      	} else {
        	visibleDivId = divId;
      	}
      hideNonVisibleDivs();
    }

    function hideNonVisibleDivs() {
      	var i, divId, div;
      	for(i = 0; i < divs.length; i++) {
        divId = divs[i];
        div = document.getElementById(divId);
        	if(visibleDivId === divId) {
          		div.style.display = "block";
        	} else {
          		div.style.display = "none";
        	}
      	}
    }
    // ===========>END: On click DISPLAY IMAGE and USER info <===========