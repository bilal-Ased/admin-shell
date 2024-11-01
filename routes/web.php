<?php

// Controllers

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentStatusController;
use App\Http\Controllers\CalendarController;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\demoController;
use App\Http\Controllers\DoctorsSheduleController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Security\PermissionController;
use App\Http\Controllers\Security\RoleController;
use App\Http\Controllers\Security\RolePermission;

use App\Http\Controllers\ticketsConfigsController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhatsAppController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
// Packages
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

require __DIR__ . '/auth.php';

Route::get('/storage', function () {
    Artisan::call('storage:link');
});

//Landing-Pages Routes
Route::group(['prefix' => 'landing-pages'], function () {
    Route::get('index', [HomeController::class, 'landing_index'])->name('landing-pages.index');
    Route::get('blog', [HomeController::class, 'landing_blog'])->name('landing-pages.blog');
    Route::get('blog-detail', [HomeController::class, 'landing_blog_detail'])->name('landing-pages.blog-detail');
    Route::get('about', [HomeController::class, 'landing_about'])->name('landing-pages.about');
    Route::get('ecommerce', [HomeController::class, 'landing_ecommerce'])->name('landing-pages.ecommerce');
    Route::get('faq', [HomeController::class, 'landing_faq'])->name('landing-pages.faq');
    Route::get('pricing', [HomeController::class, 'landing_pricing'])->name('landing-pages.pricing');
});
Route::post('demo', [demoController::class, 'store'])->name('demo.store');

//UI Pages Routs
Route::get('/', [HomeController::class, 'uisheet'])->name('uisheet');


Route::any('/incoming-messages', [WhatsAppController::class, 'getMessage']);


