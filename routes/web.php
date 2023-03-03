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




//Homepage	r
Route::get('WelcomeAboutUs', [App\Http\Controllers\WelcomeController::class, 'WelcomeAboutUs'])->name('WelcomeAboutUs');

Route::get('WelcomeContactUs', [App\Http\Controllers\WelcomeController::class, 'WelcomeContactUs'])->name('WelcomeContactUs');

Route::get('WelcomeMap', [App\Http\Controllers\WelcomeController::class, 'WelcomeMap'])->name('WelcomeMap');

Route::get('ContactUs', function () { return view('ContactUs');})->name('ContactUs');

Route::get('Map', function () { return view('Map');})->name('Map');




Auth::routes(['verify' => true]);

//Admin
Route::middleware(['auth', 'Admin'])->group(function(){
	Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
	

	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@admin_edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::get('newpage', function () {return view('Admin.pages.newpage');})->name('newpage');

	//Reservation
		//Front Desk
		Route::get('FrontDesk', [App\Http\Controllers\HotelController::class, 'front_desk'])->name('FrontDesk');

		Route::get('EventInquiryForm', function () {return view('Admin.pages.Reservations.EventInquiryForm');})->name('EventInquiryForm'); 
		Route::get('CommercialSpaceForm', function () {return view('Admin.pages.CommercialSpaces.CommercialSpaceForm');})->name('CommercialSpaceForm'); 
		
		Route::post('HotelReservationForm', 'App\Http\Controllers\HotelController@store');
		Route::get('/update_hotel_payment/{id}/{no}/{check}', 'App\Http\Controllers\HotelController@update_payment');
		Route::get('/update_booking_status/{id}/{no}/{check}/{stats}', 'App\Http\Controllers\HotelController@update_booking_status');

		Route::get('HotelReservationForm', [App\Http\Controllers\HotelController::class, 'hotel_reservation_form'])->name('HotelReservationForm');

	//For Housekeeping and Maintenance

		Route::get('Housekeeping_Dashboard', [App\Http\Controllers\HousekeepingController::class, 'housekeeping_dashboard'])->name('Housekeeping_Dashboard');

		Route::post('/assign_housekeepers', 'App\Http\Controllers\HousekeepingController@assign_housekeeper');

		Route::post('/supply_requests', 'App\Http\Controllers\HousekeepingController@supply_request');
		Route::post('/linen_requests', 'App\Http\Controllers\HousekeepingController@linen_request');

		Route::post('/deduct_supplies', 'App\Http\Controllers\HousekeepingController@deduct_supply');
		Route::get('/update_housekeeping_stats/{room_no}/{id}/{status}/{req}', 'App\Http\Controllers\HousekeepingController@update_housekeeping_status');
		Route::post('/check_linens', 'App\Http\Controllers\HousekeepingController@check_linen');

		Route::get('Linen_Monitoring', [App\Http\Controllers\HousekeepingController::class, 'linen_monitoring'])->name('Linen_Monitoring');
		
		Route::get('LostandFound', function () {return view('Admin.pages.HousekeepingForms.LostandFound');})->name('LostandFound');

		Route::get('Maintenance', [App\Http\Controllers\MaintenanceController::class, 'Maintenance'])->name('Maintenance');
		
		Route::post('add_out_of_orders', 'App\Http\Controllers\MaintenanceController@add_out_of_order');

		Route::get('Guest_Request', [App\Http\Controllers\MaintenanceController::class, 'Guest_Request'])->name('Guest_Request');

		Route::post('add_guest_request', 'App\Http\Controllers\MaintenanceController@add_guest_request');

		Route::get('/update_maintenance_stats/{id}/{rno}/{bno}/{due}', 'App\Http\Controllers\MaintenanceController@update_maintenance_status');

		Route::post('/assign_housekeepers_supplies', 'App\Http\Controllers\HousekeepingController@assign_housekeeper_supplies');

		Route::post('/assign_housekeepers_linens', 'App\Http\Controllers\HousekeepingController@assign_housekeeper_linens');



		Route::get('Hotel_Room_Management', [App\Http\Controllers\RoomController::class, 'Hotel_Rooms'])->name('Dashboard');

		Route::post('/add_rooms', 'App\Http\Controllers\RoomController@add_rooms');
		Route::post('/edit_rooms', 'App\Http\Controllers\RoomController@edit_rooms');
		Route::post('/update_rooms', 'App\Http\Controllers\RoomController@update_rooms');

		Route::get('Key_Management', [App\Http\Controllers\RoomController::class, 'Key_Management'])->name('Key_Management');

		Route::get('Housekeeping_Reports', [App\Http\Controllers\HousekeepingController::class, 'housekeeping_reports'])->name('Housekeeping_Reports');


		//Hotel
		Route::get('StockCount', [App\Http\Controllers\InventoryController::class, 'Hotel_Rooms'])->name('Dashboard');

		Route::post('/edit_stock', 'App\Http\Controllers\InventoryController@edit_stock');
		Route::post('/addstock', 'App\Http\Controllers\InventoryController@addstock');



	
	//Event inquiry
		Route::get('EventInquiryForm', [App\Http\Controllers\EventController::class, 'event_inquiry'])->name('EventInquiryForm');
		Route::get('EventInquiryForm', [App\Http\Controllers\EventController::class, 'event_inquiry'])->name('EventInquiryForm');
		Route::get('/event_view/{id}', 'App\Http\Controllers\EventController@event_view');
		Route::post('/update_status', 'App\Http\Controllers\EventController@update_status');
	//Commercial Spaces
		Route::get('CommercialSpaceForm', [App\Http\Controllers\CommercialSpacesController::class, 'commercial_spaces'])->name('CommercialSpaceForm');
		Route::get('CommercialSpaceForm', [App\Http\Controllers\CommercialSpacesController::class, 'commercial_spaces'])->name('CommercialSpaceForm');
		Route::get('/commercial_space_view/{id}', 'App\Http\Controllers\CommercialSpacesController@commercial_space_view');

	//Room Management
	Route::get('Hotel_Room_Management', [App\Http\Controllers\RoomController::class, 'Hotel_Rooms'])->name('Dashboard');

	Route::post('/add_rooms', 'App\Http\Controllers\RoomController@add_rooms');
	Route::post('/edit_rooms', 'App\Http\Controllers\RoomController@edit_rooms');
	Route::post('/update_rooms', 'App\Http\Controllers\RoomController@update_rooms');

	Route::get('Key_Management', [App\Http\Controllers\RoomController::class, 'Key_Management'])->name('Key_Management');

	//Back Office
		Route::get('BackOffice', function () {return view('Admin.pages.BackOffice');})->name('BackOffice');

	
	//Operation Management
		//Reservation
		Route::get('Reservation', function () {return view('Admin.pages.OperationManagement.Reservation');})->name('Reservation'); 
		Route::get('RoomAvailable', function () {return view('Admin.pages.OperationManagement.RoomAvailable');})->name('RoomAvailable');
		Route::get('Request', function () {return view('Admin.pages.OperationManagement.Request');})->name('Request'); 
		Route::get('Complaints', function () {return view('Admin.pages.OperationManagement.Complaints');})->name('Complaints');
		Route::get('Complaints', [App\Http\Controllers\ComplaintsController::class, 'Complaints'])->name('Complaints'); 
		Route::get('Inventory', function () {return view('Admin.pages.OperationManagement.Inventory');})->name('Inventory'); 
		//Guest Receipt
		Route::get('GuestFolio', function () {return view('Admin.pages.OperationManagement.GuestFolio');})->name('GuestFolio'); 
	

	// //Stock Purchase Report
	// 	Route::post('/report', 'App\Http\Controllers\PurchaseReportController@report');
	// 	Route::post('/edit_report', 'App\Http\Controllers\PurchaseReportController@edit_report');
	// 	Route::post('/add', 'App\Http\Controllers\PurchaseReportController@add');
	// 	Route::post('/supply_approval', 'App\Http\Controllers\PurchaseReportController@supply_approval');
	// 	Route::get('StockPurchaseReport', [App\Http\Controllers\PurchaseReportController::class, 'SupplyRequest'])->name('StockPurchaseReport');
		
	
	//Stock Availability
	// Route::post('/addrequest', 'App\Http\Controllers\PurchaseReportController@addrequest');

	// 	Route::get('StockAvailability', function () {
	// 		$list = DB::select('SELECT * FROM hotelstocks');
	// 		$list2 = DB::select('SELECT * FROM stockscenters');
	// 		$list3 = DB::select('SELECT * FROM stocksfunctions');
	// 		$list4= DB::select('SELECT * FROM hotel_room_supplies');
	// 		$check = DB::select('SELECT COUNT(*) as cnt FROM hotelstocks');
	// 		$check2 = DB::select("SELECT COUNT(*) as cnt FROM hotel_room_supplies WHERE Status = 'Requested'");


	// 	$count = array();
	// 	$count2 = array();

	// 	foreach($check as $checks)
	// 	{
	// 		$count[] = ['counts' => $checks->cnt];
	// 	}

	// 	foreach($check2 as $checks)
	// 	{
	// 		$count2[] = ['counts' => $checks->cnt];
	// 	}

	// 		return view('Admin.pages.Inventory.StockAvailability',['list'=>$list, 'list2'=>$list2, 'list3'=>$list3, 'list4'=>$list4, 'count'=>$count, 'count2' => $count2]);})->name('StockAvailability');
			
	// 		//Stock Avail
	// 	Route::get('StockAvail', function () {
	// 		$list = DB::select('SELECT * FROM hotelstocks');
	// 		$list2 = DB::select('SELECT * FROM stocksfunctions');
	// 		$list3 = DB::select('SELECT * FROM stockscenters');
	// 		return view('Admin.pages.Inventory.StockAvail',['list'=>$list, 'list2'=>$list2, 'list3'=>$list3]);})->name('StockAvail');
	
	//Finance
		Route::post('/update_info', 'App\Http\Controllers\FinanceController@update_info');
		Route::post('/addinfo', 'App\Http\Controllers\FinanceController@addinfo');
		
		Route::get('Finance', function () {
			$list = DB::select('SELECT * FROM finances');
			return view('Admin.pages.Finance', ['list'=>$list]);})->name('Finance');
			//Finance Dashboard
		Route::get('FinanceDashboard', function () {return view('Admin.pages.FinanceDashboard');})->name('FinanceDashboard');

		//Finance Daily Report
		Route::post('/insertfinance', 'App\Http\Controllers\FinanceReportController@insertfinance');
		Route::post('/edit', 'App\Http\Controllers\FinanceReportController@edit');
		
		Route::get('DailyReport', function () {
			$list = DB::select('SELECT * FROM finance_2_reports');
			

			return view('Admin.pages.Finances.DailyReport', ['list'=>$list]);})->name('DailyReport');
			
			

			


	//GuestManagement
		Route::post('guestloggedin', 'App\Http\Controllers\GuestTicketsController@ticket');

	//Calendar
		//Route::get('/Hotel_Calendar', [App\Http\Controllers\HotelController::class, 'Hotel_Calendar'])->name('Hotel_Calendar');
		Route::get('Calendar', [App\Http\Controllers\AdminController::class, 'Calendar'])->name('Calendar');
		Route::post('hotel_sched', 'App\Http\Controllers\AdminController@hotel_sched');

	//User management
		Route::get('UserManagement', [App\Http\Controllers\UserManagementController::class, 'Usermanagement'])->name('UserManagement');
		Route::post('/create_new_user', 'App\Http\Controllers\UserManagementController@create_new_user');



	//Inventory Management
	//Hotel Inventory
	Route::get('StockCount', [App\Http\Controllers\InventoryController::class, 'StockHotel'])->name('StockCount');
	Route::post('/edit_stock', 'App\Http\Controllers\InventoryController@edit_stock');
	Route::post('/addstock', 'App\Http\Controllers\InventoryController@addstock');
	Route::post('/add_stock_room', 'App\Http\Controllers\InventoryController@add_stock_room');

	//Convention Center Inventory
	Route::get('StockCenter', [App\Http\Controllers\InventoryCenterController::class, 'StockCenter'])->name('StockCenter');
	Route::post('/edit_stock_center', 'App\Http\Controllers\InventoryCenterController@edit_stock_center');
	Route::post('/addstock_center', 'App\Http\Controllers\InventoryCenterController@addstock_center');

	//Linen Request
	Route::get('StockHotelLinen', [App\Http\Controllers\InventoryHotelLinenController::class, 'LinenRequest'])->name('StockHotelLinen');
	Route::post('/linen_request_approval', 'App\Http\Controllers\InventoryHotelLinenController@linen_request_approval');

	//Supplies Request
	Route::get('StockHotelSupply', [App\Http\Controllers\InventoryHotelSupplyController::class, 'SupplyRequest'])->name('StockHotelSupply');
	Route::post('/supply_request_approval', 'App\Http\Controllers\InventoryHotelSupplyController@supply_request_approval');

	//Inventory Reports
	Route::get('StockReports', [App\Http\Controllers\InventoryController::class, 'StockReport'])->name('StockReports');
	


	
});

