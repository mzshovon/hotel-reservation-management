<?php

use App\Http\Controllers\Frontend\HotelController;
use App\Http\Controllers\Frontend\LandingPageController;
use App\Http\Controllers\Frontend\UtilityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| Naming must be needed to define uniqely every route
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers\admin'], function() {
    Route::get('/admin/dashboard', 'HomeController@dashboard')->name('admin.dashboard');
    Route::resource('room-types','RoomTypesController');
});
Route::get('/', [LandingPageController::class, 'viewLandingPage'])->name("landingPage");
Route::get('/contact-us', [UtilityController::class, 'getContactUs'])->name("contactUs");
Route::post('/contact-us', [UtilityController::class, 'storeContactUs'])->name("storeContactUs");
Route::get('/about-us', [UtilityController::class, 'getAboutUs'])->name("aboutUs");
Route::get('/news', [UtilityController::class, 'getNews'])->name("news");
Route::get('/news/{id}', [UtilityController::class, 'getSingleNews'])->name("singleNews");

//Hotel
Route::get('/hotels', [HotelController::class, 'getHotels'])->name("hotels");
Route::get('/hotels/{hotelId}', [HotelController::class, 'getSingleHotelInfo'])->name("singleHotelInfo");
Route::get('/rooms', [HotelController::class, 'getRooms'])->name("rooms");
Route::get('/rooms/{roomId}', [HotelController::class, 'getSingleRoomInfo'])->name("singleRoomInfo");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
