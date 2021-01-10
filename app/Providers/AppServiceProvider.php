<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Faction;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $footerFactions = Faction::where('hidden','1')->get();
        View::share('footerFactions',$footerFactions);
    }
}