//Guest
Route::middleware(['auth', 'Guest'])->group(function(){
	Route::get('/welcome', [App\Http\Controllers\GuestController::class, 'welcome'])->name('welcome');
	Route::get('/guest_profile', [App\Http\Controllers\GuestController::class, 'guest_profile'])->name('guest_profile');
	Route::get('/my_bookings', [App\Http\Controllers\GuestController::class, 'my_bookings'])->name('my_bookings');
	Route::get('/about_us', [App\Http\Controllers\GuestController::class, 'about_us'])->name('about_us');
	Route::get('/contact_us', [App\Http\Controllers\GuestController::class, 'contact_us'])->name('contact_us');
	Route::get('/map', [App\Http\Controllers\GuestController::class, 'map'])->name('map');
	Route::get('/guest_event', [App\Http\Controllers\GuestController::class, 'guest_event'])->name('guest_event');
	Route::get('/guest_commercial', [App\Http\Controllers\GuestController::class, 'guest_commercial'])->name('guest_commercial');
	Route::get('/suites', [App\Http\Controllers\GuestController::class, 'suites'])->name('suites');
	Route::get('/convention_center', [App\Http\Controllers\GuestController::class, 'convention_center'])->name('convention_center');
	Route::get('/function_room', [App\Http\Controllers\GuestController::class, 'function_room'])->name('function_room');
	Route::get('/commercial_spaces', [App\Http\Controllers\GuestController::class, 'commercial_spaces'])->name('commercial_spaces');
	Route::post('/guest_reservation', 'App\Http\Controllers\GuestController@guest_reservation');
	Route::get('/event_form', [App\Http\Controllers\GuestController::class, 'event_form'])->name('event_form');
	Route::post('/convention_center_submit', 'App\Http\Controllers\GuestController@convention_center_application');
	Route::post('/commercial_spaces_submit', 'App\Http\Controllers\GuestController@commercial_spaces_application');
	Route::get('/complaints', [App\Http\Controllers\GuestController::class, 'complaints'])->name('complaints');
	Route::post('/complaints_submit', 'App\Http\Controllers\GuestController@complaints_submit');
	Route::get('/rooms', [App\Http\Controllers\GuestController::class, 'rooms'])->name('rooms');
	Route::get('/FAQ', [App\Http\Controllers\GuestController::class, 'FAQ'])->name('FAQ');
});
	
