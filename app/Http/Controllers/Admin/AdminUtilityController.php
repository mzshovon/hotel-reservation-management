<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AdminUtilityServiceReporsitoryInterface;
use Illuminate\Http\Request;

class AdminUtilityController extends Controller
{
    private AdminUtilityServiceReporsitoryInterface $adminUtilityServiceReporsitoryInterface;

    public function __construct(AdminUtilityServiceReporsitoryInterface $adminUtilityServiceReporsitoryInterface){
        $this->adminUtilityServiceReporsitoryInterface = $adminUtilityServiceReporsitoryInterface;
    }

    public function getActivityLogs(Request $request){
        try {
            $requestType = $request->requestType ?? null;
            $data = $this->adminUtilityServiceReporsitoryInterface->getActivityLogData();
            return response()->json($data);

        } catch (\Throwable $th) {
            return $th;
        }
    }
}
