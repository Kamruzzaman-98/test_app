$(document).on('click', '.permission-edit-btn', function () {

    console.log('permission edit clicked');

    let name = $(this).attr('data-name');
    let url = $(this).attr('data-url');

    console.log(name, url);

    $('#editPermissionName').val(name);
    $('#editPermissionForm').attr('action', url);

    $('#editPermissionModal').modal('show');

});
