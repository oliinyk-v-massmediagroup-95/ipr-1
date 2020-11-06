<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\CheckAuthController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\User\User\ShowUserController;
use App\Http\Controllers\User\Product\AdminProductController;
use App\Http\Controllers\User\Product\SupplierProductController;
use App\Http\Controllers\User\Product\ClientProductController;
use App\Http\Controllers\User\Product\ShowProductController;
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

    Route::get('/products', [ShowProductController::class, 'list']);
    Route::get('/products/show/{product}', [ShowProductController::class, 'single']);

    Route::middleware('can:onlyAdmin')->group(function () {
        Route::get('/users', [ShowUserController::class, 'list']);
        Route::get('/users/{user}', [ShowUserController::class, 'single']);

        Route::post('/products/ban/{product}', [AdminProductController::class, 'banProduct']);
    });

    Route::middleware('can:onlySupplier')->group(function () {
        Route::post('/products/create', [SupplierProductController::class, 'create']);
        Route::get('/products/edit/{product}', [SupplierProductController::class, 'edit']);
        Route::post('/products/update/{product}', [SupplierProductController::class, 'update']);
        Route::post('/products/delete/{product}', [SupplierProductController::class, 'delete']);
    });

    Route::middleware('can:onlyClient')->group(function () {
        Route::post('/products/confirm/{product}', [ClientProductController::class, 'confirmProduct']);
    });

});
