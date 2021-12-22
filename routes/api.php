<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);

Route::group(['middleware' => ['apiJwt']], function(){
    Route::get('auth/logout',  [AuthController::class, 'logout']);
    Route::get('users',  [UserController::class, 'index']);
});

// Protected routes
// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::post('/logout', [AuthController::class, 'logout']);
// });


// // Public routes
// Route::get('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout']);