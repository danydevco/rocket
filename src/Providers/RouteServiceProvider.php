<?php

namespace DeveloperHouse\Rocket\Providers;


use DeveloperHouse\Rocket\Http\Middleware\ApiResponseMiddleware;
use DeveloperHouse\Rocket\Http\Middleware\ErrorHandlerMiddleware;
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
                ->group(__DIR__ . '/../../routes/web.php');
        });

        $this->app['router']->aliasMiddleware('rocket.api.response', ApiResponseMiddleware::class);
        //$this->app['router']->aliasMiddleware('rocket.error.handler', ErrorHandlerMiddleware::class);

    }

}