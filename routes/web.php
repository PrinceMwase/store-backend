<?php


use Illuminate\Support\Facades\Route;

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

Route::get('/{any?}', [
    function () {
        return view('welcome');
    }
])->where('any', '.*');


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('/home', 'HomeController@index')->name('home');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cart', 'sanctum\TransactionController@addTocart');


// product Route
    Route::resource('products', 'web\ProductController');

// photo Route
Route::resource('photos', 'web\PhotoController');

// store Route
Route::resource('stores', 'web\StoreController');