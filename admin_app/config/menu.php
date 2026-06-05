<?php

return [

    [
        'title' => 'Dashboard',
        'icon' => 'fas fa-tachometer-alt',
        'route' => 'dashboard',
        'children' => [],
    ],

    [
        'title' => 'Users',
        'icon' => 'fas fa-users',
        'route' => 'users.index',
        'permission' => 'user.view',
        'children' => [],
    ],

    [
        'title' => 'Reports',
        'icon' => 'fas fa-chart-bar',
        'route' => 'reports.index',
        'children' => [],
    ],

    [
        'title' => 'Food',
        'icon' => 'fas fa-coffee',
        'route' => 'foods.index',
        'children' => [],
    ],

    [
        'title' => 'Settings',
        'icon' => 'fas fa-cogs',
        'route' => null,
        'children' => [
            [
                'title' => 'General',
                'route' => 'settings.general',
            ],
            [
                'title' => 'Profile',
                'route' => 'settings.profile',
            ],
        ],
    ],


    [
        'title' => 'Access Control',
        'icon' => 'fas fa-lock',
        'route' => null,
        'permission' => 'role.view',
        'children' => [
            [
                'title' => 'Roles',
                'route' => 'roles.index',
                'permission' => 'role.view',
            ],
            [
                'title' => 'Permissions',
                'route' => 'permissions.index',
                'permission' => 'permission.view',
            ],
        ],
    ],

];
