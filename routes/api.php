<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MortController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiropController;
use App\Http\Controllers\HausseController;
use App\Http\Controllers\RucherController;
use App\Http\Controllers\TypeRucheController;
use App\Http\Controllers\ExploitationController;
use App\Http\Middleware\CurrentExploitationMiddleware;

// Public auth endpoints (no authentication required)
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

// Private auth endpoints
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Protected routes (authentication & exploitation required)
Route::prefix('v1')->middleware(['auth:sanctum', CurrentExploitationMiddleware::class])->group(function () {

    // Exploitations
    Route::get('/exploitation', [ExploitationController::class, "currentExploitation"])->name('exploitation');
    Route::put('/exploitation/{exploitation}', [ExploitationController::class, "update"])->name('exploitation.update');

    // Hausses
    Route::apiResource('/hausses', HausseController::class)->names('hausses');
    Route::post('/hausses/create-many', [HausseController::class, 'createMany'])->name('hausses.create-many');

    // Miellées
    Route::apiResource('/miellees', \App\Http\Controllers\MielleeController::class)->names('miellees');

    // Roles
    Route::apiResource('/roles', RoleController::class)->names('roles');

    // Ruchers
    Route::apiResource('/ruchers', RucherController::class)->names('ruchers');
    Route::get('/ruchers/{rucher}/ruches', [RucherController::class, 'getRuches']);

    // Sirops
    Route::apiResource('/sirops', SiropController::class)->names('sirops');
    Route::get('/sirops/{sirop}/nombre-nourrissements', [SiropController::class, 'nombreNourrissements']);

    // Types de ruches
    Route::apiResource('/types-ruches', TypeRucheController::class)->names('types-ruches');

    // User
    Route::get('/user', [UserController::class, "currentUser"])->withoutMiddleware(
        CurrentExploitationMiddleware::class
    )->name('user');
});
