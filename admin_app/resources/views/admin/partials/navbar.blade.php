@php
    $user = Auth::user();
@endphp

<nav class="main-header navbar navbar-expand navbar-white navbar-light">


    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">

            <a class="nav-link" data-toggle="dropdown" href="#">

                @if ($user->image)
                    <img src="{{ asset($user->image) }}" class="img-circle elevation-2" width="30" height="30"
                        style="object-fit: cover;">
                @else
                    <i class="fas fa-user-circle fa-lg"></i>
                @endif

            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <a href="{{ route('settings.profile') }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>

                <a href="{{ route('settings.general') }}" class="dropdown-item">
                    <i class="fas fa-cogs mr-2"></i> Settings
                </a>

                <div class="dropdown-divider"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>

            </div>
        </li>

    </ul>

</nav>
