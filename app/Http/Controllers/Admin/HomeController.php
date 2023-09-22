<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\admin\HomeRepository;
use App\Repositories\HomeRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private HomeRepositoryInterface $repo;

    public function __construct(HomeRepositoryInterface $repo){
        $this->repo = $repo;
    }
    public function dashboard(){
        [$data['title'], $data['countInfo'], $data['allNews']] = $this->repo->getDashboardData();
        return view('admin.dashboard', $data);
    }
}
