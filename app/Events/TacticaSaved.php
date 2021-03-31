<?php

namespace App\Events;

use App\Models\Tactica;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TacticaSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tactica;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Tactica $tactica)
    {
        $this->tactica = $tactica;
    }
}
