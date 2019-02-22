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

                
                <ul id="idealoDiv">
                    
                    <li class="idealo"><p id="require"></p><!-- IDEALO input fields -->
                        <label>Name <span style="color: blue;">IDEALO</span> 

                            <span class="popup1 result" id="click">!
                                 <span class="popuptext1">A Simple Popup!</span>
                            </span>

                        </label><br>
                        <input type="text" name="name" id="name">   
                    </li>

                    <li class="idealo"><!-- IDEALO input fields -->
                        <label>Pzn <span style="color: blue;">IDEALO</span> 

                            <span  class="result popup1">!
                                <span class="popuptext1" >This is a simple popup for idealo app!</span>
                            </span> 

                        </label><br>
                        <input type="text" name="pzn" id="pzn">
                    </li>
                

                    <li class="medizine"><!-- MEDIZINE input fields -->
                        <label>URL <span style="color: red;">MEDIZINE</span> <span>!</span> </label><br>
                        <input type="text" name="url" id="url">
                    </li>

                    <li class="idealo"><!-- IDEALO input fields -->
                        <label>Brand(test) <span style="color: blue;">IDEALO</span> <span>!</span> </label><br>
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
.popup1 {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* The actual popup */
.popuptext1 {
    visibility: hidden;
    width: 160px;
    background-color: #edf6e8;
    color: #000;
    text-align: center;
    border-radius: 2px;
    border: solid 1px #43a13c;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    top: 135%;
    right: -300%;
    margin-left: -80px;
}

/* Popup arrow */
.popup1 .popuptext1::after {
    content: "";
    position: absolute;
    bottom: 100%;
    right: 5%;
    margin-left: -5px;
    border-width: 10px;
    border-style: solid;
    border-color: #edf6e800 transparent #edf6e8 transparent;
}

/* Toggle this class - hide and show the popup */
.popuptext1.show1 {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}
</style>

<script type="text/javascript" src="js/add-script/add-ajax.js"></script>
<script type="text/javascript" src="js/add-script/info-popup.js"></script>
<script type="text/javascript" src="js/add-script/checkbox.js"></script>
<script type="text/javascript" src="js/add-script/discard-add-button.js"></script>

