<?php

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

// sanctum middleware Group
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    // Product routes
    Route::resource('product', 'sanctum\ProductController');
  
    Route::resource('store', 'sanctum\StoreController');

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// remember to put in middleware



Route::group(['middleware' => ['api']], function () {
    //
    Route::resource('store', 'sanctum\StoreController');
});
    