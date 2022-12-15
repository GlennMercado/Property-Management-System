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




//Homepage	
Route::get('AboutUs', function () {return view('AboutUs');})->name('AboutUs');

Route::get('ContactUs', function () { return view('ContactUs');})->name('ContactUs');

Route::get('Map', function () { return view('Map');})->name('Map');





Auth::routes();

//Admin
Route::middleware(['auth', 'Admin'])->group(function(){
	Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@admin_edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::get('newpage', function () {return view('Admin.pages.newpage');})->name('newpage');

	//Reservation
	Route::get('EventInquiryForm', function () {return view('Admin.pages.Reservations.EventInquiryForm');})->name('EventInquiryForm'); 
	Route::get('CommercialSpaceForm', function () {return view('Admin.pages.CommercialSpaces.CommercialSpaceForm');})->name('CommercialSpaceForm'); 
	Route::post('HotelReservationForm', 'App\Http\Controllers\HotelController@store');
	Route::get('/update/{id}/{no}', 'App\Http\Controllers\HotelController@update_payment');
	
	Route::get('HotelReservationForm', function () {
		$list = DB::select('SELECT * FROM hotel_reservations');
		$room = DB::select('SELECT * FROM novadeci_suites');
		return view('Admin.pages.Reservations.HotelReservationForm', ['list'=>$list, 'room'=>$room]);})->name('HotelReservationForm');




	//For Housekeeping	
	Route::get('Housekeeping', function () {
		$list2 = DB::select('SELECT * FROM housekeepings a INNER JOIN novadeci_suites b ON a.Room_No = b.Room_No');
		return view('Admin.pages.HousekeepingForms.Housekeeping',['list2' =>$list2]);})->name('Dashboard');

	Route::post('/assign_housekeeper', 'App\Http\Controllers\HousekeepingController@assign_housekeeper');

	Route::post('/update_housekeeping_status', 'App\Http\Controllers\HousekeepingController@update_housekeeping_status');

	Route::get('LostandFound', function () {return view('Admin.pages.HousekeepingForms.LostandFound');})->name('LostandFound');


	//Front Desk
	Route::get('FrontDesk', function(){
		$room = DB::select('SELECT * FROM novadeci_suites');
		return view('Admin.pages.FrontDesk', ['room'=>$room]); })->name('FrontDesk');





	//Room Management
	Route::get('RoomManagement', function () {
		$list = DB::select('SELECT * FROM novadeci_suites');
		$list2 = DB::select('SELECT * FROM hotel_reservations WHERE Isvalid != 0');
		$list3 = DB::select('SELECT * FROM housekeepings');
		return view('Admin.pages.RoomManagement',['list'=>$list, 'list2'=>$list2, 'list3'=>$list3]);})->name('RoomManagement');

	Route::post('/add_rooms', 'App\Http\Controllers\RoomController@add_rooms');
	Route::post('/edit_rooms', 'App\Http\Controllers\RoomController@edit_rooms');
	Route::post('/update_rooms', 'App\Http\Controllers\RoomController@update_rooms');

	//Back Office
	Route::get('BackOffice', function () {return view('Admin.pages.BackOffice');})->name('BackOffice');

	//Inventory Management
	Route::post('StockCount', 'App\Http\Controllers\InventoryController@edit_stockC');
	Route::post('StockCount', 'App\Http\Controllers\InventoryController@addstock');
	Route::get('StockCount', function () {
		$list = DB::select('SELECT * FROM hotelstocks');
		return view('Admin.pages.Inventory.StockCount', ['list'=>$list]);})->name('StockCount');

	Route::post('/edit_stock', 'App\Http\Controllers\InventoryController@edit_stockC');
	Route::post('/add_stock', 'App\Http\Controllers\InventoryController@addstock');

	Route::post('StockPurchaseReport', 'App\Http\Controllers\PurchaseReportController@report');
	Route::get('StockPurchaseReport', function () {
		$list = DB::select('SELECT * FROM purchasereports');
		return view('Admin.pages.Inventory.StockPurchaseReport', ['list'=>$list]);})->name('StockPurchaseReport');

	Route::get('CreateInventory', function () {return view('Admin.pages.Inventory.CreateInventory');})->name('CreateInventory'); 

	Route::get('StockAvailability', function () {
		$list = DB::select('SELECT * FROM hotelstocks');
		return view('Admin.pages.Inventory.StockAvailability', ['list'=>$list]);})->name('StockAvailability');

	//GuestManagement
	Route::post('guestloggedin', 'App\Http\Controllers\GuestTicketsController@ticket');
	Route::get('Maintenance', function () {
		$list = DB::select('SELECT * FROM housekeepings a INNER JOIN novadeci_suites b ON a.Room_No = b.Room_No');
		return view('Admin.pages.Maintenance', ['list' => $list]);})->name('Maintenance');
});

//Guest
Route::middleware(['auth', 'Guest'])->group(function(){
	Route::get('/welcome', [App\Http\Controllers\GuestController::class, 'welcome'])->name('welcome');
	Route::get('/about_us', [App\Http\Controllers\GuestController::class, 'about_us'])->name('about_us');
	Route::get('/contact_us', [App\Http\Controllers\GuestController::class, 'contact_us'])->name('contact_us');
	Route::get('/map', [App\Http\Controllers\GuestController::class, 'map'])->name('map');

	Route::post('/guest_reservation', 'App\Http\Controllers\GuestController@guest_reservation');
});
