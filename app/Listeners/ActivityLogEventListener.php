<?php

namespace App\Listeners;

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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this->logger->log($event);
    }
}
