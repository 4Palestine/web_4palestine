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
        'active' => 'dashboard.*',
        'permission_key_group' => 'sections',
        'menu_title_list' => [
            [
                'route' => 'dashboard.platform.index',
                'label' => 'platforms',
                'active' => 'dashboard.platform.*',
            ],
            [
                'route' => 'dashboard.mission.index',
                'label' => 'missions',
                'active' => 'dashboard.mission.*',
            ],
            [
                'route' => 'dashboard.tag.index',
                'label' => 'tags',
                'active' => 'dashboard.tag.*',
            ],
        ],
    ],
    [
        'menu_title' => 'Actors',
        'menu_title_icon' => 'lni lni-package',
        'active' => 'dashboard.*',
        'permission_key_group' => 'actors',
        'menu_title_list' => [
            [
                'route' => 'dashboard.user.index',
                'label' => 'users',
                'active' => 'dashboard.user.*',
            ],
            [
                'route' => 'dashboard.admin.index',
                'label' => 'admins',
                'active' => 'dashboard.admin.*',
            ],
        ],
    ],
    [
        'menu_title' => 'Images Library',
        'menu_title_icon' => 'lni lni-package',
        'active' => 'dashboard.imageLibraryFolder.*',
        'menu_title_list' => [
            [
                'route' => 'dashboard.imageLibraryFolder.index',
                'label' => 'Image Library Folders',
                'active' => 'dashboard.imageLibraryFolder.*',
            ],
            [
                'route' => 'dashboard.imageLibraryFolder.manage-library',
                'label' => 'Manage Folders',
                'active' => 'dashboard.imageLibraryFolder.manage-library',
            ],
        ],
    ],
    [
        'menu_title' => 'Settings',
        'menu_title_icon' => 'lni lni-package',
        'active' => 'dashboard.*',
        'permission_key_group' => 'setting',
        'menu_title_list' => [
            [
                'route' => 'dashboard.setting.index',
                'label' => 'Settings',
                'active' => 'dashboard.setting.*',
            ]
        ]
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
            [
                'route' => 'dashboard.mission.trash',
                'label' => 'Missions trash',
                'active' => 'dashboard.mission.*',
                'icon' => 'bi bi-circle',
            ],
        ]
    ]
];
