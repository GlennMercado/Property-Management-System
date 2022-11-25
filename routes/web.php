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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('EventInquiryForm', function () {return view('pages.EventInquiryForm');})->name('EventInquiryForm'); 
	Route::get('CommercialSpaceForm', function () {return view('pages.CommercialSpaceForm');})->name('CommercialSpaceForm'); 
	Route::get('HotelReservationForm', function () {return view('pages.HotelReservationForm');})->name('HotelReservationForm');
	Route::get('newpage', function () {return view('pages.newpage');})->name('newpage');
	Route::get('AboutUs', function () {return view('pages.AboutUs');})->name('AboutUs');

	//For HousekeepingandMaintenance
	Route::get('Dashboard', function () {return view('pages.HousekeepingForms.Dashboard');})->name('Dashboard');
	Route::get('RoomManagement', function () {return view('pages.HousekeepingForms.RoomManagement');})->name('RoomManagement');
	Route::get('Maintenance', function () {return view('pages.HousekeepingForms.Maintenance');})->name('Maintenance');
	Route::get('LostandFound', function () {return view('pages.HousekeepingForms.LostandFound');})->name('LostandFound');

	//Back Office
	Route::get('BackOffice', function () {return view('pages.BackOffice');})->name('BackOffice');

	//Inventory Management
	Route::get('StockCount', function () {return view('pages.Inventory.StockCount');})->name('StockCount'); 
	Route::get('StockAvailability', function () {return view('pages.Inventory.StockAvailability');})->name('StockAvailability'); 
	Route::get('StockForecastingReport', function () {return view('pages.Inventory.StockForecastingReport');})->name('StockForecastingReport');  
	Route::get('StockPurchaseReport', function () {return view('pages.Inventory.StockPurchaseReport');})->name('StockPurchaseReport'); 
	Route::get('StockReport', function () {return view('pages.Inventory.StockReport');})->name('StockReport'); 

	//GuestManagement
	
});

