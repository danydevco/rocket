<?php

return [


    /*
    * Listado de rutas
    */
    'route' => [
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


];
