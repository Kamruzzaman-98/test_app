document.addEventListener("DOMContentLoaded", function () {

    if (window.successMessage && window.successMessage !== "") {

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: window.successMessage,
            showConfirmButton: false,
            timer: 2000
        });

    }

});
