<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">BANGLADESH</span>
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

                    @if ($hasPermission || $children->isNotEmpty())
                        <li class="nav-item {{ $children->isNotEmpty() ? 'menu-open' : '' }}">
                            <a href="{{ $menu['route'] ? route($menu['route']) : '#' }}"
                                class="nav-link {{ request()->routeIs($menu['route']) ? 'active' : '' }}">
                                <i class="nav-icon {{ $menu['icon'] }}"></i>
                                <p>
                                    {{ $menu['title'] }}
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
