@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Users</h3>
    </div>

    <div class="card-body">
        <table id="usersTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    {{-- <th>Created At</th> --}}
                </tr>
            </thead>

            <tbody>
                {{-- @foreach($users as $user) --}}
                    <tr>
                        <td>User ID</td>
                        <td>User Name</td>
                        <td>User Email</td>
                        {{-- <td>Joining Date</td> --}}
                    </tr>
                {{-- @endforeach --}}
            </tbody>

        </table>
    </div>
</div>

@endsection
