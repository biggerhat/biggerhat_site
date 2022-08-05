<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\MiniSaved;
use App\Events\ResourceSaved;
use App\Events\BoxSaved;
use App\Events\TacticaSaved;
use App\Listeners\CacheFactionStats;
use App\Listeners\setResourceSlug;
use App\Listeners\setBoxSlug;
use App\Listeners\setTacticaSlug;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        MiniSaved::class => [
            CacheFactionStats::class,
        ],
        ResourceSaved::class => [
            setResourceSlug::class,
        ],
        BoxSaved::class => [
            setBoxSlug::class,
        ],
        TacticaSaved::class => [
            setTacticaSlug::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
