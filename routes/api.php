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

    Route::resource('location', 'sanctum\LocationController');

    Route::resource('subLocation', 'sanctum\SubLocationsController');

    Route::resource('category', 'sanctum\CategoryController');
    
    Route::get('addToCart/{id}', 'sanctum\TransactionController@addToCart' );
    Route::get('getCart', 'sanctum\TransactionController@getCart');
    Route::get('getCartTotal', 'sanctum\TransactionController@getCartTotal');
  
    Route::resource('user', 'sanctum\UserController');

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// remember to put in middleware




    //
    Route::resource('store', 'sanctum\StoreController');

   



    