<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackagetypeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\StaffDepartment;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;


use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





Route::get('/service/{id}',[HomeController::class,'service_detail']);
Route::get('page/about-us',[PageController::class,'about_us']);
Route::get('page/contact-us',[PageController::class,'contact_us']);

//Admin Login
Route::get('admin/adminlogin',[AdminController::class,'login']);
Route::post('admin/check_login',[AdminController::class,'check_login']);
Route::get('admin/logout',[AdminController::class,'logout']);

// Admin Dashboard
Route::get('admin', function () {
    return view('admin_dashboard');
});

//PackageType Routes
Route::get('admin/packagetype/{id}/delete',[PackagetypeController::class,'destroy']);
Route::resource('admin/packagetype',PackagetypeController::class);

//Package
Route::get('admin/packages/{id}/delete',[PackageController::class,'destroy']);
Route::resource('admin/packages',PackageController::class);

// Customer

//Route::resource('admin/customer',CustomerController::class);

Route::get('admin/customer', [UserController::class, 'show']);
Route::get('admin/customer/{id}/delete',[UserController::class,'destroy']);


// Department
Route::get('admin/department/{id}/delete',[StaffDepartment::class,'destroy']);
Route::resource('admin/department',StaffDepartment::class);

// Staff Payment
Route::get('admin/staff/payments/{id}',[StaffController::class,'all_payments']);
Route::get('admin/staff/payment/{id}/add',[StaffController::class,'add_payment']);
Route::post('admin/staff/payment/{id}',[StaffController::class,'save_payment']);
Route::get('admin/staff/payment/{id}/{staff_id}/delete',[StaffController::class,'delete_payment']);
// Staff CRUD
Route::get('admin/staff/{id}/delete',[StaffController::class,'destroy']);
Route::resource('admin/staff',StaffController::class);

// Booking

Route::get('admin/bookings/{id}/delete',[BookingController::class,'destroy']);
Route::get('admin/bookings/available-packages/{checkin_date}',[BookingController::class,'available_packages']);
Route::resource('admin/bookings',BookingController::class);

Route::get('booking',[BookingController::class,'front_booking']);






