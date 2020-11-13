<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Auth\Http\Controllers\LoginController;
use Auth\Http\Controllers\CheckAuthController;
use Auth\Http\Controllers\LogoutController;
use Users\Http\Controllers\ShowUserController;
use Product\Http\Controllers\Admin\AdminProductShowController;
use Product\Http\Controllers\Admin\AdminProductStatusController;
use Product\Http\Controllers\Client\ClientProductShowController;
use Product\Http\Controllers\Client\ClientProductStatusController;
use Product\Http\Controllers\Supplier\SupplierProductShowController;
use Product\Http\Controllers\Supplier\SupplierProductOperationController;

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

Route::post('/login', [LoginController::class, 'login']);
Route::get('/check-auth', [CheckAuthController::class, 'check']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout']);

    Route::middleware('onlyAdmin')->prefix('admin')->group(function () {
        Route::get('/users', [ShowUserController::class, 'list']);
//        Route::get('/users/{user}', [ShowUserController::class, 'single']);

        Route::get('/products', [AdminProductShowController::class, 'list']);
        Route::get('/products/show/{product}', [AdminProductShowController::class, 'show']);

        Route::post('/products/ban/{product}', [AdminProductStatusController::class, 'banProduct']);
    });

    Route::middleware('onlySupplier')->prefix('supplier')->group(function () {
        Route::get('/products', [SupplierProductShowController::class, 'list']);
        Route::get('/products/show/{product}', [AdminProductShowController::class, 'show']);

        Route::post('/products/create', [SupplierProductOperationController::class, 'create']);
        Route::get('/products/edit/{product}', [SupplierProductOperationController::class, 'edit']);
        Route::post('/products/update/{product}', [SupplierProductOperationController::class, 'update']);
        Route::post('/products/delete/{product}', [SupplierProductOperationController::class, 'delete']);
    });

    Route::middleware('onlyClient')->prefix('client')->group(function () {
        Route::get('/products', [ClientProductShowController::class, 'list']);
        Route::get('/products/show/{product}', [ClientProductShowController::class, 'show']);

        Route::post('/products/confirm/{product}', [ClientProductStatusController::class, 'confirmProduct']);
    });

});
