<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\RoomTypesController;
use App\Http\Controllers\Auth\LoginController;
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

//Social Login
Route::get('auth/{socialType}/redirect', [LoginController::class, 'socialRedirect'])->name('socialAuth');
Route::get('auth/{socialType}/callback', [LoginController::class, 'callBackSocial'])->name('socialCallBack');
// Route::get();

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

// admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function() {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // Room types routes
    Route::get('room-types', [RoomTypesController::class, 'index'])->name('room-types.index');
    Route::get('room-types/create', [RoomTypesController::class, 'create'])->name('room-types.create');
    Route::post('room-types/store', [RoomTypesController::class, 'store'])->name('room-types.store');
    Route::get('room-types/{id}/edit', [RoomTypesController::class, 'edit'])->name('room-types.edit');
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');
