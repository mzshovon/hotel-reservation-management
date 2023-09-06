<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    public static function storeActivityLog(array $activityLogInfo)
    {
        return self::create($activityLogInfo);
    }
}
