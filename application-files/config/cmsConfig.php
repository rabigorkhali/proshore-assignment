<?php
/* NOTE: THIS CONFIG FORMAT IS IMEPLEMENT TO SUPPORT MANAGING PERMISSIONS ASWELL IN FUTURE */
$getMethod = 'get';
$postMethod = 'post';
$putMethod = 'put';
$deleteMethod = 'delete';

$homeBaseUrl = '/home';
$userBaseUrl = '/users';
$configBaseUrl = '/configs';
$profileBaseUrl = '/profile';
$questionnaireBaseUrl = '/questionnaires';

return [
    'modules' => [
        [
            'name' => 'Dashboard',
            'icon' => "<i class='fa fa-home'></i>",
            'hasSubmodules' => false,
            'route' => $homeBaseUrl,
        ],
        [
            'name' => 'Questionnaire Management',
            'icon' => "<i class='fa fa-book'></i>",
            'hasSubmodules' => false,
            'route' => $questionnaireBaseUrl,
            'permissions' => [
                [
                    'name' => 'View Questionnaire',
                    'route' => [
                        'url' => $questionnaireBaseUrl,
                        'method' => $getMethod,
                    ],
                ],
                [
                    'name' => 'Create Questionnaire',
                    'route' => [
                        [
                            'url' => $questionnaireBaseUrl . '/create',
                            'method' => $getMethod,
                        ],
                        [
                            'url' => $questionnaireBaseUrl,
                            'method' => $postMethod,
                        ],

                    ],
                ],
                [
                    'name' => 'Edit Questionnaire',
                    'route' => [
                        [
                            'url' => $questionnaireBaseUrl . '/*/edit',
                            'method' => $getMethod,
                        ],
                        [
                            'url' => $questionnaireBaseUrl . '/*',
                            'method' => $putMethod,
                        ],
                    ],
                ],
                [
                    'name' => 'Delete Questionnaire',
                    'route' => [
                        'url' => $questionnaireBaseUrl . '/*',
                        'method' => $deleteMethod,
                    ],
                ],
            ],
        ],

        [
            'name' => 'User Management',
            'icon' => "<i class='fa fa-user'></i>",
            'hasSubmodules' => true,
            'submodules' => [
                [
                    'name' => 'Users',
                    'icon' => "<i class='fa fa-users'></i>",
                    'hasSubmodules' => false,
                    'route' => $userBaseUrl,
                    'permissions' => [
                        [
                            'name' => 'View Users',
                            'route' => [
                                'url' => $userBaseUrl,
                                'method' => $getMethod,
                            ],
                        ],
                        [
                            'name' => 'Create Users',
                            'route' => [
                                [
                                    'url' => $userBaseUrl . '/create',
                                    'method' => $getMethod,
                                ],
                                [
                                    'url' => $userBaseUrl,
                                    'method' => $postMethod,
                                ],
                            ],
                        ],
                        [
                            'name' => 'Edit Users',
                            'route' => [
                                [
                                    'url' => $userBaseUrl . '/*/edit',
                                    'method' => $getMethod,
                                ],
                                [
                                    'url' => $userBaseUrl . '/*',
                                    'method' => $putMethod,
                                ],
                            ],
                        ],
                        [
                            'name' => 'Delete Users',
                            'route' => [
                                'url' => $userBaseUrl . '/*',
                                'method' => $deleteMethod,
                            ],
                        ],
                        [
                            'name' => 'Reset Password',
                            'route' => [
                                'url' => $userBaseUrl . '/reset-password/*',
                                'method' => $postMethod,
                            ],
                        ],
                    ],
                ], 
            ],
        ],

        [
            'name' => 'System configs',
            'icon' => "<i class='fa fa-cogs' aria-hidden='true'></i>",
            'hasSubmodules' => true,
            'submodules' => [
                [
                    'name' => 'Configs',
                    'icon' => '<i class="fa fa-cog" aria-hidden="true"></i>',
                    'route' => $configBaseUrl,
                    'hasSubmodules' => false,
                    'permissions' => [
                        [
                            'name' => 'View Configs',
                            'route' => [
                                'url' => $configBaseUrl,
                                'method' => $getMethod,
                            ],
                        ],
                        [
                            'name' => 'Create Config',
                            'route' => [
                                'url' => $configBaseUrl,
                                'method' => $postMethod,
                            ],
                        ],
                        [
                            'name' => 'Edit Config',
                            'route' => [
                                'url' => $configBaseUrl . '/*',
                                'method' => $putMethod,
                            ],
                        ],
                        [
                            'name' => 'Delete Config',
                            'route' => [
                                'url' => $configBaseUrl . '/*',
                                'method' => $deleteMethod,
                            ],
                        ],
                    ],
                ],
            ],
        ]
    ],
];
