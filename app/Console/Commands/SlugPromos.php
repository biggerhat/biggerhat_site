<?php

namespace App\Console\Commands;

use App\Http\Livewire\PromoPage;
use App\Models\Promo;
use Illuminate\Console\Command;
use Str;

class SlugPromos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slug:promo {--promo=all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets a slug for a specific promo or all promos.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $promoOption = $this->option('promo');
        if ($promoOption != "all") {
            $promos = Promo::where('id', $promoOption)->get();
        } else {
            $promos = Promo::all();
        }
        foreach ($promos as $promo) {
            $promo->slug = Str::slug($promo->name, '-');
            $promo->saveQuietly();
        }
    }
}
