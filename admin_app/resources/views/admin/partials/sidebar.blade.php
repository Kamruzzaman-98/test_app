<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('dashboard') }}" class="brand-link d-flex align-items-center">

        @if (setting('site_logo'))
            <img src="{{ asset('storage/' . setting('site_logo')) }}" alt="Logo"
                class="brand-image img-circle elevation-3" style="height: 30px; width: 30px; object-fit: cover;">
        @endif

        <span class="brand-text font-weight-light ml-2">
            {{ setting('app_name') }}
        </span>

    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                @foreach (config('menu') as $menu)
                    @php
                        $hasPermission = !isset($menu['permission']) || auth()->user()->can($menu['permission']);
                        $children = collect($menu['children'] ?? [])->filter(
                            fn($child) => !isset($child['permission']) || auth()->user()->can($child['permission']),
                        );
                    @endphp

                    @php
                        $isActiveParent = false;

                        if (!empty($menu['route']) && request()->routeIs($menu['route'])) {
                            $isActiveParent = true;
                        }

                        foreach ($children as $child) {
                            if (request()->routeIs($child['route'])) {
                                $isActiveParent = true;
                                break;
                            }
                        }
                    @endphp

                    @if ($hasPermission || $children->isNotEmpty())
                        <li class="nav-item {{ $isActiveParent ? 'menu-open' : '' }}">
                            <a href="{{ $menu['route'] ? route($menu['route']) : '#' }}"
                                class="nav-link {{ $isActiveParent ? 'active' : '' }}">
                                <i class="nav-icon {{ $menu['icon'] }}"></i>
                                <p>
                                    {{ __($menu['title']) }}
                                    @if ($children->isNotEmpty())
                                        <i class="right fas fa-angle-left"></i>
                                    @endif
                                </p>
                            </a>

                            @if ($children->isNotEmpty())
                                <ul class="nav nav-treeview">
                                    @foreach ($children as $child)
                                        <li class="nav-item">
                                            <a href="{{ route($child['route']) }}"
                                                class="nav-link {{ request()->routeIs($child['route']) ? 'active' : '' }}">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>{{ $child['title'] }}</p>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @endforeach

            </ul>
        </nav>
    </div>

</aside>
