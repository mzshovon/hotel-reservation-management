<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RoomTypeRequest;
use App\Repositories\admin\RoomTypesRepository;
use Illuminate\Http\Request;

class RoomTypesController extends Controller
{
    private $roomTypes;

    public function __construct(RoomTypesRepository $roomTypes) {
        $this->roomTypes = $roomTypes;
    }
    public function index(){
        return $this->roomTypes->index();
    }
    public function store(RoomTypeRequest $request){
        return $this->roomTypes->store($request);
    }
}
