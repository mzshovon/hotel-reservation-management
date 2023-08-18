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

Route::get('/', [LandingPageController::class, 'viewLandingPage'])->name("landingPage");
Route::get('/contact-us', [UtilityController::class, 'contactUs'])->name("contactUs");
Route::post('/contact-us', [UtilityController::class, 'storeContactUs'])->name("storeContactUs");
Route::get('/about-us', [UtilityController::class, 'aboutUs'])->name("aboutUs");
Route::get('/news', [UtilityController::class, 'news'])->name("news");
Route::get('/news/{id}', [UtilityController::class, 'singleNews'])->name("singleNews");

//Hotel
Route::get('/hotels', [HotelController::class, 'viewHotelsPage'])->name("hotels");
Route::get('/hotels/{hotelId}', [HotelController::class, 'viewSingleHotelInfo'])->name("singleHotelInfo");
Route::get('/rooms', [HotelController::class, 'viewRoomsPage'])->name("rooms");
Route::get('/rooms/{roomId}', [HotelController::class, 'viewSingleRoomInfo'])->name("singleRoomInfo");
