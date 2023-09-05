<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\WoredaController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SubcityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OTPVerificationController;

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

// api for regions table
Route::get('regions', [RegionController::class, 'getRegions']);
Route::get('regions/{id}', [RegionController::class, 'getRegion']);
Route::post('regions', [RegionController::class, 'createRegion']);
Route::put('regions/{id}', [RegionController::class, 'updateRegion']);
Route::delete('regions/{id}', [RegionController::class, 'deleteRegion']);

//api for cities table
Route::get('cities', [CityController::class, 'getCities']);
Route::get('cities/{id}', [CityController::class, 'getCity']);
Route::post('cities', [CityController::class, 'createCity']);
Route::put('cities/{id}', [CityController::class, 'updateCity']);
Route::delete('cities/{id}', [CityController::class, 'deleteCity']);
//api for subcities table
Route::get('subcities', [SubcityController::class, 'getSubcities']);
Route::get('subcities/{id}', [SubcityController::class, 'getSubcity']);
Route::post('subcities', [SubcityController::class, 'createSubcity']);
Route::put('subcities/{id}', [SubcityController::class, 'updateSubcity']);
Route::delete('subcities/{id}', [SubcityController::class, 'deleteSubcity']);

//api for woredas table
Route::get('woredas', [WoredaController::class, 'getWoredas']);
Route::get('woredas/{id}', [WoredaController::class, 'getWoreda']);
Route::post('woredas', [WoredaController::class, 'createWoreda']);
Route::put('woredas/{id}', [WoredaController::class, 'updateWoreda']);
Route::delete('woredas/{id}', [WoredaController::class, 'deleteWoreda']);

// api for categories table
Route::get('categories', [CategoryController::class, 'getCategries']);
Route::get('categories/{id}', [CategoryController::class, 'getCategory']);
Route::post('categories', [CategoryController::class, 'createCategory']);
Route::put('categories/{id}', [CategoryController::class, 'updateCategory']);
Route::delete('categories/{id}', [CategoryController::class, 'deleteCategory']);

//api for packages table
Route::get('packages', [PackageController::class, 'getPackages']);
Route::get('packages/{id}', [PackageController::class, 'getPackage']);
Route::post('packages', [PackageController::class, 'createPackage']);
Route::put('packages/{id}', [PackageController::class, 'updatePackage']);
Route::delete('packages/{id}', [PackageController::class, 'deletePackage']);

//api for companies table

Route::get('companies', [CompanyController::class, 'getCompanies']);
Route::get('companies/{id}', [CompanyController::class, 'getCompany']);
Route::post('companies', [CompanyController::class, 'createCompany']);
Route::put('companies/{id}', [CompanyController::class, 'updateCompany']);
Route::delete('companies/{id}', [CompanyController::class, 'deleteCompany']);


// Route::post('pay', 'App\Http\Controllers\ChapaController@initialize')->name('pay');

// // The callback url after a payment
// Route::get('callback/{reference}', 'App\Http\Controllers\ChapaController@callback')->name('callback');


// Route::post('/send-otp', [OTPVerificationController::class, 'sendOTP']);

// Route::post('/verify-otp', [OTPVerificationController::class, 'verifyOTP'])->name('verify-otp');
