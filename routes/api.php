<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// CLIENTS Rout API
Route::get('clients', [ClientController::class, 'index']);
Route::post('client/create', [ClientController::class, 'store']);
Route::get('client/find/{id}', [ClientController::class, 'clientfind']);
Route::put('client/update/{id}', [ClientController::class, 'update']);
Route::delete('client/delete/{id}', [ClientController::class, 'destroy']);

// PRODUCTS Rout API
Route::apiResource('product', ProductController::class);