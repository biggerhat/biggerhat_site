<?php

namespace App\Listeners;

use App\Events\ResourceSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;

class setResourceSlug
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ResourceSaved  $event
     * @return void
     */
    public function handle(ResourceSaved $event)
    {
        Artisan::call("slug:resource --resource={$event->resource->id}");
    }
}
