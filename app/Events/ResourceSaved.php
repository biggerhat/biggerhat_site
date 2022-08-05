<?php

namespace App\Events;

use App\Models\Resource;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ResourceSaved
{
    use Dispatchable, SerializesModels;

    /** @var Resource */
    public $resource;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }
}
