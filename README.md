## About Rocket

Rocket es la herramienta definitiva para comenzar tus proyectos de desarrollo de manera rápida y efectiva. Hemos diseñado este paquete con el propósito de acelerar tus inicios de proyecto, proporcionándote todas las bases necesarias para que puedas concentrarte en construir características sorprendentes en lugar de lidiar con la configuración inicial repetitiva.
- **Valores y Parámetros Pre-Configurados:** Olvídate de definir constantemente los mismos valores y parámetros en cada proyecto. Con Rocket, puedes configurar rápidamente los valores y parámetros esenciales según tus preferencias y estándares.
- **Gestión de Permisos Simplificada:** Implementa un sólido sistema de control de acceso en cuestión de minutos. Rocket integra automáticamente funcionalidades de permisos y roles para que puedas asegurar tus aplicaciones de manera eficiente.
- **Datos Geográficos Listos para Usar:** Ahorra tiempo al incluir una lista completa de países, ciudades y departamentos predefinidos. Nunca más tendrás que buscar e ingresar manualmente esta información básica.- 
Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Instalación

```
composer require developerhouse/rocket
```
Una vez que se haya instalado el paquete, debes ejecutar los siguientes comandos: (Importante)
```
 php artisan vendor:publish --tag=rocket-config
 php artisan migrate
 php artisan rocket:seeder
```
## Restaurar las tablas al estado inicial
```
 php artisan rocket:truncate
```

## Agrega el Trait al modelo User
```
use Illuminate\Foundation\Auth\User as Authenticatable;
use DeveloperHouse\Rocket\Traits\UserRocketTrait;

class User extends Authenticatable{
    use UserRocketTrait;
    
    // ...
}
```
## Caducidad del token
De forma predeterminada, los tokens de Sanctum caducan cada 30 Minutos. Sin embargo, si deseas configurar un tiempo de caducidad diferente para los tokens de la API en tu aplicación, puedes hacerlo a través de la configuración definida en el archivo `config/rocket.php`. Esta opción de configuración permite definir la cantidad de minutos después de los cuales un token emitido se considerará caducado:
```
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
```
## Las tablas por defecto del paquete son:
- users (Actualización de la tabla users de Laravel)
- personal_access_tokens
- model_has_permissions
- role_has_permissions
- permissions
- model_has_roles
- roles
- values
- parameters
- countries
- departments
- cities

## Usuario por defecto:
- email: rocket@developerhouse.co
- password: password

## Rutas por defecto de la API:
A continuación se presenta una lista de rutas API disponibles en la aplicación:

| Método | Ruta                                      | Controlador y Método                  |
|--------|-------------------------------------------|---------------------------------------|
| POST   | api/assign/permission/to/role             | RoleController@assignPermissionToRole |
| POST   | api/auth/login                            | AuthController@login                  |
| POST   | api/auth/logout                           | AuthController@logout                 |
| POST   | api/auth/password/email                   | AuthController@emailPassword          |
| POST   | api/auth/password/reset                   | AuthController@resetPassword          |
| GET    | api/cities                                | CityController@index                  |
| POST   | api/cities                                | CityController@store                  |
| PUT    | api/cities/{city}                         | CityController@update                 |
| DELETE | api/cities/{city}                         | CityController@destroy                |
| GET    | api/countries                             | CountryController@index               |
| POST   | api/countries                             | CountryController@store               |
| PUT    | api/countries/{country}                   | CountryController@update              |
| DELETE | api/countries/{country}                   | CountryController@destroy             |
| GET    | api/departments                           | DepartmentController@index            |
| POST   | api/departments                           | DepartmentController@store            |
| PUT    | api/departments/{department}              | DepartmentController@update           |
| DELETE | api/departments/{department}              | DepartmentController@destroy          |
| GET    | api/permissions                           | PermissionController@index            |
| POST   | api/permissions                           | PermissionController@store            |
| GET    | api/roles                                 | RoleController@index                  |
| POST   | api/roles                                 | RoleController@store                  |
| GET    | api/roles/{role}                          | RoleController@show                   |
| GET    | api/values                                | ValueController@index                 |
| POST   | api/values                                | ValueController@store                 |
| GET    | api/values/{value}                        | ValueController@show                  |
| PUT    | api/values/{value}                        | ValueController@update                |
| POST   | api/values/{value}/parameters             | ParameterController@store             |
| PUT    | api/values/{value}/parameters/{parameter} | ParameterController@update            |
