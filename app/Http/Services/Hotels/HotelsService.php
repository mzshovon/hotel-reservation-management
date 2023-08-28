<?php

namespace App\Http\Services\Hotels;

use App\Repositories\HotelServiceRepositoryInterface;

class HotelsService implements HotelServiceRepositoryInterface {

    private $roomArrayTestData = [];

    public function __construct()
    {
        $this->roomArrayTestData = config("testdata.rooms");
    }

    public function getHotels()
    {
        return $this->roomArrayTestData ?? []; //# For testing purpose
    }

    /**
     * @return array
     */
    public function getRooms() : array
    {
        return $this->roomArrayTestData ?? []; //# For testing purpose
    }

    public function getHotelById(int $hotelId)
    {

    }

    public function getRoomById(int $roomId)
    {

    }

}
