<?php
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');


//car Related
Route::resource('carBrand', 'Car\Brand\CarBrandController');

Route::post('carBrandUpdate', 'Car\Brand\CarBrandController@update');
Route::resource('carType', 'Car\Type\CarTypeController');
Route::resource('carMaster', 'Car\Master\CarMasterController');

  
// Route::resource('products', ProductController::class);