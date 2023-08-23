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