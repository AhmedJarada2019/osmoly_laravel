<?php

use App\Http\Controllers\ArrestReceiptsController;
use App\Http\Controllers\BuyfatoraController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FatoraController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentreceiptController;
use App\Http\Controllers\SalefatoraController;
use App\Http\Controllers\VendorController;
use App\Models\buyfatora;
use Database\Factories\SalefatoraFactory;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/addUser', function () {return view('addUser');});

Route::post('/customer_report', [App\Http\Controllers\customer_report::class, 'customer_report'])->name('customer_report');
Route::post('/vendor_report', [App\Http\Controllers\Vendor_report::class, 'vendor_report'])->name('vendor_report');
Route::resource('salefatora', SalefatoraController::class);
Route::resource('buyfatora', BuyfatoraController::class);
Route::resource('customer', CustomerController::class);
Route::resource('vendor', VendorController::class);
Route::resource('city', CityController::class);
Route::resource('fatoras', FatoraController::class);
Route::resource('paymentreceipts', PaymentreceiptController::class);
//ArrestReceiptsController resource route
Route::resource('arrestreceipts', ArrestReceiptsController::class);

});

