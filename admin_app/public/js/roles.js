$(document).on('click', '.role-edit-btn', function () {

    let name = $(this).attr('data-name');
    let url = $(this).attr('data-url');

    $('#editRoleName').val(name);
    $('#editRoleForm').attr('action', url);

    $('#editRoleModal').modal('show');

    setTimeout(() => {
        $('#editRoleName').focus();
    }, 300);

});
