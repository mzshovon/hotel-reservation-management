<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ActivityLogEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $module;
    public string $data;
    public string $message;
    public mixed $type;
    public mixed $userId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $module, string $data, string $message, $type = null, $userId = null)
    {
        // dd($module,  $data,  $message, $type);
        $this->module = $module;
        $this->data = $data;
        $this->message = $message;
        $this->type = $type;
        $this->userId = $userId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
