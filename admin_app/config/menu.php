<?php

return [

    // Main menu items
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

];
