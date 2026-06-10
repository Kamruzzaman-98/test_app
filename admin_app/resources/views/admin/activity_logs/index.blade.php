@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Activity Logs</h3>
        </div>

        <div class="card-body">
            <table id="logsTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Action</th>
                        <th>Module</th>
                        <th>Description</th>
                        <th>Time</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log->user->name ?? 'System' }}</td>
                            <td>{{ $log->action }}</td>
                            <td>{{ $log->module }}</td>
                            <td>{{ $log->description }}</td>
                            <td>{{ $log->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
