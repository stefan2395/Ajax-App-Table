    // ===========> Popup when click on info icon <===========
    var submenu = document.getElementsByClassName("popup1");

    for (var i = 0; i < submenu.length; i++) {
        submenu[i].addEventListener('click', menus, false);
    }

    function menus() {
        var menu = this.querySelector('.popuptext1');
        menu.classList.toggle("show1");
    };
    // ===========> END: Popup when click on info icon <===========