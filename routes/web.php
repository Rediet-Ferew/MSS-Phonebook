<?php

use Illuminate\Support\Facades\Auth;
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
use App\Http\Controllers\OTPVerificationController;
use App\Http\Middleware\PaymentVerificationMiddleware;


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
})->middleware('auth');



Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('/regions', RegionController::class);

    Route::resource('/cities', CityController::class);

    Route::resource('/subcities', SubcityController::class);

    Route::resource('/woredas', WoredaController::class);

    Route::resource('/categories', CategoryController::class);

    Route::resource('/packages', PackageController::class);

    Route::post('/companies', [CompanyController::class, 'createCompany']);

    // Update a company
    Route::put('/companies/{id}', [CompanyController::class, 'updateCompany']);

    // Delete a company
    Route::delete('/companies/{id}', [CompanyController::class, 'deleteCompany']);
});
Route::get('/companies', [CompanyController::class, 'index'])
    ->name('companies.index')
    ->middleware(PaymentVerificationMiddleware::class);
// Route::get('/companies/{id}', [CompanyController::class, 'getCompany'])->name('companies.index')->middleware(PaymentVerificationMiddleware::class);
    
Auth::routes([
    'verify' => true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// The route that the button calls to initialize payment

Route::post('pay', 'App\Http\Controllers\PaymentController@initializePayment')->name('pay');

// The callback url after a payment
Route::get('callback/{reference}', 'App\Http\Controllers\PaymentController@callback')->name('callback');


Route::post('/send-otp', [OTPVerificationController::class, 'sendOTP']);

// Route::match(['get', 'post'], '/verify-otp', [OTPVerificationController::class, 'verifyOTP'])->name('verify-otp');

Route::get('/verify-otp', [OTPVerificationController::class, 'showOTPForm'])->name('verify-otp');
Route::post('/verify-otp', [OTPVerificationController::class, 'verifyOTP'])->name('verify-otp.verify');
