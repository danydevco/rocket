<?php

use DeveloperHouse\Rocket\Http\Controllers\AuthController;
use DeveloperHouse\Rocket\Http\Controllers\ParameterController;
use DeveloperHouse\Rocket\Http\Controllers\ValueController;
use DeveloperHouse\Rocket\Http\Controllers\CountryController;
use DeveloperHouse\Rocket\Http\Controllers\DepartmentController;
use DeveloperHouse\Rocket\Http\Controllers\CityController;
use DeveloperHouse\Rocket\Http\Controllers\RoleController;
use DeveloperHouse\Rocket\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->middleware(['rocket.api.response'])->group(function () {
    Route::post(config('rocket.route.auth.login'), [AuthController::class, 'login']);

    Route::post(config('rocket.route.auth.password.email'), [AuthController::class, 'emailPassword'])->middleware(['throttle:1,1']);
    Route::post(config('rocket.route.auth.password.reset'), [AuthController::class, 'resetPassword']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post(config('rocket.route.auth.logout'), [AuthController::class, 'logout']);
    });

});


Route::middleware(['rocket.api.response', 'auth:sanctum'])->group(function () {

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

