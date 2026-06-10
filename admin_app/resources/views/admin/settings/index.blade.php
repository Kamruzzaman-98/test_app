@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow-sm border-0">
            <div class="card-header">
                <h3 class="card-title mb-0">
                    General Settings
                </h3>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Site Name</label>
                                <input type="text" name="site_name" class="form-control"
                                    value="{{ setting('site_name') }}" placeholder="Enter Site Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Site Email</label>
                                <input type="email" name="site_email" class="form-control"
                                    value="{{ setting('site_email') }}" placeholder="Enter Site Email">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contact Phone</label>
                                <input type="text" name="contact_phone" class="form-control"
                                    value="{{ setting('contact_phone') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>App Name</label>
                                <input type="text" name="app_name" class="form-control"
                                    value="{{ setting('app_name') }}">
                            </div>
                        </div>

                    </div>

                    <div class="form-group">

                        <label>Site Logo</label>

                        @if (setting('site_logo'))
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . setting('site_logo')) }}" class="img-thumbnail"
                                    style="max-width:150px;">
                            </div>
                        @endif

                        <input type="file" name="site_logo" class="form-control-file">

                        <small class="text-muted">
                            Allowed formats: JPG, JPEG, PNG
                        </small>

                    </div>

                    <hr>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" rows="4" class="form-control">{{ setting('address') }}</textarea>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Timezone</label>
                                <input type="text" name="timezone" class="form-control"
                                    value="{{ setting('timezone') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pagination Limit</label>
                                <input type="number" name="pagination_limit" class="form-control"
                                    value="{{ setting('pagination_limit') }}">
                            </div>
                        </div>

                    </div>

                    <div class="text-right mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save mr-1"></i>
                            Save Changes
                        </button>
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
    @endpush
@endsection
