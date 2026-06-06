@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Permissions</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createPermissionModal">
                    Create Permission
                </button>
            </div>
        </div>

        <div class="card-body">
            <table id="permissionsTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Permission Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>

                                {{-- Edit Button --}}
                                <a href="javascript:void(0)" class="btn btn-sm btn-info permission-edit-btn"
                                    data-id="{{ $permission->id }}" data-name="{{ $permission->name }}"
                                    data-url="{{ route('permissions.update', $permission->id) }}">
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger delete-btn">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    {{-- Create Permission Modal --}}
    <div class="modal fade" id="createPermissionModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Create Permission</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('permissions.store') }}">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Permission Name</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. user.view" required>
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

    {{-- Edit Permission Modal --}}
    <div class="modal fade" id="editPermissionModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Permission</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <form method="POST" id="editPermissionForm">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Permission Name</label>
                            <input type="text" name="name" id="editPermissionName" class="form-control">
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
        <script src="{{ asset('js/permissions.js') }}"></script>
    @endpush
@endsection
