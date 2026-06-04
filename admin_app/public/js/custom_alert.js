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

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            let form = this.closest("form");

            Swal.fire({
                title: "Are you sure?",
                text: "This role will be deleted!",
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
});

document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function () {

            let name = this.getAttribute('data-name');
            let url = this.getAttribute('data-url');

            document.getElementById('editRoleName').value = name;
            document.getElementById('editRoleForm').action = url;

            $('#editRoleModal').modal('show');
        });
    });

});
