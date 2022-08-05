<?php

namespace App\Listeners;

use App\Events\BoxSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;

class setBoxSlug
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
     * @param  BoxSaved  $event
     * @return void
     */
    public function handle(BoxSaved $event)
    {
        Artisan::call("slug:box --box={$event->box->id}");
    }
}
