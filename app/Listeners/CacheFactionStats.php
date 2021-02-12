<?php

namespace App\Listeners;

use App\Events\MiniSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;

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
        foreach ($event->mini->factions as $faction) {
            Artisan::call("faction:cache-stats --faction={$faction->id}");
        }
    }
}
