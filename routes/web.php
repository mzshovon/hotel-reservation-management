<?php

use App\Http\Controllers\Frontend\LandingPageController;
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
