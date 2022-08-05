<?php

namespace App\Listeners;

use App\Events\TacticaSaved;
use App\Models\Tactica;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class setTacticaSlug
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
     * @param  TacticaSaved  $event
     * @return void
     */
    public function handle(TacticaSaved $event)
    {
        $id = $event->tactica->id;
        $tactica = Tactica::find($id);
        $tactica->slug = Str::slug($tactica->name);
        $tactica->saveQuietly();
    }
}
