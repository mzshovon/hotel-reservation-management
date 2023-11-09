<?php

namespace App\Http\Services\Utilities;

use App\admin\Repositories\RoomRepositoryInterface;

class RoomService implements RoomRepositoryInterface {

    private $roomData = [];

    public function __construct()
    {
        $this->roomData = config("testdata.rooms");
    }

    public function getrooms()
    {
        return $this->roomData ?? [];
    }

    public function getSingleRoom(int $roomId)
    {

    }

    public function createRoom()
    {

    }

    public function editRoom($roomId)
    {

    }

    public function storeRoom()
    {

    }
}
