@extends('layouts.admin')

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">
            Assign Permissions to Role: {{ $role->name }}
        </h3>
    </div>

    <div class="card-body">

        <form method="POST" action="{{ route('roles.permissions.update', $role->id) }}">
            @csrf

            <div class="row">

                @foreach($permissions as $permission)
                    <div class="col-md-3">
                        <label>
                            <input type="checkbox"
                                   name="permissions[]"
                                   value="{{ $permission->name }}"
                                   {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                            {{ $permission->name }}
                        </label>
                    </div>
                @endforeach

            </div>

            <br>

            <button type="submit" class="btn btn-primary">
                Save Permissions
            </button>

        </form>

    </div>

</div>

@endsection
