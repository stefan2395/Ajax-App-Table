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