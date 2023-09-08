<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        "module", "type", "data", "message", "created_by"
    ];

    public static function getActivityLogData(int $userId)
    {
        return self::where("created_by", $userId)->take(10);
    }

    /**
     * @param array $activityLogInfo
     *
     * @return mixed
     */
    public static function storeActivityLog(array $activityLogInfo)
    {
        return self::create($activityLogInfo);
    }
}
