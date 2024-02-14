<?php

use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('roles', Api\Admin\RolesController::class)->only([
        'index', 'show', 'store', 'update', 'destroy'
    ]);

    Route::apiResource('permissions', Api\Admin\PermissionsController::class)->only([
        'index', 'show', 'store', 'update', 'destroy'
    ]);

    Route::apiResource('projects', Api\Custom\ProjectsController::class)->only([
        'index', 'show', 'store', 'update', 'destroy'
    ]);

    Route::apiResource('leads', Api\Custom\LeadsController::class)->only([
        'index', 'show', 'store', 'update', 'destroy'
    ]);
    Route::apiResource('hosts', Api\Admin\HostsController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);
    Route::apiResource('leads-class', Api\Custom\LeadClassesController::class)->only([
        'index', 'store', 'update', 'destroy'
    ]);
    Route::post('/assign-classes/{project_id}/{class_id}/{lead_id}', [Api\Custom\AssingClassToLeadController::class,
        'assignClassToLead'])->name('assing.class');

    Route::post('/remove-classes/{project_id}/{lead_id}', [Api\Custom\AssingClassToLeadController::class,
    'removeClassFromLead'])->name('remove.class');

    Route::post('/logout', [Api\AuthController::class, 'logout'])
        ->name('logout');
});

Route::post('/login', [Api\AuthController::class, 'login'])
    ->name('login');




