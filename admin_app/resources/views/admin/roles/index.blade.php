@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Roles</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createRoleModal">
                    Create Role
                </button>
            </div>
        </div>

        <div class="card-body">
            <table id="rolesTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>

                                <a href="javascript:void(0)" class="btn btn-sm btn-info role-edit-btn"
                                    data-id="{{ $role->id }}" data-name="{{ $role->name }}"
                                    data-url="{{ route('roles.update', $role->id) }}">
                                    Edit
                                </a>

                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger delete-btn">
                                        Delete
                                    </button>
                                </form>

                                <a href="{{ route('roles.permissions.edit', $role->id) }}" class="btn btn-warning btn-sm">
                                    Permissions
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <!-- Create Role Modal -->
    <div class="modal fade" id="createRoleModal" tabindex="-1" role="dialog" aria-labelledby="createRoleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="createRoleModalLabel">Create Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Role Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter role name"
                                required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    {{-- Edit Role Modal --}}
    <div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Role</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <form method="POST" id="editRoleForm">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Role Name</label>
                            <input type="text" name="name" id="editRoleName" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        window.successMessage = @json(session('success'));
    </script>

    @push('scripts')
        <script src="{{ asset('js/custom_alert.js') }}"></script>
        <script src="{{ asset('js/roles.js') }}"></script>
    @endpush
@endsection
