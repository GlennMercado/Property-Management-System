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

Route::get('/try', function(){
	return view('Admin.pages.RoomManagement.try');
});

Route::get('/email/verify/resend-form', [App\Http\Controllers\Auth\VerificationController::class, 'resendVerificationLinkForm'])->name('verification.resend-form');

Route::post('/email/verify/resend', [App\Http\Controllers\Auth\VerificationController::class, 'sendEmailVerificationNotification'])->name('verification.send');


Route::get('/verify-email/{token}', 'App\Http\Controllers\Auth\VerificationController@verify')->name('verification.verify');

//Homepage	r
Route::get('WelcomeAboutUs', [App\Http\Controllers\WelcomeController::class, 'WelcomeAboutUs'])->name('WelcomeAboutUs');

Route::get('WelcomeContactUs', [App\Http\Controllers\WelcomeController::class, 'WelcomeContactUs'])->name('WelcomeContactUs');

Route::get('WelcomeMap', [App\Http\Controllers\WelcomeController::class, 'WelcomeMap'])->name('WelcomeMap');

Route::get('ContactUs', function () { return view('ContactUs');})->name('ContactUs');

Route::get('FAQs', function () { return view('FAQs');})->name('FAQs');

Route::get('Map', function () { return view('Map');})->name('Map');

Route::get('Welcomerooms', [App\Http\Controllers\WelcomeController::class, 'Welcomerooms'])->name('Welcomerooms');

Auth::routes(['verify' => true]);

Route::get('/login-google', [App\http\Controllers\API\SocialAuthController::class, 'redirectToProvider'])->name('google.login');

Route::get('/auth/google/callback', [App\http\Controllers\API\SocialAuthController::class, 'handleCallback'])->name('google.login.callback');

Route::get('/Services', [App\Http\Controllers\GuestController::class, 'services_view'])->name('Services');

