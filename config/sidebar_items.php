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
    ],
    [
        'menu_title' => 'platforms',
        'menu_title_icon' => 'lni lni-world',
        'active' => 'dashboard.platform.*',
        'menu_title_list' => [
            [
                'route' => 'dashboard.platform.index',
                'label' => 'platforms',
                'active' => 'dashboard.platform.*',
            ],
            [
                'route' => 'dashboard.platform.create',
                'label' => 'create platform',
                'active' => 'dashboard.platform.create',
            ],
        ],
    ],
    [
        'menu_title' => 'missions',
        'menu_title_icon' => 'lni lni-target',
        'active' => 'dashboard.mission.*',
        'menu_title_list' => [
            [
                'route' => 'dashboard.mission.index',
                'label' => 'missions',
                'active' => 'dashboard.mission.*',
            ],
            [
                'route' => 'dashboard.mission.create',
                'label' => 'create mission',
                'active' => 'dashboard.mission.create',
            ],
        ],
    ],
    [
        'menu_title' => 'tags',
        'menu_title_icon' => 'lni lni-tag',
        'active' => 'dashboard.tag.*',
        'menu_title_list' => [
            [
                'route' => 'dashboard.tag.index',
                'label' => 'tags',
                'active' => 'dashboard.tag.*',
            ],
            [
                'route' => 'dashboard.tag.create',
                'label' => 'create tag',
                'active' => 'dashboard.tag.create',
            ],
        ],
    ],
    [
        'menu_title' => 'Actors',
        'menu_title_icon' => 'lni lni-users',
        'active' => 'dashboard.*',
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
    // [
    //     'menu_title' => 'Images Library',
    //     'menu_title_icon' => 'lni lni-image',
    //     'active' => 'dashboard.imageLibraryFolder.*',
    //     'menu_title_list' => [
    //         [
    //             'route' => 'dashboard.imageLibraryFolder.index',
    //             'label' => 'Image Library Folders',
    //             'active' => 'dashboard.imageLibraryFolder.*',
    //         ],
    //         [
    //             'route' => 'dashboard.imageLibraryFolder.manage-library',
    //             'label' => 'Manage Folders',
    //             'active' => 'dashboard.imageLibraryFolder.manage-library',
    //         ],
    //     ],
    // ],
    [
        'menu_title' => 'contacts',
        'menu_title_icon' => 'fadeIn animated bx bx-message-alt-detail',
        'active' => 'dashboard.contact.*',
        'menu_title_list' => [
            [
                'route' => 'dashboard.contact.index',
                'label' => 'contacts',
                'active' => 'dashboard.contact.*',
            ],
        ],
    ],
    [
        'menu_title' => 'sliders',
        'menu_title_icon' => 'lni lni-layers',
        'active' => 'dashboard.slider.*',
        'menu_title_list' => [
            [
                'route' => 'dashboard.slider.index',
                'label' => 'sliders',
                'active' => 'dashboard.slider.*',
            ],
            [
                'route' => 'dashboard.slider.create',
                'label' => 'create slider',
                'active' => 'dashboard.slider.create',
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
        'menu_label' => 'Trash',
    ],
    [
        'menu_title' => 'trash',
        'menu_title_icon' => 'lni lni-trash',
        'active' => 'dashboard.*',
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
            [
                'route' => 'dashboard.user.trash',
                'label' => 'Users trash',
                'active' => 'dashboard.user.*',
                'icon' => 'bi bi-circle',
            ],
        ]
    ]
];
