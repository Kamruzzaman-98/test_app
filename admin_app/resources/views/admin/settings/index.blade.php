@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">General Settings</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('settings.update') }}">
                @csrf

                <div class="form-group">
                    <label>Site Name</label>
                    <input type="text"
                           name="site_name"
                           class="form-control"
                           value="{{ setting('site_name') }}"
                           placeholder="Enter site name">
                </div>

                <div class="form-group">
                    <label>Site Email</label>
                    <input type="text"
                           name="site_email"
                           class="form-control"
                           value="{{ setting('site_email') }}"
                           placeholder="Enter site email">
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">
                        Save Changes
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
