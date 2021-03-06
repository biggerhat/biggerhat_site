<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Box;


class BoxSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $box;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Box $box)
    {
        $this->box = $box;
    }
}