Route::group(['middleware' => 'auth'], function () {
    // Permission Module
    Route::get('/role-permission', [RolePermission::class, 'index'])->name('role.permission.list');
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);

    // Dashboard Routes
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Users Module
    Route::resource('users', UserController::class);

    Route::get('/customers/index', [CustomerController::class, 'index'])->name('customers.index');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'editCustomer'])->name('customers.edit');
    Route::post('/customers/change-status/{id}', [CustomerController::class, 'changeStatus'])->name('customers.change-status');
    Route::post('customers/search', [CustomerController::class, 'searchCustomers'])->name('customers.search');
    Route::post('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');




    Route::get('/calendar', [CalendarController::class, 'showCalendar'])->name('appointments.calendar');
    Route::get('/create-appointment', [AppointmentController::class, 'index'])->name('appointment.create');
    Route::post('/store-appointment', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('/appointments/list', [AppointmentController::class, 'list'])->name('appointments.list');
    Route::get('/my/appointments', [AppointmentController::class, 'getAuthUsersAppointments'])->name('my.appointments');
    Route::get('/my/appointments', [AppointmentController::class, 'getAuthUsersAppointments'])->name('my.appointments');
    Route::get('/update/appointment/{id}', [AppointmentController::class, 'update'])->name('update.appointment');

    Route::post('/user-schedule', [DoctorsSheduleController::class, 'store'])->name('userSchedule.store');
    Route::get('/user-schedule-create', [DoctorsSheduleController::class, 'index'])->name('shedule-managment');
    Route::get('/user/get-available-slots', [DoctorsSheduleController::class, 'getAvailableSlots'])->name('user.getAvailableSlots');




    Route::get('/tickets/create', [TicketsController::class, 'index'])->name('tickets.index');
    Route::post('/tickets/store', [TicketsController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/list', [TicketsController::class, 'list'])->name('tickets.list');
    Route::get('my/tickets/list', [TicketsController::class, 'getAuthUsersTickets'])->name('my.tickets');
    Route::get('update/ticket/{id}', [TicketsController::class, 'update'])->name('update.ticket');



    Route::get('/settings/tickets/configs', [ticketsConfigsController::class, 'index']);
    Route::get('/settings/tickets/statuses', [ticketsConfigsController::class, 'getTicketStatus']);
    Route::get('/settings/tickets/categories', [ticketsConfigsController::class, 'getTicketCategories']);
    Route::get('/settings/tickets/sources', [ticketsConfigsController::class, 'getTicketSources']);
    Route::get('/settings/tickets/disposition', [ticketsConfigsController::class, 'getTicketDispositions']);
    Route::get('/settings/tickets/department', [ticketsConfigsController::class, 'getDepartments']);
    Route::get('/settings/all-users', [ticketsConfigsController::class, 'getAllUsers']);
    Route::get('/settings/all-doctors', [ticketsConfigsController::class, 'getDoctors']);

    Route::get('/settings/appointment/status', [AppointmentStatusController::class, 'index']);
});







//App Details Page => 'Dashboard'], function() {
Route::group(['prefix' => 'menu-style'], function () {
    //MenuStyle Page Routs
    Route::get('horizontal', [HomeController::class, 'horizontal'])->name('menu-style.horizontal');
    Route::get('dual-horizontal', [HomeController::class, 'dualhorizontal'])->name('menu-style.dualhorizontal');
    Route::get('dual-compact', [HomeController::class, 'dualcompact'])->name('menu-style.dualcompact');
    Route::get('boxed', [HomeController::class, 'boxed'])->name('menu-style.boxed');
    Route::get('boxed-fancy', [HomeController::class, 'boxedfancy'])->name('menu-style.boxedfancy');
});
Route::get('/chart', [HomeController::class, 'handleChart'])->name('menu-style.chart');
Route::get('/view', [HomeController::class, 'view']);

//App Details Page => 'special-pages'], function()
Route::group(['prefix' => 'special-pages'], function () {
    //Example Page Routs
    Route::get('billing', [HomeController::class, 'billing'])->name('special-pages.billing');
    Route::get('calender', [HomeController::class, 'calender'])->name('special-pages.calender');
    Route::get('kanban', [HomeController::class, 'kanban'])->name('special-pages.kanban');
    Route::get('pricing', [HomeController::class, 'pricing'])->name('special-pages.pricing');
    Route::get('rtl-support', [HomeController::class, 'rtlsupport'])->name('special-pages.rtlsupport');
    Route::get('timeline', [HomeController::class, 'timeline'])->name('special-pages.timeline');
});

//Widget Routs
Route::group(['prefix' => 'widget'], function () {
    Route::get('widget-basic', [HomeController::class, 'widgetbasic'])->name('widget.widgetbasic');
    Route::get('widget-chart', [HomeController::class, 'widgetchart'])->name('widget.widgetchart');
    Route::get('widget-card', [HomeController::class, 'widgetcard'])->name('widget.widgetcard');
});

//Maps Routs
Route::group(['prefix' => 'maps'], function () {
    Route::get('google', [HomeController::class, 'google'])->name('maps.google');
    Route::get('vector', [HomeController::class, 'vector'])->name('maps.vector');
});

//Auth pages Routs
Route::group(['prefix' => 'auth'], function () {
    Route::get('signin', [HomeController::class, 'signin'])->name('auth.signin');
    Route::get('signup', [HomeController::class, 'signup'])->name('auth.signup');
    Route::get('confirmmail', [HomeController::class, 'confirmmail'])->name('auth.confirmmail');
    Route::get('lockscreen', [HomeController::class, 'lockscreen'])->name('auth.lockscreen');
    Route::get('recoverpw', [HomeController::class, 'recoverpw'])->name('auth.recoverpw');
    Route::get('userprivacysetting', [HomeController::class, 'userprivacysetting'])->name('auth.userprivacysetting');
});

//Error Page Route
Route::group(['prefix' => 'errors'], function () {
    Route::get('error404', [HomeController::class, 'error404'])->name('errors.error404');
    Route::get('error500', [HomeController::class, 'error500'])->name('errors.error500');
    Route::get('maintenance', [HomeController::class, 'maintenance'])->name('errors.maintenance');
});

//Forms Pages Routs
Route::group(['prefix' => 'forms'], function () {
    Route::get('element', [HomeController::class, 'element'])->name('forms.element');
    Route::get('wizard', [HomeController::class, 'wizard'])->name('forms.wizard');
    Route::get('validation', [HomeController::class, 'validation'])->name('forms.validation');
});

//Table Page Routs
Route::group(['prefix' => 'table'], function () {
    Route::get('bootstraptable', [HomeController::class, 'bootstraptable'])->name('table.bootstraptable');
    Route::get('datatable', [HomeController::class, 'datatable'])->name('table.datatable');
});

//Icons Page Routs
Route::group(['prefix' => 'icons'], function () {
    Route::get('solid', [HomeController::class, 'solid'])->name('icons.solid');
    Route::get('outline', [HomeController::class, 'outline'])->name('icons.outline');
    Route::get('dualtone', [HomeController::class, 'dualtone'])->name('icons.dualtone');
    Route::get('colored', [HomeController::class, 'colored'])->name('icons.colored');
});
//Extra Page Routs
Route::get('privacy-policy', [HomeController::class, 'privacypolicy'])->name('pages.privacy-policy');
Route::get('terms-of-use', [HomeController::class, 'termsofuse'])->name('pages.term-of-use');
