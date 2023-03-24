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

Route::get('FAQs', function () { return view('FAQs');})->name('FAQs');

Route::get('Map', function () { return view('Map');})->name('Map');

Route::get('Welcomerooms', [App\Http\Controllers\WelcomeController::class, 'Welcomerooms'])->name('Welcomerooms');


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
		Route::get('/invoice/{id}', 'App\Http\Controllers\HotelController@invoice');
		Route::get('HotelReservationForm', [App\Http\Controllers\HotelController::class, 'hotel_reservation_form'])->name('HotelReservationForm');
		Route::get('GuestFolio', [App\Http\Controllers\GuestFolioController::class, 'guest_folio'])->name('GuestFolio');
	//For Housekeeping and Maintenance

		Route::get('Housekeeping_Dashboard', [App\Http\Controllers\HousekeepingController::class, 'housekeeping_dashboard'])->name('Housekeeping_Dashboard');

		Route::get('List_of_Housekeepers', [App\Http\Controllers\HousekeepingController::class, 'List_of_Housekeepers'])->name('List_of_Housekeepers');

		Route::post('/add_housekeeper', 'App\Http\Controllers\HousekeepingController@add_housekeeper');

		Route::post('/assign_housekeepers', 'App\Http\Controllers\HousekeepingController@assign_housekeeper');

		Route::post('/supply_requests', 'App\Http\Controllers\HousekeepingController@supply_request');
		Route::post('/linen_requests', 'App\Http\Controllers\HousekeepingController@linen_request');

		Route::post('/deduct_supplies', 'App\Http\Controllers\HousekeepingController@deduct_supply');
		Route::get('/update_housekeeping_stats/{hk}/{id}/{status}/{req}', 'App\Http\Controllers\HousekeepingController@update_housekeeping_status');
		Route::post('/check_linens', 'App\Http\Controllers\HousekeepingController@check_linen');

		Route::get('Linen_Monitoring', [App\Http\Controllers\HousekeepingController::class, 'linen_monitoring'])->name('Linen_Monitoring');
		
		Route::get('LostandFound', [App\Http\Controllers\HousekeepingController::class, 'LostandFound'])->name('LostandFound');
		
		Route::post('/add_lost_item', 'App\Http\Controllers\HousekeepingController@add_lost_item');
		
		Route::post('/update_lost_item_status', 'App\Http\Controllers\HousekeepingController@update_lost_item_status');
		Route::post('/auctioned_or_disposed_item', 'App\Http\Controllers\HousekeepingController@auctioned_or_disposed_item');
		
		
		Route::get('Maintenance', [App\Http\Controllers\MaintenanceController::class, 'Maintenance'])->name('Maintenance');
		
		Route::post('add_out_of_orders', 'App\Http\Controllers\MaintenanceController@add_out_of_order');

		Route::get('Guest_Request', [App\Http\Controllers\MaintenanceController::class, 'Guest_Request'])->name('Guest_Request');

		Route::post('add_guest_request', 'App\Http\Controllers\MaintenanceController@add_guest_request');

		Route::get('/update_maintenance_stats/{id}/{rno}/{bno}/{due}', 'App\Http\Controllers\MaintenanceController@update_maintenance_status');

		Route::post('/assign_housekeepers_supplies', 'App\Http\Controllers\HousekeepingController@assign_housekeeper_supplies');

		Route::post('/assign_housekeepers_linens', 'App\Http\Controllers\HousekeepingController@assign_housekeeper_linens');

		Route::get('Housekeeping_Reports', ['uses' => 'App\Http\Controllers\HousekeepingController@reports', 'as' => 'Housekeeping_Reports.reports']);
		
		Route::get('Hotel_Room_Management', [App\Http\Controllers\RoomController::class, 'Hotel_Rooms'])->name('Dashboard');

		Route::post('/add_rooms', 'App\Http\Controllers\RoomController@add_rooms');
		Route::post('/edit_rooms', 'App\Http\Controllers\RoomController@edit_rooms');
		Route::post('/update_rooms', 'App\Http\Controllers\RoomController@update_rooms');

		Route::get('Key_Management', [App\Http\Controllers\RoomController::class, 'Key_Management'])->name('Key_Management');

		

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
		Route::get('Guest_Reservation', function () {return view('Admin.pages.OperationManagement.Guest_Reservation');})->name('Guest_Reservation');

		Route::get('Complaints', function () {return view('Admin.pages.OperationManagement.Complaints');})->name('Complaints');
		
		Route::get('Reports', ['uses' => 'App\Http\Controllers\OperationManagementController@Operation_Reports', 'as' => 'Reports.Operation_Reports']);
		
		Route::get('Complaints', [App\Http\Controllers\ComplaintsController::class, 'Complaints'])->name('Complaints'); 
		
		
		Route::get('Requests', [App\Http\Controllers\OperationManagementController::class, 'Operation_Requests'])->name('Requests');
		
		Route::get('/update_service_request/{id}/{bs}', 'App\Http\Controllers\OperationManagementController@update_service_request');
		Route::post('/set_stats', 'App\Http\Controllers\OperationManagementController@set_stats');
		Route::get('/update_item_request/{id}', 'App\Http\Controllers\OperationManagementController@update_item_request');
		
		Route::get('OperationRooms', [App\Http\Controllers\OperationManagementController::class, 'OperationRooms'])->name('OperationRooms');
		Route::get('OperationDashboard', [App\Http\Controllers\OperationManagementController::class, 'OperationDashboard'])->name('OperationDashboard');
		//Financemodule
		//Archives
		Route::post('/update_info', 'App\Http\Controllers\FinanceController@update_info');
		Route::post('/addinfo', 'App\Http\Controllers\FinanceController@addinfo');
		Route::get('FinanceArchives', [App\Http\Controllers\FinanceController::class, 'finance_archives'])->name('FinanceArchives');
			
		//Finance Dashboards
		Route::get('FinanceDashboard', [App\Http\Controllers\FinanceController::class, 'finance_dash'])->name('FinanceDashboard');

		//Finance Daily Report
		Route::post('/insertfinance', 'App\Http\Controllers\FinanceReportController@insertfinance');
		Route::post('/edit', 'App\Http\Controllers\FinanceReportController@edit');
		
		// Route::get('DailyReport', function () {
		// 	$list = DB::select('SELECT * FROM finance_2_reports');
			

		// 	return view('Admin.pages.Finances.DailyReport', ['list'=>$list]);})->name('DailyReport');

			Route::get('DailyReport', ['uses' => 'App\Http\Controllers\FinanceReportController@reports', 'as' => 'DailyReport.reports']);
			
			

			


	//GuestManagement
		Route::post('guestloggedin', 'App\Http\Controllers\GuestTicketsController@ticket');

	//Calendar
		//Route::get('/Hotel_Calendar', [App\Http\Controllers\HotelController::class, 'Hotel_Calendar'])->name('Hotel_Calendar');
		Route::get('Calendar', [App\Http\Controllers\AdminController::class, 'Calendar'])->name('Calendar');
		Route::post('hotel_sched', 'App\Http\Controllers\AdminController@hotel_sched');

	//User management
		Route::get('UserManagement', [App\Http\Controllers\UserManagementController::class, 'Usermanagement'])->name('UserManagement');
		Route::post('/create_new_user', 'App\Http\Controllers\UserManagementController@create_new_user');

		Route::get('/enable_disable_user/{id}/{em}/{endis}', 'App\Http\Controllers\UserManagementController@enable_disable_user');



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
	

	//Guest Request
	Route::get('GuestRequest', [App\Http\Controllers\InventoryController::class, 'GuestRequest'])->name('GuestRequest');
	Route::get('/req_up/{id}/{qty}/{name}', 'App\Http\Controllers\InventoryController@req_up');


	
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
	// Route::get('/suites', [App\Http\Controllers\GuestController::class, 'suites'])->name('suites');
	Route::get('/suites/{id}', 'App\Http\Controllers\GuestController@suites');
	// 
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
	Route::get('/BookingEmail', [App\http\Controllers\GuestController::class, 'BookingEmail'])->name('BookingEmail');
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
	//Route::get('Housekeeping_Report', [App\Http\Controllers\HousekeeperController::class, 'housekeeping_reports'])->name('Housekeeping_Report');

	Route::get('Housekeeping_Report', ['uses' => 'App\Http\Controllers\HousekeeperController@reports', 'as' => 'Housekeeping_Report.reports']);
		
	Route::post('/supply_request', 'App\Http\Controllers\HousekeeperController@supply_request');
	Route::post('/linen_request', 'App\Http\Controllers\HousekeeperController@linen_request');

	Route::post('/deduct_supply', 'App\Http\Controllers\HousekeeperController@deduct_supply');
	
	Route::get('/update_housekeeping_status/{id}/{status}/{req}', 'App\Http\Controllers\HousekeeperController@update_housekeeping_status');
	Route::post('/check_linen', 'App\Http\Controllers\HousekeeperController@check_linen');
	Route::post('/assign_housekeeper', 'App\Http\Controllers\HousekeeperController@assign_housekeeper');

	Route::post('add_out_of_order', 'App\Http\Controllers\HousekeeperController@add_out_of_order');
	Route::get('/update_maintenance_status/{id}/{rno}/{bno}/{due}', 'App\Http\Controllers\HousekeeperController@update_maintenance_status');

	Route::post('/assign_housekeepers_supply', 'App\Http\Controllers\HousekeeperController@assign_housekeeper_supplies');

	Route::post('/assign_housekeepers_linen', 'App\Http\Controllers\HousekeeperController@assign_housekeeper_linens');
	Route::get('/update_service_requests/{id}/{bs}', 'App\Http\Controllers\HousekeeperController@update_service_request');
		

	Route::get('LostandFounds', [App\Http\Controllers\HousekeeperController::class, 'LostandFound'])->name('LostandFounds');
		
	Route::post('/add_lost_items', 'App\Http\Controllers\HousekeeperController@add_lost_items');
	
	Route::post('/update_lost_items_status', 'App\Http\Controllers\HousekeeperController@update_lost_items_status');
	Route::post('/auctioned_or_disposed_items', 'App\Http\Controllers\HousekeeperController@auctioned_or_disposed_items');
		
});

