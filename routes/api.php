<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EntryController;
use App\Http\Controllers\Api\TypeController;
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
// Public routes
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);

// Protected routes
Route::group(['middleware' => ['apiJwt']], function(){

    //Login
    Route::get('auth/logout',  [AuthController::class, 'logout']);

    //Users
    Route::get('users/',  [UserController::class, 'index']);

    //categories
    Route::post('categories/', [CategoryController::class, 'create']);
    Route::get('categories/', [CategoryController::class, 'index']);
    Route::put('categories/{categories}', [CategoryController::class, 'update']);

    //types
    Route::post('types/', [TypeController::class, 'create']);
    Route::get('types/', [TypeController::class, 'index']);
    Route::put('types/{types}', [TypeController::class, 'update']);

    //types
    Route::post('entry/', [EntryController::class, 'create']);
    Route::get('entry/', [EntryController::class, 'index']);
    Route::put('entry/{entry}', [EntryController::class, 'update']);

});

