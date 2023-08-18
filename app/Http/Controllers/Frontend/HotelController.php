<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function getHotels()
    {
        # code...
    }
    public function getSingleHotelInfo()
    {
        # code...
    }
    public function getRooms()
    {
        return view('frontend.hotelPages.rooms');
    }
    public function getSingleRoomInfo()
    {
        # code...
    }
}
