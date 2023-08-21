<?php

namespace App\Repositories;

interface HotelServiceRepositoryInterface
{

    public function getHotels();
    public function getRooms();
    public function getHotelById(int $hotelId);
    public function getRoomById(int $roomId);

}
