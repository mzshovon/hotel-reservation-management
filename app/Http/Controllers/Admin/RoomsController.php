<?php

namespace App\Http\Controllers\Admin;

use App\admin\Repositories\RoomRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RoomRequest;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    private $roomRepositoryInterface;

    public function __construct(RoomRepositoryInterface $roomRepositoryInterface)
    {
        $this->roomRepositoryInterface = $roomRepositoryInterface;
    }

    public function getRooms()
    {
        $data['roomData'] = customPaginate($this->roomRepositoryInterface->getRooms(), 5);
        return view('admin.rooms.getRooms', $data);
    }

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
        $data['newsData'] = customPaginate($this->utilityServiceReporsitoryInterface->getNews(), 5);
        return view('frontend.utilityPages.news', $data);
    }
}
