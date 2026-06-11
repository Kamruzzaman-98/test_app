@extends('layouts.admin')

@section('content')
    @php
        $user = Auth::user();
    @endphp

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Profile Settings</h3>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile text-center">

                            @if ($user->image)
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset($user->image) }}"
                                    style="width:100px;height:100px;object-fit:cover;">
                            @else
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('default.png') }}"
                                    style="width:100px;height:100px;">
                            @endif

                            <h3 class="profile-username mt-3">{{ $user->name }}</h3>
                            <p class="text-muted">{{ $user->email }}</p>

                        </div>
                    </div>

                </div>

                <div class="col-md-8">

                    <div class="card card-primary card-outline mb-3">

                        <div class="card-header">
                            <h3 class="card-title">Edit Profile</h3>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Profile Image</label>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>

                                    <small class="text-muted">jpg, jpeg, png (max 2MB)</small>
                                </div>

                                <button class="btn btn-primary">
                                    Update Profile
                                </button>

                            </form>

                        </div>
                    </div>

                    <div class="card card-warning card-outline">

                        <div class="card-header">
                            <h3 class="card-title">Change Password</h3>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.profile.password') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" name="current_password" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>

                                <button class="btn btn-warning">
                                    Change Password
                                </button>

                            </form>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <script>
        window.successMessage = @json(session('success'));
        window.errorMessage = @json($errors->first());

        document.getElementById('image').addEventListener('change', function() {
            if (this.files.length > 0) {
                document.querySelector('.custom-file-label').innerText =
                    this.files[0].name;
            }
        });
    </script>

    <script src="{{ asset('js/custom_alert.js') }}"></script>
@endsection
