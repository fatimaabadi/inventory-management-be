<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProductTypeController;



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


use App\Http\Controllers\ItemProductController;

Route::get('/items/{productTypeId}', [ItemProductController::class, 'index']);
Route::post('/items', [ItemProductController::class, 'store']);
Route::put('/items/{id}/sold', [ItemProductController::class, 'updateSoldStatus']);
Route::patch('/items/{id}/sold', [ItemProductController::class, 'updateSoldStatus']);
Route::delete('/items/{id}', [ItemProductController::class, 'destroy']);




// Remove or comment out the middleware
//Route::prefix('v2')->group(function () {
    //Route::apiResource('product-types', ProductTypeController::class);
//});



Route::prefix('v2')->group(function () {
    // Add the 'auth:sanctum' middleware here
    Route::apiResource('product-types', ProductTypeController::class)
        ->middleware('auth:sanctum'); // Enforce authentication for product types routes
});



// Protected routes: only accessible if a valid JWT is provided

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::options('/{any}', function () {
    return response()->json([]);
})->where('any', '.*');