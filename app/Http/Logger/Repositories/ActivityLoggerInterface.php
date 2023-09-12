<?php

namespace App\Http\Logger\Repositories;

use App\Events\ActivityLogEvent;

interface ActivityLoggerInterface
{
    public function log(ActivityLogEvent $event): void;
}
