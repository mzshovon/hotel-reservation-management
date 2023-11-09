<?php

namespace App\admin\Repositories;

interface RoomRepositoryInterface
{
    public function getrooms();
    public function getSingleRoom(int $roomId);
    public function createRoom();
    public function editRoom($roomId);
    public function storeRoom();
}
