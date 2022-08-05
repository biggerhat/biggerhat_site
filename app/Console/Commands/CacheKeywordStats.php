<?php

namespace App\Console\Commands;

use App\Models\Keyword;
use App\Models\Mini;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class CacheKeywordStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'keyword:cache-stats {--keyword=all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculates and caches all the stats for one or all keywords.';

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
        $keywords = Keyword::with("minis"); // TOOD: Re-factor hidden to make sense

        // If we have an option for a specific faction, apply to the query builder
        $keywordOption = $this->option('keyword');
        if ($keywordOption != "all") {
            $keywords = $keywords->where("id", $keywordOption);
        }
        $keywords = $keywords->get();

        foreach ($keywords as $keyword) {
            $minis = Mini::inKeyword($keyword->id)->get();
            $uniqueCharacters = $minis->count();
            $masters = $minis->filter(function ($item) {
                return $item['station_id'] === 1;
            });
            $henchmen = $minis->filter(function ($item) {
                return $item['station_id'] === 2;
            });
            $enforcers = $minis->filter(function ($item) {
                return $item['station_id'] === 3;
            });
            $minions = $minis->filter(function ($item) {
                return $item['station_id'] === 4;
            });
            $totalCharacters = 0;
            foreach ($minis as $mini) {
                $totalCharacters += $mini->quantity;
            }

            Redis::hset(
                "keywords:statistics:{$keyword->slug}",
                "uniqueCharacters",
                $uniqueCharacters,
                "totalCharacters",
                $totalCharacters,
                "masters",
                $masters->count(),
                "henchmen",
                $henchmen->count(),
                "enforcers",
                $enforcers->count(),
                "minions",
                $minions->count(),
            );
        }
    }
}
