<?php

return [
    [
        'menu_label' => 'dashboard',
    ],
    [
        'route' => 'dashboard',
        'label' => 'Dashboard',
        'icon' => 'bi bi-house-fill',
        'active' => 'dashboard.dashboard',
        'permission_key' => 'dashboard',
    ],
    [
        'menu_title' => 'sections',
        'menu_title_icon' => 'lni lni-package',
        'active' => 'dashboard.platform.*',
        'permission_key_group' => 'sections',
        'menu_title_list' => [
            [
                'route' => 'dashboard.platform.index',
                'label' => 'platforms',
                'active' => 'dashboard.platform.*',
            ],
        ],
    ],
    [
        'menu_title' => 'trash',
        'menu_title_icon' => 'lni lni-trash',
        'active' => 'dashboard.*',
        'permission_key_group' => 'trash',
        'menu_title_list' => [
            [
                'route' => 'dashboard.platform.trash',
                'label' => 'Platforms trash',
                'active' => 'dashboard.platform.*',
                'icon' => 'bi bi-circle',
            ],

        ]
    ]
];
