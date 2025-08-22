<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MortController;
use App\Http\Middleware\CurrentExploitationMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public auth endpoints (no authentication required)
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

// Private auth endpoints
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Protected routes (authentication required)
Route::prefix('v1')->middleware(['auth:sanctum', CurrentExploitationMiddleware::class])->group(function () {
    Route::get('/', function () {
        $morts = \App\Models\Pesee::all();
        return response()->json($morts);
    });

    Route::resource('morts', MortController::class);

    Route::get('/user', function (Request $request) {
        $user = $request->user();
        return response()->json($user);
    })->withoutMiddleware(CurrentExploitationMiddleware::class);

    // Protected auth endpoints
});

