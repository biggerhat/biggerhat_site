<?php

namespace App\Providers;

use App\Providers\MiniSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CacheFactionStats
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
     * @param  MiniSaved  $event
     * @return void
     */
    public function handle(MiniSaved $event)
    {
        //
    }
}
