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

    protected static $selectedColumns = ["message", "created_at"];

    /**
     * @param int $userId
     *
     * @return array
     */
    public static function getActivityLogData(int $userId) : array|null
    {
        return self::where("created_by", $userId)->orderBy("created_at", "desc")->get(self::$selectedColumns)->take(10)->toArray();
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
