@extends('layouts.admin')

@section('content')
    @php
        $user = Auth::user();
    @endphp

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile Settings</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-4">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile text-center">

                            @if ($user->image)
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset($user->image) }}"
                                    alt="User profile picture" style="width:100px; height:100px; object-fit:cover;">
                            @else
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('default.png') }}"
                                    alt="User profile picture" style="width:100px; height:100px;">
                            @endif

                            <h3 class="profile-username mt-3">{{ $user->name }}</h3>
                            <p class="text-muted">{{ $user->email }}</p>

                        </div>
                    </div>

                </div>

                <div class="col-md-8">

                    <div class="card card-primary">

                        <div class="card-header">
                            <h3 class="card-title">Edit Profile</h3>
                        </div>

                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

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
                                    <label for="image">Profile Image</label>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>

                                    <small class="text-muted d-block mt-2">
                                        Allowed: jpg, jpeg, png (max 2MB)
                                    </small>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    Update Profile
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>
    </section>
    <script>
        window.successMessage = "{{ session('success') }}";
    </script>

    <script src="{{ asset('js/custom_alert.js') }}"></script>
@endsection
