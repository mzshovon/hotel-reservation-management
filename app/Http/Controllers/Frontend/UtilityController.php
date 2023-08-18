<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function getContactUs()
    {
        return view('frontend.utilityPages.contactUs');
    }
    public function storeContactUs(Request $request)
    {
        # code...
    }
    public function getAboutUs()
    {
        return view('frontend.utilityPages.aboutUs');
    }
    public function getNews()
    {
        return view('frontend.utilityPages.news');
    }
    public function getSingleNews($newsId)
    {
        # code...
    }
}
