<form method="POST" action="{{ route('roles.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Role name">
    <button type="submit">Save</button>
</form>
