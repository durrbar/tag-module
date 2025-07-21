<?php

use Illuminate\Support\Facades\Route;
use Modules\Role\Enums\Permission;
use Modules\Tag\Http\Controllers\TagController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::apiResource('tags', TagController::class, [
    'only' => ['index', 'show'],
]);

/**
 * *****************************************
 * Authorized Route for Super Admin only
 * *****************************************
 */
Route::group(['middleware' => ['permission:'.Permission::SUPER_ADMIN, 'auth:sanctum']], function (): void {
    Route::apiResource('tags', TagController::class, [
        'only' => ['store', 'update', 'destroy'],
    ]);
});
