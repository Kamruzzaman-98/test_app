<?php

return [

    [
        'title' => 'messages.dashboard',
        'icon' => 'fas fa-tachometer-alt',
        'route' => 'dashboard',
        'children' => [],
    ],

    [
        'title' => 'messages.users',
        'icon' => 'fas fa-users',
        'route' => 'users.index',
        'permission' => 'user.view',
        'children' => [],
    ],

    [
        'title' => 'messages.reports',
        'icon' => 'fas fa-chart-bar',
        'route' => 'reports.index',
        'children' => [],
    ],

    [
        'title' => 'messages.ai_assistant',
        'icon' => 'nav-icon fas fa-robot',
        'route' => 'ai.index',
        'children' => [],
    ],

    [
        'title' => 'messages.food',
        'icon' => 'fas fa-coffee',
        'route' => 'foods.index',
        'children' => [],
    ],

    [
        'title' => 'messages.settings',
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
        'title' => 'messages.access_control',
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
