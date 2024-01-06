<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\HotelServiceRepositoryInterface;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    private HotelServiceRepositoryInterface $hotelServiceRepositoryInterface;

    public function __construct(HotelServiceRepositoryInterface $hotelServiceRepositoryInterface)
    {
        $this->hotelServiceRepositoryInterface = $hotelServiceRepositoryInterface;
    }

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
        $data['roomData'] = customPaginate($this->hotelServiceRepositoryInterface->getRooms(), 8);
        return view('frontend.hotelPages.rooms', $data);
    }
    public function getSingleRoomInfo()
    {
        # code...
    }
}
