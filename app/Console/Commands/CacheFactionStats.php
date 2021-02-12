<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use App\Models\Faction;

class CacheFactionStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'faction:cache-stats {--faction=all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculates and Caches all the necessary faction stats into Redis.';

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
        $factions = Faction::with("minis.actions")
            ->where('hidden', true); // TOOD: Re-factor hidden to make sense

        // If we have an option for a specific faction, apply to the query builder
        $factionOption = $this->option('faction');
        if ($factionOption != "all") {
            $factions = $factions->where("id", $factionOption);
        }
        $factions = $factions->get();

        foreach ($factions as $faction) {
            //Find Stat Averages and Set them in Redis
            $uniqueCharacters = $faction->minis->count();
            $totalCharacters = 0;
            $totalDf = 0;
            $totalWp = 0;
            $totalMv = 0;
            $totalWd = 0;
            $totalCost = 0;
            $meleeTotal = 0;
            $meleeRangeTotal = 0;
            $meleeStatTotal = 0;
            $gunTotal = 0;
            $gunRangeTotal = 0;
            $gunStatTotal = 0;

            foreach ($faction->minis as $mini) {
                $totalCharacters += $mini->quantity;
                $totalDf += $mini->defense;
                $totalWp += $mini->willpower;
                $totalMv += $mini->move;
                $totalCost += $mini->cost;
                $totalWd += $mini->wounds;

                foreach ($mini->actions as $action) {
                    if ($action->type != "tactical") {
                        switch ($action->range_type) {
                            case "{{melee}}":
                                $meleeTotal++;
                                $meleeRangeTotal += $action->range;
                                $meleeStatTotal += $action->stat;
                            case "{{gun}}":
                                $gunTotal++;
                                $gunRangeTotal += $action->range;
                                $gunStatTotal += $action->stat;
                        }
                    }
                }
            }

            //Calculate averages
            $averageDf = floor($totalDf / $uniqueCharacters);
            $averageWp = floor($totalWp / $uniqueCharacters);
            $averageMv = floor($totalMv / $uniqueCharacters);
            $averageWounds = floor($totalWd / $uniqueCharacters);
            $averageCost = floor($totalCost / $uniqueCharacters);
            $averageMeleeStat = floor($meleeStatTotal / $meleeTotal);
            $averageMeleeRange = floor($meleeRangeTotal / $meleeTotal);
            $averageGunStat = floor($gunStatTotal / $gunTotal);
            $averageGunRange = floor($gunRangeTotal / $gunTotal);

            //Insert into redis
            Redis::hset(
                "factions:statistics:{$faction->slug}",
                "uniqueCharacters",
                $uniqueCharacters,
                "totalCharacters",
                $totalCharacters,
                "averageDf",
                $averageDf,
                "averageWp",
                $averageWp,
                "averageMv",
                $averageMv,
                "averageWounds",
                $averageWounds,
                "averageCost",
                $averageCost,
                "averageMeleeStat",
                $averageMeleeStat,
                "averageMeleeRange",
                $averageMeleeRange,
                "averageGunStat",
                $averageGunStat,
                "averageGunRange",
                $averageGunRange
            );
        }

        echo "Statistics have been calculated and Cached";
    }
}
