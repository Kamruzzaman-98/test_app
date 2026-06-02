<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">BANGLADESH</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                @foreach(config('menu') as $menu)
                    @php
                        $hasChildren = isset($menu['children']) && count($menu['children']) > 0;
                    @endphp

                    <li class="nav-item {{ $hasChildren && in_array(request()->route()->getName(), array_column($menu['children'], 'route')) ? 'menu-open' : '' }}">

                        <a href="{{ $menu['route'] ? route($menu['route']) : '#' }}"
                           class="nav-link {{ $menu['route'] && request()->routeIs($menu['route']) ? 'active' : '' }} {{ $hasChildren && in_array(request()->route()->getName(), array_column($menu['children'], 'route')) ? 'active' : '' }}">

                            <i class="nav-icon {{ $menu['icon'] }}"></i>
                            <p>
                                {{ $menu['title'] }}
                                @if($hasChildren)
                                    <i class="right fas fa-angle-left"></i>
                                @endif
                            </p>
                        </a>

                        @if($hasChildren)
                            <ul class="nav nav-treeview">
                                @foreach($menu['children'] as $child)
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
                @endforeach

            </ul>
        </nav>
    </div>

</aside>
