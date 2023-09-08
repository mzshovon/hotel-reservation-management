<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Repositories\AdminUtilityServiceReporsitoryInterface;
// use Illuminate\Http\Request;

class AdminUtilityController extends Controller
{
    // private AdminUtilityServiceReporsitoryInterface $adminUtilityServiceReporsitoryInterface;

    // public function __construct(AdminUtilityServiceReporsitoryInterface $adminUtilityServiceReporsitoryInterface)
    // {
    //     $this->adminUtilityServiceReporsitoryInterface = $adminUtilityServiceReporsitoryInterface;
    // }

    public function getActivityLogs()
    {
        dd();
        // $data['activityLogsData'] = $this->adminUtilityServiceReporsitoryInterface->getActivityLogData();
        // return view('frontend.utilityPages.news', $data);
    }
}
