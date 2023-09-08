<?php

namespace App\Http\Services\AdminUtilities;

use App\Models\ActivityLog;
use App\Repositories\AdminUtilityServiceReporsitoryInterface;

class AdminUtilitiesService implements AdminUtilityServiceReporsitoryInterface {

    public function __construct(private ActivityLog $activityLog)
    {

    }

    public function getActivityLogData()
    {
        dd($this->activityLog::getActivityLogData(getUserInfo()->id));
    }

}
