<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ChapaController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\WoredaController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SubcityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestEmailController;


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
    return view('dummy');
});

Auth::routes([
    'verify' => true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('admin/regions', RegionController::class);

Route::resource('admin/cities', CityController::class);

Route::resource('admin/subcities', SubcityController::class);

Route::resource('admin/woredas', WoredaController::class);

Route::resource('admin/categories', CategoryController::class);

Route::resource('admin/packages', PackageController::class);

Route::resource('admin/companies', CompanyController::class);

// The route that the button calls to initialize payment

Route::post('pay', 'App\Http\Controllers\ChapaController@initialize')->name('pay');

// The callback url after a payment
Route::get('callback/{reference}', 'App\Http\Controllers\ChapaController@callback')->name('callback');