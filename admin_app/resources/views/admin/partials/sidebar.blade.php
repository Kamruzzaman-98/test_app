<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">BANGLADESH</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                @foreach (config('menu') as $menu)
                    @php
                        $user = auth()->user();

                        $hasChildren = isset($menu['children']) && count($menu['children']) > 0;

                        $children = collect($menu['children'] ?? [])->filter(
                            fn($child) => !isset($child['permission']) || ($user && $user->can($child['permission'])),
                        );

                        if (isset($menu['permission']) && !($user && $user->can($menu['permission']))) {
                            continue;
                        }

                        if ($hasChildren && $children->isEmpty()) {
                            continue;
                        }

                        $childRoutes = $children->pluck('route')->toArray();

                        $isActiveParent =
                            (isset($menu['route']) && request()->routeIs($menu['route'])) ||
                            in_array(request()->route()->getName(), $childRoutes);

                        $isChildActive = fn($route) => request()->routeIs($route);
                    @endphp

                    <li class="nav-item {{ $isActiveParent ? 'menu-open' : '' }}">

                        <a href="{{ $menu['route'] ? route($menu['route']) : '#' }}"
                            class="nav-link {{ $isActiveParent ? 'active' : '' }}">

                            <i class="nav-icon {{ $menu['icon'] }}"></i>

                            <p>
                                {{ $menu['title'] }}

                                @if ($hasChildren)
                                    <i class="right fas fa-angle-left"></i>
                                @endif
                            </p>
                        </a>

                        @if ($hasChildren)
                            <ul class="nav nav-treeview">

                                @foreach ($children as $child)
                                    <li class="nav-item">

                                        <a href="{{ route($child['route']) }}"
                                            class="nav-link {{ $isChildActive($child['route']) ? 'active' : '' }}">

                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ $child['title'] }}</p>

                                        </a>

                                    </li>
                                @endforeach

                            </ul>
                        @endif

                    </li>
                @endforeach

            </ul>
        </nav>
    </div>

</aside>
