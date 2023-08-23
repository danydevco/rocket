<?php

namespace DeveloperHouse\Rocket\Providers;

use DeveloperHouse\Rocket\Commands\SeederCommand;
use DeveloperHouse\Rocket\Commands\TruncateCommand;
use DeveloperHouse\Rocket\Exceptions\Handler;
use DeveloperHouse\Rocket\Start;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\PermissionServiceProvider;

class RocketServiceProvider extends ServiceProvider {

    public function boot(): void {

        $this->app->singleton(
            ExceptionHandler::class,
            Handler::class
        );

        // Configuraciones
        $this->publishes([$this->basePath('config/rocket.php') => base_path('config/rocket.php')], 'rocket-config');

        // $this->loadMigrationsFrom(base_path('vendor/spatie/laravel-permission/database/migrations'));

        /*
        $this->publishes([
            base_path('vendor/spatie/laravel-permission/database/migrations/create_permission_tables.php.stub')
            => $this->basePath('database/migrations/2023_17_08_150000_create_permission_tables.php'),
        ], 'rocket-config');
        */

        $this->loadMigrationsFrom($this->basePath('database/migrations'));
        $this->loadTranslationsFrom($this->basePath('resources/lang/'), 'rocket');

        $this->commands([
            SeederCommand::class,
            TruncateCommand::class,
        ]);

    }

    public function register(): void {

        $this->app->bind('Rocket', function () {
            return new Start();
        });

        $this->mergeConfigFrom($this->basePath('config/rocket.php'), 'rocket');
        $this->app->register(PermissionServiceProvider::class);

    }

    protected function basePath($path = ''): string {
        return __DIR__ . '/../../' . $path;
    }

}