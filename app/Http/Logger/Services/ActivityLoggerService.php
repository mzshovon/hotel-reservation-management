<?php

namespace App\Http\Logger\Services;

use App\Http\Logger\Repositories\ActivityLoggerInterface;
use App\Models\ActivityLog;
use Carbon\Carbon;

class ActivityLoggerService implements ActivityLoggerInterface
{
    /**
     * @param $event
     * @return void
     */
    public function log($event): void {

        $data = [
            'module' => $event->module,
            'type' => $event->type,
            'data' => $event->data,
            'message' => $event->message,
            'created_by' => $event->userId ?? auth()->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        ActivityLog::storeActivityLog($data);
    }
}
