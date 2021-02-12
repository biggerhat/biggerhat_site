<?php

namespace App\Events;

use App\Models\Mini;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MiniSaved
{
    use Dispatchable, SerializesModels;
    /** @var Mini */
    public $mini;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Mini $mini)
    {
        $this->mini = $mini;
    }
}
