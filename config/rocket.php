<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuración Global de Rocket
    |--------------------------------------------------------------------------
    */
    'global' => [
        'name' => 'Rocket',
        'logo' => [
            'dark' => 'https://i.ibb.co/g9sWt3n/rocket.png',
            'light' => 'https://i.ibb.co/g9sWt3n/rocket.png',
        ],
        'features' => [
            'enable_registration' => false
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Config Router by Rocket
     |--------------------------------------------------------------------------
     */
    'route' => [
        'api' => [
            'prefix' => 'api',
            'auth' => [
                'login' => 'login',
                'logout' => 'logout',
                'password' => [
                    'email' => 'password/email',
                    'reset' => 'password/reset',
                ],
            ],
            'login' => 'login',
            'values' => 'values',
            'parameters' => 'parameters',
            'session' => [
                'validate' => 'session/validate',
                'start' => 'session/start',
            ],
            'countries' => 'countries',
            'departments' => 'departments',
            'cities' => 'cities',
            'roles' => 'roles',
            'permission' => 'permissions',
            'assign' => [
                'permission' => [
                    'toRole' => 'assign/permission/to/role',
                    'toUser' => 'assign/permission/to/user',
                ],
            ],
        ],
        'web' => [
            'prefix' => 'web',
            'auth' => [
                'login' => 'web/login',
                'logout' => 'logout',
                'password' => [
                    'email' => 'password/email',
                    'reset' => 'password/reset',
                ],
            ]
        ]
    ],

    /*
     |--------------------------------------------------------------------------
     | Config Login by Rocket
     |--------------------------------------------------------------------------
     */
    'login' => [
        /*
         * Listado de campos para el login
         * username o email
         * Puedes escoger una de las dos opciones para el login
         */
        'field' => 'username',

    ],

    /*
     |--------------------------------------------------------------------------
     | Config Email by Rocket
     |--------------------------------------------------------------------------
     */
    'email' => [
        'from' => [
            'address' => env('MAIL_FROM_ADDRESS', ''),
            'name' => env('MAIL_FROM_NAME', ''),
            'username' => env('MAIL_USERNAME', ''),
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Config Sanctum by Rocket
     |--------------------------------------------------------------------------
     */
    'sanctum' => [

        /*
        |--------------------------------------------------------------------------
        | Expiration Minutes
        |--------------------------------------------------------------------------
        */
        'expiration' => 30,

    ],

    /*
     |--------------------------------------------------------------------------
     | Config Pages by Rocket
     |--------------------------------------------------------------------------
     */
    'pages' => [
        'auth' => [
            'login' => [
                'title' => 'Inicio de sesión',
                'loginWith' => [
                    'google' => false,
                    'github' => true,
                ],
            ],
            'password' => [
                'confirm' => [
                    'view' => '',
                    'title' => null,
                ],
                'email' => [
                    'view' => '',
                    'title' => null,
                ],
                'reset' => [
                    'view' => '',
                    'title' => null,
                ],
            ],
            'towFactor' => [
                'challenge' => [
                    'view' => '',
                    'title' => null,
                ],
            ],
        ],

        'home' => [
            'title' => 'Home',
            'icon' => 'fas fa-home',
            'url' => '/',
        ],
        'users' => [
            'title' => 'Users',
            'icon' => 'fas fa-users',
            'url' => '/users',
        ],
        'roles' => [
            'title' => 'Roles',
            'icon' => 'fas fa-user-tag',
            'url' => '/roles',
        ],
        'permissions' => [
            'title' => 'Permissions',
            'icon' => 'fas fa-user-lock',
            'url' => '/permissions',
        ],
        'assign' => [
            'title' => 'Assign',
            'icon' => 'fas fa-user-cog',
            'url' => '/assign',
        ],
        'values' => [
            'title' => 'Values',
            'icon' => 'fas fa-list',
            'url' => '/values',
        ],
        'parameters' => [
            'title' => 'Parameters',
            'icon' => 'fas fa-cogs',
            'url' => '/parameters',
        ],
        'countries' => [
            'title' => 'Countries',
            'icon' => 'fas fa-globe-americas',
            'url' => '/countries',
        ],
        'departments' => [
            'title' => 'Departments',
            'icon' => 'fas fa-building',
            'url' => '/departments',
        ],
        'cities' => [
            'title' => 'Cities',
            'icon' => 'fas fa-city',
            'url' => '/cities',
        ],
    ],

];
