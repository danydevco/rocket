<?php

namespace DeveloperHouse\Rocket\Providers;


use DeveloperHouse\Rocket\Http\Controllers\AuthController;
use DeveloperHouse\Rocket\Http\Middleware\ApiResponseMiddleware;
use DeveloperHouse\Rocket\Http\Middleware\RefreshTokenMiddleware;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider {


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot(): void {

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(__DIR__ . '/../../routes/api.php');
        });

        $this->app['router']->aliasMiddleware('rocket.api.response', ApiResponseMiddleware::class);
        $this->app['router']->aliasMiddleware('rocket.refresh.token', RefreshTokenMiddleware::class);
        //$this->app['router']->aliasMiddleware('rocket.error.handler', ErrorHandlerMiddleware::class);

    }
}
