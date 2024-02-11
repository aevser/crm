<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [Api\AuthController::class, 'login'])
    ->name('login');
Route::post('/logout', [Api\AuthController::class, 'logout'])
    ->name('logout');

Route::apiResource('roles', Api\Admin\RolesController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);

Route::apiResource('permissions', Api\Admin\PermissionsController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);

