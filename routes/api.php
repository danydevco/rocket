<?php

use Danydevco\Rocket\Http\Controllers\AuthController;
use Danydevco\Rocket\Http\Controllers\ParameterController;
use Danydevco\Rocket\Http\Controllers\StarController;
use Danydevco\Rocket\Http\Controllers\ValueController;
use Danydevco\Rocket\Http\Controllers\CountryController;
use Danydevco\Rocket\Http\Controllers\DepartmentController;
use Danydevco\Rocket\Http\Controllers\CityController;
use Danydevco\Rocket\Http\Controllers\RoleController;
use Danydevco\Rocket\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->middleware(['rocket.api.response'])->group(function () {
    Route::post(config('rocket.route.auth.login'), [AuthController::class, 'login']);

    Route::post(config('rocket.route.auth.password.email'), [AuthController::class, 'emailPassword']);
    Route::post(config('rocket.route.auth.password.reset'), [AuthController::class, 'resetPassword']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post(config('rocket.route.auth.logout'), [AuthController::class, 'logout']);
        Route::post(config('rocket.route.session.validate'), [AuthController::class, 'validateSession']);
    });

    Route::post(config('rocket.route.session.start'), [StarController::class, 'index']);

});


Route::middleware(['auth:sanctum', 'rocket.api.response', 'rocket.refresh.token'])->group(function () {


    Route::resource(config('rocket.route.values'), ValueController::class)
        ->only(['index', 'show', 'store', 'update']);

    Route::resource(config('rocket.route.values') . '/{value}/' . config('rocket.route.parameters'), ParameterController::class)
        ->only(['store', 'update']);

    Route::resource(config('rocket.route.countries'), CountryController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    Route::resource(config('rocket.route.departments'), DepartmentController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    Route::resource(config('rocket.route.cities'), CityController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    Route::resource(config('rocket.route.roles'), RoleController::class)
        ->only(['index', 'show', 'store']);

    Route::resource(config('rocket.route.permission'), PermissionController::class)
        ->only(['index', 'store']);

    Route::post(config('rocket.route.assign.permission.toRole'), [RoleController::class, 'assignPermissionToRole']);

    //Route::post(config('rocket.route.assign.permission.toRole'), [RoleController::class, 'assign']);


});

