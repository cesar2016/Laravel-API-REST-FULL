<?php

use App\Http\Controllers\ApiguzzleController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user(); 
    
});

Route::group(['middleware' => 'auth:sanctum'], function () {

    // CLIENTS Rout API
    Route::get('clients', [ClientController::class, 'index']);
    Route::post('client/create', [ClientController::class, 'store']);
    Route::get('client/find/{id}', [ClientController::class, 'clientfind']);
    Route::put('client/update/{id}', [ClientController::class, 'update']);
    Route::delete('client/delete/{id}', [ClientController::class, 'destroy']);
    
    // PRODUCTS Rout API
    Route::apiResource('product', ProductController::class); 
    Route::get('product/find/{id}', [ProductController::class, 'productfind']); 
   
    // Delete token
    Route::post('outToken', [ClientController::class, 'outToken']); 
      

}); 

Route::post('guzz', [ApiguzzleController::class, 'guzzEndpoints'])->name('guzz'); 
Route::post('guzzSearch', [ApiguzzleController::class, 'guzzSearch'])->name('guzzSearch'); 

Route::post('acceso', [RegisterController::class, 'acceso']);


 


