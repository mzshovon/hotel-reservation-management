<?php

use App\Http\Controllers\Admin\AdminUtilityController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoomTypesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\HotelController;
use App\Http\Controllers\Frontend\LandingPageController;
use App\Http\Controllers\Frontend\UtilityController;
use App\Http\Controllers\Permission\PermissionsController;
use App\Http\Controllers\Permission\RolesController;
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

Route::get('/', [LandingPageController::class, 'viewLandingPage'])->name("landingPage")->middleware('visitors:home');
Route::get('/about-us', [UtilityController::class, 'getAboutUs'])->name("aboutUs")->middleware('visitors:about-us');

//Contact Us
Route::group(['prefix' => 'contact-us', 'middleware' => 'visitors:contact-us'], function() {
    Route::get('/', [UtilityController::class, 'getContactUs'])->name("contactUs");
    Route::post('/', [UtilityController::class, 'storeContactUs'])->name("storeContactUs");
});

//News
Route::group(['prefix' => 'news', 'middleware' => 'visitors:news'], function() {
    Route::get('/', [UtilityController::class, 'getNews'])->name("news");
    Route::get('/{id}', [UtilityController::class, 'getSingleNews'])->name("singleNews");
});

//Hotel
Route::group(['prefix' => 'hotels', 'middleware' => 'visitors:hotels'], function() {
    Route::get('/', [HotelController::class, 'getHotels'])->name("hotels");
    Route::get('/{hotelId}', [HotelController::class, 'getSingleHotelInfo'])->name("singleHotelInfo");
});

//Rooms
Route::group(['prefix' => 'rooms', 'middleware' => 'visitors:rooms'], function() {
    Route::get('/', [HotelController::class, 'getRooms'])->name("rooms");
    Route::get('/{roomId}', [HotelController::class, 'getSingleRoomInfo'])->name("singleRoomInfo");
});

Auth::routes();

// admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'permission']], function() {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // Permission routes
    Route::group(['prefix' => 'permissions'], function() {
        Route::get('/', [PermissionsController::class, 'index'])->name('permissionsList');
        Route::post('/store', [PermissionsController::class, 'store'])->name('storePermissions');
    });

    // Roles routes
    Route::group(['prefix' => 'roles'], function() {
        Route::get('/', [RolesController::class, 'index'])->name('rolesList');
        Route::get('/create', [RolesController::class, 'create'])->name('createRoles');
        Route::post('/store', [RolesController::class, 'store'])->name('storeRoles');
        Route::get('/edit/{id}', [RolesController::class, 'edit'])->name('editRoles');
        Route::patch('/update/{id}', [RolesController::class, 'update'])->name('updateRoles');
    });

    // Room types routes
    Route::group(['prefix' => 'room-types'], function() {
        Route::get('/', [RoomTypesController::class, 'index'])->name('roomTypesList');
        Route::get('/create', [RoomTypesController::class, 'create'])->name('createRoomType');
        Route::get('/edit/{room_type_id}', [RoomTypesController::class, 'edit'])->name('editRoomType');
        Route::post('/store', [RoomTypesController::class, 'create'])->name('storeRoomType');
        Route::delete('/delete/{room_type_id}', [RoomTypesController::class, 'destroy'])->name('deleteRoomType');
    });

    // Activity Log routes
    Route::group(['prefix' => 'activity-log'], function() {
        Route::get('/', [AdminUtilityController::class, 'getActivityLogs'])->name('activityLogs');
    });

    // User routes
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [UserController::class, 'getUsers'])->name('usersList');
        Route::post('/store', [UserController::class, 'createUser'])->name('createUser');
        Route::post('/update/{userId}', [UserController::class, 'updateUser'])->name('updateUser');
        Route::delete('/delete/{userId}', [UserController::class, 'deleteUser'])->name('deleteUser');
        // Role assign to user
        Route::post('/assign-role', [UserController::class, 'assignRoleToUser'])->name('assignRoleToUser');
    });

    Route::group(['prefix' => 'error'], function() {
        Route::get('404', function(){
            return view('errorPages.404');
        })->name('not-found');
        Route::get('500', function(){
            return view('errorPages.500');
        })->name('server-issue');
    });
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');
