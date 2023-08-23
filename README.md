## About Rocket

Rocket es la herramienta definitiva para comenzar tus proyectos de desarrollo de manera rápida y efectiva. Hemos diseñado este paquete con el propósito de acelerar tus inicios de proyecto, proporcionándote todas las bases necesarias para que puedas concentrarte en construir características sorprendentes en lugar de lidiar con la configuración inicial repetitiva.
- **Valores y Parámetros Pre-Configurados:** Olvídate de definir constantemente los mismos valores y parámetros en cada proyecto. Con Rocket, puedes configurar rápidamente los valores y parámetros esenciales según tus preferencias y estándares.
- **Gestión de Permisos Simplificada:** Implementa un sólido sistema de control de acceso en cuestión de minutos. Rocket integra automáticamente funcionalidades de permisos y roles para que puedas asegurar tus aplicaciones de manera eficiente.
- **Datos Geográficos Listos para Usar:** Ahorra tiempo al incluir una lista completa de países, ciudades y departamentos predefinidos. Nunca más tendrás que buscar e ingresar manualmente esta información básica.- 
Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Instalación

```
composer require developerhouse/rocket.
```
Una vez que se haya instalado el paquete, debes ejecutar los siguientes comandos: (Importante)
```
 php artisan vendor:publish --tag=rocket-config
 php artisan migrate
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

