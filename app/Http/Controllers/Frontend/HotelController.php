<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\Hotels\HotelsService;
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
    public function getRooms(HotelsService $hotelsService)
    {
        $roomData = $hotelsService->getHotels();
        return view('frontend.hotelPages.rooms', $roomData);
    }
    public function getSingleRoomInfo()
    {
        # code...
    }
}
