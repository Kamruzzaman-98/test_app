@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">General Settings</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Site Name</label>
                    <input type="text" name="site_name" class="form-control" value="{{ setting('site_name') }}"
                        placeholder="Enter site name">
                </div>

                <div class="form-group">
                    <label>Site Email</label>
                    <input type="text" name="site_email" class="form-control" value="{{ setting('site_email') }}"
                        placeholder="Enter site email">
                </div>

                <div class="form-group">
                    <label>Contact Phone</label>
                    <input type="text" name="contact_phone" value="{{ setting('contact_phone') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>App Name</label>
                    <input type="text" name="app_name" value="{{ setting('app_name') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Site Logo</label>

                    @if (setting('site_logo'))
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . setting('site_logo')) }}" width="120">
                        </div>
                    @endif

                    <input type="file" name="site_logo" class="form-control">

                    <small class="text-muted">
                        Allowed: jpg, jpeg, png
                    </small>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control">{{ setting('address') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Timezone</label>
                    <input type="text" name="timezone" value="{{ setting('timezone') }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Pagination Limit</label>
                    <input type="number" name="pagination_limit" value="{{ setting('pagination_limit') }}"
                        class="form-control">
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">
                        Save Changes
                    </button>
                </div>

            </form>
        </div>
    </div>
    <script>
        window.successMessage = @json(session('success'));
    </script>

    @push('scripts')
        <script src="{{ asset('js/custom_alert.js') }}"></script>
    @endpush
@endsection
