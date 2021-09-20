<?php

namespace App\Listeners;

use App\Events\MiniSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Artisan;
use App\Models\Mini;
use Illuminate\Support\Str;

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
        $mini = Mini::viewAll()->find($event->mini->id);
        $mini->slug = Str::slug($mini->name, '-');
        $mini->saveQuietly();
        Artisan::call("keyword:cache-stats");
    }
}
