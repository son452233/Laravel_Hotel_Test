<?php

use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\User\BookingRoomController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\ContactController;

use Illuminate\Support\Facades\Http;

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

Route::get('/main', function () {
    return view('admin.layout.main');
});
Route::get('/main', function() {
    return view('admin.layout.main');
})->middleware(['auth', 'verified'])->name('dashboard');
// routes/web.php
Route::get('/home', 'MainController@showMain')->name('main')->middleware('web');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['prefix' => 'user'], function () {
    // Tuyến cho trang chủ
    Route::get('/home', [IndexController::class, 'index'])->name('user.index');
    Route::get('/blog', [IndexController::class, 'blog'])->name('user.blog');
    Route::get('/rooms', [IndexController::class, 'index'])->name('user.rooms');
    Route::get('/contact', [IndexController::class, 'contact'])->name('user.contact');
    Route::get('/about-us', [IndexController::class, 'aboutUs'])->name('user.aboutUs');
    Route::get('/booking', [BookingRoomController::class, 'booking'])->name('user.booking');
    Route::post('/bookings', [BookingRoomController::class, 'create'])->name('booking.store');

});
Route::get('/list-booking', [BookingController::class, 'index']);
Route::resource('/hotels', HotelController::class);
// Route::resource('/booking', HotelController::class);
Route::resource('/rooms', RoomController::class);

Route::get('/room-create', [RoomController::class, 'create']);
Route::get('/rooms/{room_id}', [RoomController::class, 'edit']);
Route::post('/rooms/{room_id}', [RoomController::class, 'update']);
// Trong routes/web.php hoặc routes/api.php
// API

Route::get('/contact', [ContactController::class, 'index']);
Route::get('/contact/{id}', [ContactController::class, 'show']);
Route::post('/contact', [ContactController::class, 'store']);
Route::put('/contact/{id}', [ContactController::class, 'update']);

require __DIR__.'/auth.php';
