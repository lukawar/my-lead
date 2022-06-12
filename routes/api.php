<?php

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
#auth
Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);

Route::get('product', [App\Http\Controllers\ProductController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    //category
    Route::post('add/category', [App\Http\Controllers\CategoryController::class, 'add']);

    //Product
    Route::post('product', [App\Http\Controllers\ProductController::class, 'add']);
    Route::put('product', [App\Http\Controllers\ProductController::class, 'update']);
    Route::delete('product', [App\Http\Controllers\ProductController::class, 'delete']);
});
