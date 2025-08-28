<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MortController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RucherController;
use App\Http\Middleware\CurrentExploitationMiddleware;

// Public auth endpoints (no authentication required)
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

// Private auth endpoints
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Protected routes (authentication required)
Route::prefix('v1')->middleware(['auth:sanctum', CurrentExploitationMiddleware::class])->group(function () {
  // User
  Route::get('/user', [UserController::class, "currentUser"])->withoutMiddleware(CurrentExploitationMiddleware::class);

  // Ruchers
  Route::resource('ruchers', RucherController::class);

  // A supprimer
  Route::get('/', function () {
    $morts = \App\Models\Ruche::with("reine")->get();
    return response()->json($morts, 200);
  });
  Route::resource('morts', MortController::class);
});
