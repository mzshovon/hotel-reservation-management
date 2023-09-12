<?php

namespace App\Listeners;

use App\Events\ActivityLogEvent;
use App\Http\Logger\Repositories\ActivityLoggerInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActivityLogEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private ActivityLoggerInterface $logger)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ActivityLogEvent  $event
     * @return void
     */
    public function handle(ActivityLogEvent $event)
    {
        $this->logger->log($event);
    }
}
