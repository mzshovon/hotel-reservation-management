<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function __construct()
    {

    }

    public function viewLandingPage()
    {
        return view("frontend.landingPage.view");
    }
}
