<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	
	Route::get('newpage', function () {return view('pages.newpage');})->name('newpage');
	Route::get('AboutUs', function () {return view('pages.AboutUs');})->name('AboutUs');

	//Homepage
	Route::post('welcome', 'App\Http\Controllers\WelcomeController@store');
	Route::get('welcome', function () {
		$list = DB::select('SELECT * FROM hotel_reservations');
		return view('welcome', ['list'=>$list]);})->name('welcome');

	//Reservation
	Route::get('EventInquiryForm', function () {return view('pages.Reservations.EventInquiryForm');})->name('EventInquiryForm'); 
	Route::get('CommercialSpaceForm', function () {return view('pages.Reservations.CommercialSpaceForm');})->name('CommercialSpaceForm'); 
	Route::post('HotelReservationForm', 'App\Http\Controllers\HotelController@store');
	Route::get('HotelReservationForm', function () {
		$list = DB::select('SELECT * FROM hotel_reservations');
		return view('pages.Reservations.HotelReservationForm', ['list'=>$list]);})->name('HotelReservationForm');

	//For Housekeeping
	Route::post('Maintenance', 'App\Http\Controllers\HousekeepingController@add_maintenance');
	

	Route::get('Dashboard', function () {return view('pages.HousekeepingForms.Dashboard');})->name('Dashboard');
	
	Route::get('Maintenance', function () {
		$list = DB::select('SELECT * FROM add_maintenances');
		return view('pages.HousekeepingForms.Maintenance', ['list'=>$list]);})->name('Maintenance');	
	
	Route::get('LostandFound', function () {return view('pages.HousekeepingForms.LostandFound');})->name('LostandFound');

	//Room Management
	Route::get('RoomManagement', function () {
		$list = DB::select('SELECT * FROM novadeci_suites');
		return view('pages.RoomManagement',['list'=>$list]);})->name('RoomManagement');

	Route::post('RoomManagement', 'App\Http\Controllers\RoomController@add_rooms');
	
	//Back Office
	Route::get('BackOffice', function () {return view('pages.BackOffice');})->name('BackOffice');

	//Inventory Management
	Route::post('StockCount', 'App\Http\Controllers\InventoryController@addstock');
	Route::get('StockCount', function () {
		$list = DB::select('SELECT * FROM hotelstocks');
		return view('pages.Inventory.StockCount', ['list'=>$list]);})->name('StockCount');

	Route::get('StockPurchaseReport', function () {
		$list = DB::select('SELECT * FROM purchasereport');
		return view('pages.Inventory.StockPurchaseReport', ['list'=>$list]);})->name('StockPurchaseReport');
	Route::get('CreateInventory', function () {return view('pages.Inventory.CreateInventory');})->name('CreateInventory'); 
	
	Route::get('StockAvailability', function () {
		$list = DB::select('SELECT * FROM hotelstocks');
		return view('pages.Inventory.StockAvailability', ['list'=>$list]);})->name('StockAvailability');

	//GuestManagement
	Route::get('GuestTicket', function () {return view('pages.Guestmanage.GuestTicket');})->name('GuestTicket');
	Route::get('GuestTicketManager', function () {return view('pages.Guestmanage.GuestTicketManager');})->name('GuestTicketManager'); 
	
	
});

