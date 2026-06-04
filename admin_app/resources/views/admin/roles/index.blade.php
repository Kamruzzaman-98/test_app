<h1>Roles</h1>

<a href="{{ route('roles.create') }}">Create Role</a>

<table>
    @foreach($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
        </tr>
    @endforeach
</table>