//Housekeeper
Route::middleware(['auth', 'Housekeeper'])->group(function(){
	//Housekeeping Dashboard
	Route::get('Housekeeper_Dashboard', [App\Http\Controllers\HousekeeperController::class, 'housekeeper_dashboard'])->name('Housekeeper_Dashboard');
	//Linen Monitoring
	Route::get('Linens_Monitoring', [App\Http\Controllers\HousekeeperController::class, 'linen_monitoring'])->name('Linens_Monitoring');
	//Maintenance
	Route::get('Maintenances', [App\Http\Controllers\HousekeeperController::class, 'Maintenance'])->name('Maintenances');
	//Guest Request
	Route::get('Guest_Requests', [App\Http\Controllers\HousekeeperController::class, 'Guest_Request'])->name('Guest_Requests');
	//Housekeeping Reports
	Route::get('Housekeeping_Report', [App\Http\Controllers\HousekeeperController::class, 'housekeeping_reports'])->name('Housekeeping_Report');

	Route::post('/supply_request', 'App\Http\Controllers\HousekeeperController@supply_request');
	Route::post('/linen_request', 'App\Http\Controllers\HousekeeperController@linen_request');

	Route::post('/deduct_supply', 'App\Http\Controllers\HousekeeperController@deduct_supply');
	Route::get('/update_housekeeping_status/{room_no}/{id}/{status}/{req}', 'App\Http\Controllers\HousekeeperController@update_housekeeping_status');
	Route::post('/check_linen', 'App\Http\Controllers\HousekeeperController@check_linen');
	Route::post('/assign_housekeeper', 'App\Http\Controllers\HousekeeperController@assign_housekeeper');

	Route::post('add_out_of_order', 'App\Http\Controllers\HousekeeperController@add_out_of_order');
	Route::get('/update_maintenance_status/{id}/{rno}/{bno}/{due}', 'App\Http\Controllers\HousekeeperController@update_maintenance_status');

	Route::post('/assign_housekeepers_supply', 'App\Http\Controllers\HousekeeperController@assign_housekeeper_supplies');

	Route::post('/assign_housekeepers_linen', 'App\Http\Controllers\HousekeeperController@assign_housekeeper_linens');

});

