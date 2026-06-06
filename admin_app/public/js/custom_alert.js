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

    if (window.errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: window.errorMessage
        });
    }

});


    document.querySelectorAll('.delete-btn').forEach(button => {

        button.addEventListener('click', function (e) {
            e.preventDefault();

            let form = this.closest("form");

            Swal.fire({
                title: "Are you sure?",
                text: "This item will be deleted!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {

                if (result.isConfirmed) {
                    form.submit();
                }

            });
        });

    });

