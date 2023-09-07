<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\admin\HomeRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $data;

    public function __construct(HomeRepository $data){
        $this->data = $data;
    }
    public function dashboard(){
        return $this->data->dashboard();
    }
}
