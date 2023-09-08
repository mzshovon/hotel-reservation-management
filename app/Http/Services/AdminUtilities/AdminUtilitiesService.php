<?php

namespace App\Http\Services\AdminUtilities;

use App\Models\ActivityLog;
use App\Repositories\AdminUtilityServiceReporsitoryInterface;
use Carbon\Carbon;

class AdminUtilitiesService implements AdminUtilityServiceReporsitoryInterface {

    public function __construct(private ActivityLog $activityLog)
    {

    }

    public function getActivityLogData()
    {
        return $this->formatActivityLogData($this->activityLog::getActivityLogData(getUserInfo()->id)) ?? [];
    }

    public function formatActivityLogData($data)
    {
        return collect($data)->map(function($value) {
            return [
                "log" => $value['message'],
                "logTime" => Carbon::parse($value['created_at'])->diffForHumans(null, false, 1),
            ];
        })->toArray();
    }

}
