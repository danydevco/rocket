## About Rocket

Rocket es la herramienta definitiva para comenzar tus proyectos de desarrollo de manera rápida y efectiva. Hemos diseñado este paquete con el propósito de acelerar tus inicios de proyecto, proporcionándote todas las bases necesarias para que puedas concentrarte en construir características sorprendentes en lugar de lidiar con la configuración inicial repetitiva.
- **Valores y Parámetros Pre-Configurados:** Olvídate de definir constantemente los mismos valores y parámetros en cada proyecto. Con Rocket, puedes configurar rápidamente los valores y parámetros esenciales según tus preferencias y estándares.
- **Gestión de Permisos Simplificada:** Implementa un sólido sistema de control de acceso en cuestión de minutos. Rocket integra automáticamente funcionalidades de permisos y roles para que puedas asegurar tus aplicaciones de manera eficiente.
- **Datos Geográficos Listos para Usar:** Ahorra tiempo al incluir una lista completa de países, ciudades y departamentos predefinidos. Nunca más tendrás que buscar e ingresar manualmente esta información básica.-
Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Instalación

``` bash
composer require developerhouse/rocket
```

Una vez que se haya instalado el paquete, debes ejecutar los siguientes comandos: (Importante)

``` bash
 php artisan vendor:publish --tag=rocket-config
 php artisan migrate
 php artisan rocket:seeder
```

## Middlewares

### Middleware Accept-Json
Este middleware, llamado `ApiResponseMiddleware`, se utiliza para manejar las respuestas de la API en formato JSON.

1. Primero, el middleware establece el encabezado 'Accept' de la solicitud a 'application/json'. Esto indica que la aplicación espera recibir una respuesta en formato JSON.

2. Luego, pasa la solicitud al siguiente middleware en la pila o al controlador de la solicitud.

3. Después de recibir la respuesta, establece el encabezado 'Content-Type' de la respuesta a 'application/json'. Esto indica que la respuesta que se está enviando es en formato JSON.

4. Si la respuesta es una instancia de `JsonResponse`, entonces se vuelve a formatear la respuesta utilizando el método `response()->json()`. Este método devuelve una nueva respuesta JSON con los datos y el código de estado de la respuesta original.

5. Si la respuesta no es una instancia de `JsonResponse`, simplemente se devuelve la respuesta tal como está.

Este middleware asegura que todas las respuestas de la API estén en formato JSON y tengan los encabezados correctos, independientemente de cómo se generen las respuestas en los controladores.

#### #jemplo de uso:
```php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'accept-json'], function () {
    // Aca van las rutas de la API
});
```

### Middleware RefreshToken
Este middleware, llamado `RefreshTokenMiddleware`, se utiliza para manejar la renovación de los tokens de acceso en cada solicitud.

1. Primero, el middleware extrae el token de acceso de la solicitud utilizando el método `bearerToken()`.

2. Si se encuentra un token, se busca en la base de datos utilizando el método `findToken()` de la clase `PersonalAccessToken`.

3. Si se encuentra un token de acceso correspondiente, se extiende su fecha de expiración. La nueva fecha de expiración se calcula sumando la cantidad de minutos especificada en la configuración `rocket.sanctum.expiration` a la hora actual.

4. Finalmente, se guarda el token de acceso actualizado en la base de datos y se pasa la solicitud al siguiente middleware en la pila o al controlador de la solicitud.

Este middleware asegura que los tokens de acceso se renueven automáticamente en cada solicitud, siempre que sean válidos.
#### #jemplo de uso:
```php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'accept-json'], function () {
    
    Route::group(['middleware' => ['auth:sanctum', 'rocket.refresh.token']], function () {
        // Aca van las rutas de la API que se desean proteger
    });        
});
```

```php

## Opcionales

### Herramientas de Desarrollo
Para facilitar el desarrollo y depuración de tu aplicación, puedes optar por instalar las siguientes herramientas:
- **barryvdh/laravel-debugbar:** Esta herramienta te proporciona una barra de depuración en la parte inferior de tu aplicación cuando estás en el entorno de desarrollo. Para instalarla, ejecuta el siguiente comando:
``` bash
composer require barryvdh/laravel-debugbar --dev
composer require --dev barryvdh/laravel-ide-helper
```

Recuerda que estos paquetes son opcionales y están destinados a ser utilizados en entornos de desarrollo, no en producción

## Publicar Recursos del Paquete Rocket

Rocket proporciona varios recursos que puedes publicar en tu proyecto principal. Para hacerlo, puedes utilizar los siguientes comandos:

### Publicar Migraciones
``` bash
php artisan vendor:publish --tag=rocket-migrations
```

### Publicar Seeders
``` bash
php artisan vendor:publish --tag=rocket-seeders
```
Después de publicar los seeders del paquete Rocket, debes modificar el seeder principal `DatabaseSeeder` de tu proyecto para que pueda ejecutar los seeders de Rocket. Aquí tienes un ejemplo de cómo debería verse tú `DatabaseSeeder`:

``` php
use DeveloperHouse\Rocket\seeders\RoleSeeder;
use DeveloperHouse\Rocket\seeders\ValueSeeder;
use DeveloperHouse\Rocket\seeders\ParameterSeeder;
use DeveloperHouse\Rocket\seeders\CountrySeeder;
use DeveloperHouse\Rocket\seeders\DepartmentSeeder;
use DeveloperHouse\Rocket\seeders\CitySeeder;
use DeveloperHouse\Rocket\seeders\UserSeeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        // START ROCKET SEEDERS
        $this->call([
            RoleSeeder::class,
            ValueSeeder::class,
            ParameterSeeder::class,
            CountrySeeder::class,
            DepartmentSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
        ]);
        // END ROCKET SEEDERS

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
```

### Publicar Vistas
``` bash
php artisan vendor:publish --tag=rocket-views
```

### Publicar Configuración
``` bash
php artisan vendor:publish --tag=rocket-config
```

### Publicar Archivos de Lenguaje
``` bash
php artisan vendor:publish --tag=rocket-lang
```

Estos comandos copiarán los recursos correspondientes del paquete Rocket a tu proyecto principal, permitiéndote personalizarlos según tus necesidades.

## Restaurar las tablas al estado inicial
``` bash
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

### Simulación del Atributo Name en el Modelo User
El paquete Rocket no utiliza la columna `name` en la tabla `users`. En su lugar, utiliza las columnas `first_name` y `last_name`. Sin embargo, puedes simular el atributo `name` en el modelo `User` utilizando el trait `UserRocketTrait` proporcionado por el paquete Rocket.

El trait `UserRocketTrait` incluye un accesor para el atributo `name` que devuelve la concatenación de los atributos `first_name` y `last_name`. Esto te permite seguir accediendo al atributo `name` en tus instancias del modelo `User` como si la columna `name` existiera en la base de datos.

Aquí tienes un ejemplo de cómo puedes usar este accesor:

```php
$user = User::find(1);
echo $user->name; // Imprime "Nombre Apellido"
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