//For authenticated users or logged in
Route::middleware(['auth'])->group(function(){
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@admin_edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

//Admin
Route::middleware(['auth', 'Admin'])->group(function(){
	Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
	Route::get('AdminNotifications', [App\Http\Controllers\AdminController::class, 'AdminNotif'])->name('AdminNotifications');
	//Room Management
	Route::get('Hotel_Room_Management', [App\Http\Controllers\RoomController::class, 'Hotel_Rooms'])->name('Dashboard');

	Route::post('/add_rooms', 'App\Http\Controllers\RoomController@add_rooms');
	Route::post('/edit_rooms', 'App\Http\Controllers\RoomController@edit_rooms');
	Route::post('/update_rooms', 'App\Http\Controllers\RoomController@update_rooms');

	Route::get('/enable_disable_rooms/{id}/{stats}', 'App\Http\Controllers\RoomController@enable_disable_rooms');

	Route::get('Key_Management', [App\Http\Controllers\RoomController::class, 'Key_Management'])->name('Key_Management');


	Route::get('/notifications/count', function () {
		$count = auth()->user()->notifications->count();
		return response()->json(['count' => $count]);
	});
	// //Room Management
	// Route::get('Hotel_Room_Management', [App\Http\Controllers\RoomController::class, 'Hotel_Rooms'])->name('Dashboard');

	// Route::post('/add_rooms', 'App\Http\Controllers\RoomController@add_rooms');
	// Route::post('/edit_rooms', 'App\Http\Controllers\RoomController@edit_rooms');
	// Route::post('/update_rooms', 'App\Http\Controllers\RoomController@update_rooms');

	// Route::get('Key_Management', [App\Http\Controllers\RoomController::class, 'Key_Management'])->name('Key_Management');



	//Calendar
		//Route::get('/Hotel_Calendar', [App\Http\Controllers\HotelController::class, 'Hotel_Calendar'])->name('Hotel_Calendar');
		Route::get('Calendar', [App\Http\Controllers\AdminController::class, 'Calendar'])->name('Calendar');
		Route::post('hotel_sched', 'App\Http\Controllers\AdminController@hotel_sched');

	//User management
		Route::get('UserManagement', [App\Http\Controllers\UserManagementController::class, 'Usermanagement'])->name('UserManagement');
		Route::post('/create_new_user', 'App\Http\Controllers\UserManagementController@create_new_user');

		Route::post('/edit_user', 'App\Http\Controllers\UserManagementController@edit_user');

		Route::get('/enable_disable_user/{id}/{em}/{endis}', 'App\Http\Controllers\UserManagementController@enable_disable_user');

		Route::get('newpage', function () {return view('Admin.pages.newpage');})->name('newpage');

	//GuestManagement
	Route::post('guestloggedin', 'App\Http\Controllers\GuestTicketsController@ticket');

	//Back Office
	Route::get('BackOffice', function () {return view('Admin.pages.BackOffice');})->name('BackOffice');
});

//Admin and Housekeeping Supervisor
Route::middleware(['auth', 'AdminorHousekeeper'])->group(function(){
	//For Housekeeping and Maintenance
	Route::get('Housekeeping_Dashboard', [App\Http\Controllers\HousekeepingController::class, 'housekeeping_dashboard'])->name('Housekeeping_Dashboard');

	Route::get('List_of_Housekeepers', [App\Http\Controllers\HousekeepingController::class, 'List_of_Housekeepers'])->name('List_of_Housekeepers');

	Route::post('/add_housekeeper', 'App\Http\Controllers\HousekeepingController@add_housekeeper');

	Route::post('/assign_housekeepers', 'App\Http\Controllers\HousekeepingController@assign_housekeeper');

	Route::post('/supply_requests', 'App\Http\Controllers\HousekeepingController@supply_request');
	Route::post('/linen_requests', 'App\Http\Controllers\HousekeepingController@linen_request');

	Route::post('/room_checked', 'App\Http\Controllers\HousekeepingController@room_checked');
	Route::get('/update_housekeeping_stats/{hk}/{id}/{status}/{req}/{rn}', 'App\Http\Controllers\HousekeepingController@update_housekeeping_status');

	Route::get('Linen_Monitoring', [App\Http\Controllers\HousekeepingController::class, 'linen_monitoring'])->name('Linen_Monitoring');
	
	Route::get('LostandFound', [App\Http\Controllers\HousekeepingController::class, 'LostandFound'])->name('LostandFound');
	
	Route::post('/add_lost_item', 'App\Http\Controllers\HousekeepingController@add_lost_item');
	
	Route::post('/update_lost_item_status', 'App\Http\Controllers\HousekeepingController@update_lost_item_status');
	Route::post('/auctioned_or_disposed_item', 'App\Http\Controllers\HousekeepingController@auctioned_or_disposed_item');
	
	Route::get('Maintenance', [App\Http\Controllers\MaintenanceController::class, 'Maintenance'])->name('Maintenance');
	
	Route::post('add_out_of_orders', 'App\Http\Controllers\MaintenanceController@add_out_of_order');

	Route::get('Guest_Request', [App\Http\Controllers\MaintenanceController::class, 'Guest_Request'])->name('Guest_Request');

	Route::get('/update_maintenance_stats/{id}/{rno}/{bno}/{due}', 'App\Http\Controllers\MaintenanceController@update_maintenance_status');

	Route::post('/assign_housekeepers_supplies', 'App\Http\Controllers\HousekeepingController@assign_housekeeper_supplies');

	Route::post('/assign_housekeepers_linens', 'App\Http\Controllers\HousekeepingController@assign_housekeeper_linens');

	Route::post('/update_housekeepers_status', 'App\Http\Controllers\HousekeepingController@update_housekeepers_status');

	Route::get('Housekeeping_Reports', ['uses' => 'App\Http\Controllers\HousekeepingController@reports', 'as' => 'Housekeeping_Reports.reports']);
});	

//Admin and Sales and Marketing
Route::middleware(['auth', 'AdminorSales'])->group(function(){
	//Event inquiry
	Route::get('EventInquiryForm', [App\Http\Controllers\EventController::class, 'event_inquiry'])->name('EventInquiryForm');
	Route::get('/event_view/{id}', 'App\Http\Controllers\EventController@event_view');
	Route::post('/update_status', 'App\Http\Controllers\EventController@update_status');
	Route::post('/event_approval', 'App\Http\Controllers\EventController@event_approval');

	//Commercial Spaces
	Route::get('CommercialSpaceForm', [App\Http\Controllers\CommercialSpacesController::class, 'commercial_spaces'])->name('CommercialSpaceForm');
	Route::get('CommercialSpaceTenants', [App\Http\Controllers\CommercialSpacesController::class, 'commercial_spaces_tenants'])->name('CommercialSpaceTenants');
	Route::get('CommercialSpaceRentCollections', [App\Http\Controllers\CommercialSpacesController::class, 'commercial_rent_collections'])->name('CommercialSpaceRentCollections');
	Route::get('CommercialSpaceUnits', [App\Http\Controllers\CommercialSpacesController::class, 'commercial_space_units'])->name('CommercialSpaceUnits');
	Route::get('CommercialSpaceUtilityBills', [App\Http\Controllers\CommercialSpacesController::class, 'commercial_space_utility_bills'])->name('CommercialSpaceUtilityBills');
	
	Route::get('/commercial_space_view/{id}', 'App\Http\Controllers\CommercialSpacesController@commercial_space_view');
	Route::post('update_commercial_status', 'App\Http\Controllers\CommercialSpacesController@update_commercial_status');

	Route::post('add_commercial_tenant', 'App\Http\Controllers\CommercialSpacesController@add_commercial_tenant');
	Route::post('update_tenant_status', 'App\Http\Controllers\CommercialSpacesSecondController@update_tenant_status');
	Route::post('update_rental_collection', 'App\Http\Controllers\CommercialSpacesSecondController@update_rental_collection');
	Route::post('renew_tenant', 'App\Http\Controllers\CommercialSpacesSecondController@renew_tenant');
	Route::post('add_comm_space_unit', 'App\Http\Controllers\CommercialSpacesSecondController@add_comm_space_unit');
	Route::post('edit_comm_unit', 'App\Http\Controllers\CommercialSpacesSecondController@edit_comm_unit');
	Route::get('/commercial_space_form/{id}', 'App\Http\Controllers\CommercialSpacesController@comm_space_getrent')->name('get.rent');
	Route::post('comm_space_maintainance_cost', 'App\Http\Controllers\CommercialSpacesSecondController@comm_space_maintainance_cost');
	Route::post('update_comm_maintenance_status', 'App\Http\Controllers\CommercialSpacesSecondController@update_comm_maintenance_status');
	Route::get('/update_maintenance3_status/{id}/{tid}', 'App\Http\Controllers\CommercialSpacesController@update_maintenance3_status');
	
	Route::post('update_comm_maintenance_status2', 'App\Http\Controllers\CommercialSpacesSecondController@update_commercial_maintenance_status2');

	Route::post('add_commercial_tenant_utility_bill', 'App\Http\Controllers\CommercialSpacesSecondController@add_commercial_tenant_utility_bill');
	Route::post('update_utility_payment', 'App\Http\Controllers\CommercialSpacesSecondController@update_utility_payment');


	// Route::get('CheckInQr', [App\Http\Controllers\HotelController::class, 'qrscan'])->name('QR-Scanner');
	
});

//Admin and Operation Manager
Route::middleware(['auth', 'AdminorOperation'])->group(function(){
	//Reservation
	// Route::get('Guest_Reservation', function () {return view('Admin.pages.OperationManagement.Guest_Reservation');})->name('Guest_Reservation');
	Route::get('/Guest_Reservation', [App\Http\Controllers\HotelController::class, 'guest_viewing'])->name('Guest_Reservation');

	Route::get('Complaints', function () {return view('Admin.pages.OperationManagement.Complaints');})->name('Complaints');
	
	Route::get('Reports', ['uses' => 'App\Http\Controllers\OperationManagementController@Operation_Reports', 'as' => 'Reports.Operation_Reports']);
	
	Route::get('Complaints', [App\Http\Controllers\ComplaintsController::class, 'Complaints'])->name('Complaints'); 
	
	Route::post('/complaints_status', 'App\Http\Controllers\ComplaintsController@complaints_status');
	
	Route::get('Requests', [App\Http\Controllers\OperationManagementController::class, 'Operation_Requests'])->name('Requests');
	
	Route::get('/update_service_request/{id}/{bs}', 'App\Http\Controllers\OperationManagementController@update_service_request');
	Route::post('/set_stats', 'App\Http\Controllers\OperationManagementController@set_stats');
	Route::get('/update_item_request/{id}', 'App\Http\Controllers\OperationManagementController@update_item_request');
	
	Route::get('OperationRooms', [App\Http\Controllers\OperationManagementController::class, 'OperationRooms'])->name('OperationRooms');
	Route::get('OperationDashboard', [App\Http\Controllers\OperationManagementController::class, 'OperationDashboard'])->name('OperationDashboard');
});	

//Admin, Sales and Marketing and Operations Manager
Route::middleware(['auth', 'AdminorSalesorOperation'])->group(function(){
	//Reservation
	Route::get('FrontDesk', [App\Http\Controllers\HotelController::class, 'front_desk'])->name('FrontDesk');
	Route::get('/front_desk_form/{id}', 'App\Http\Controllers\HotelController@front_desk_getdata')->name('get.data');
	Route::get('/front_desk_datepicker/{id}', 'App\Http\Controllers\HotelController@front_desk_getdate')->name('get.date');
	Route::post('HotelReservationForm', 'App\Http\Controllers\HotelController@store');

	// Route::get('/update_hotel_payment/{id}/{no}/{check}', 'App\Http\Controllers\HotelController@update_payment');
	Route::get('/update_booking_status/{id}/{no}/{check}/{stats}', 'App\Http\Controllers\HotelController@update_booking_status');
	Route::get('/invoice/{id}/{bn}', 'App\Http\Controllers\HotelController@invoice');
	Route::get('HotelReservationForm', [App\Http\Controllers\HotelController::class, 'hotel_reservation_form'])->name('HotelReservationForm');
	Route::get('GuestFolio', [App\Http\Controllers\GuestFolioController::class, 'guest_folio'])->name('GuestFolio');
	Route::post('hotel_other_charges', 'App\Http\Controllers\GuestFolioController@hotel_other_charges');

	Route::post('add_guest_request', 'App\Http\Controllers\MaintenanceController@add_guest_request');

	Route::get('/CheckInQr/{id}', 'App\Http\Controllers\HotelController@qrview');
	Route::post('/check_in', 'App\Http\Controllers\HotelController@check_in');
	Route::get('/report', [App\Http\Controllers\ReportController::class, 'report'])->name('BookingReport');
	Route::get('/inquiry_reports', [App\Http\Controllers\ReportController::class, 'inquiry_reports'])->name('InquiryReport');
	Route::get('/hotel_reports', [App\Http\Controllers\ReportController::class, 'hotel_reports'])->name('HotelReport');
});	

//Admin and Finance
Route::middleware(['auth', 'AdminorFinance'])->group(function(){
	//Archives
	Route::get('FinanceArchives', [App\Http\Controllers\FinanceController::class, 'finance_archives'])->name('FinanceArchives');
			
	//Finance Dashboards
	Route::get('FinanceDashboard', [App\Http\Controllers\FinanceController::class, 'finance_dash'])->name('FinanceDashboard');

	//Finance Approval
	Route::get('FinanceApproval', [App\Http\Controllers\FinanceController::class, 'finance_approve'])->name('FinanceApproval');
	Route::get('/finance_hotel_approval', 'App\Http\Controllers\FinanceController@finance_hotel_approval');
	Route::get('/update_hotel_payment/{id}/{no}/{check}', 'App\Http\Controllers\HotelController@update_payment');
	
	//Finance Invoice
	//  Route::get('/FinanceInvoice/{id}', [App\Http\Controllers\FinanceController::class, 'finance_invoice'])->name('FinanceInvoice');
	 Route::get('finance_invoice/{bn}', [App\Http\Controllers\FinanceController::class, 'finance_invoice'])->name('FinanceInvoice');

	//Finance Daily Report
	Route::post('/insertfinance', 'App\Http\Controllers\FinanceReportController@insertfinance');
	Route::post('/edit', 'App\Http\Controllers\FinanceReportController@edit');
	Route::get('/archives', 'App\Http\Controllers\FinanceController@archives');
	Route::get('/archives_summary', 'App\Http\Controllers\FinanceController@archives_summary');
	Route::get('/proof_payment_summary', 'App\Http\Controllers\FinanceController@proof_payment_summary');

	Route::get('DailyReport', [App\Http\Controllers\FinanceController::class, 'finance_report'])->name('DailyReport');

	
});

//Admin and Inventory
Route::middleware(['auth', 'AdminorInventory'])->group(function(){
	//Hotel
	Route::get('StockCount', [App\Http\Controllers\InventoryController::class, 'Hotel_Rooms'])->name('Dashboard');
	Route::post('/edit_stock', 'App\Http\Controllers\InventoryController@edit_stock');
	Route::post('/addstock', 'App\Http\Controllers\InventoryController@addstock');

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
	
	//Inventory Room Supply
	Route::get('StockRoomSupply', [App\Http\Controllers\InventoryController::class, 'StockDistribute'])->name('StockRoomSupply');
	

	//Guest Request
	Route::get('GuestRequest', [App\Http\Controllers\InventoryController::class, 'GuestRequest'])->name('GuestRequest');
	Route::get('/req_up/{id}/{qty}/{name}', 'App\Http\Controllers\InventoryController@req_up');
});



//Guest
Route::middleware(['auth', 'Guest'])->group(function(){
	Route::get('/welcome', [App\Http\Controllers\GuestController::class, 'welcome'])->name('welcome');
	// notifications
	// Route::get('/notify', [App\Http\Controllers\GuestController::class, 'notify']);
	Route::get('/booked', [App\Http\Controllers\GuestController::class, 'booked']);
	Route::get('/MyNotifications', [App\Http\Controllers\GuestController::class, 'MyNotif'])->name('MyNotifications');

	Route::get('/notifications/count', function () {
		$count = auth()->user()->notifications->count();
		return response()->json(['count' => $count]);
	});
	// notifications

	Route::get('/guest_profile', [App\Http\Controllers\GuestController::class, 'guest_profile'])->name('guest_profile');
	Route::get('/my_bookings', [App\Http\Controllers\GuestController::class, 'my_bookings'])->name('my_bookings');
	Route::get('Commercial_Space', [App\Http\Controllers\GuestController::class, 'Commercial_Space'])->name('Commercial_Space');
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
	Route::post('/edit_commercial_spaces_application', 'App\Http\Controllers\GuestController@edit_commercial_spaces_application');
	Route::post('/set_commercial_space_schedule', 'App\Http\Controllers\GuestController@set_commercial_space_schedule');
	Route::post('/commercial_space_rent_payment', 'App\Http\Controllers\GuestController@commercial_space_rent_payment');
	Route::post('/commercial_space_utility_payment', 'App\Http\Controllers\GuestController@commercial_space_utility_payment');
	Route::post('/commercial_space_maintenance_payment', 'App\Http\Controllers\GuestController@commercial_space_maintenance_payment');
	Route::post('/update_client_maintenance_payment', 'App\Http\Controllers\GuestController@update_client_maintenance_payment');
	
	Route::get('/complaints', [App\Http\Controllers\GuestController::class, 'complaints'])->name('complaints');
	Route::post('/complaints_submit', 'App\Http\Controllers\GuestController@complaints_submit');
	Route::get('/rooms', [App\Http\Controllers\GuestController::class, 'rooms'])->name('rooms');
	Route::get('/FAQ', [App\Http\Controllers\GuestController::class, 'FAQ'])->name('FAQ');
	Route::get('/BookingEmail', [App\http\Controllers\GuestController::class, 'BookingEmail'])->name('BookingEmail');

	Route::get('/Confirmation', [App\http\Controllers\GuestController::class, 'confirmation'])->name('Confirmation');
	// Route::get('/Reserve', [App\http\Controllers\GuestController::class, 'reserve'])->name('Reserve');

});
