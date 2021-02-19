<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use App\Models\Faction;
use App\Models\Ability;

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
            ->with("minis.keywords")
            ->with("minis.abilities")
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
            $factionKeywords = [];
            $factionAbilities = [];
            $allAbilities = collect([]);
            $abilities = [];

            foreach ($faction->minis as $mini) {
                $totalCharacters += $mini->quantity;
                $totalDf += $mini->defense;
                $totalWp += $mini->willpower;
                $totalMv += $mini->move;
                $totalCost += $mini->cost;
                $totalWd += $mini->wounds;


                //Calculate #s for each keyword and store it
                foreach ($mini->keywords as $keyword) {
                    if (array_key_exists($keyword['name'], $factionKeywords)) {
                        $factionKeywords[$keyword['name']] += 1;
                    } else {
                        $factionKeywords += [$keyword['name'] => 1];
                    }
                }
                //Store Keyword values in Redis
                foreach ($factionKeywords as $name => $value) {
                    Redis::hset(
                        "factions:keywords:{$faction->slug}",
                        "{$name}",
                        $value
                    );
                }

                foreach ($mini->abilities as $ability) {
                    $allAbilities->push($ability);
                }

                /**
                foreach ($mini->abilities as $ability) {
                    $key = array_search("{$ability['name']}", array_column($factionAbilities, "name"));
                    if ($key !== FALSE) {
                        $factionAbilities[$key]['count'] += 1;
                    } else {
                        $newAbility['name'] = $ability['name'];
                        $newAbility['count'] = 1;
                        $newAbility['description'] = $ability['description'];
                        array_push($factionAbilities, $newAbility);
                    }
                }
                array_multisort(array_column($factionAbilities, 'count'), SORT_DESC, $factionAbilities);
                Redis::hset("factions:statistics:{$faction->slug}", "topAbilities", json_encode($factionAbilities)); */

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

            $abilityByKey = $allAbilities->keyBy("name");
            $sorted = $allAbilities->countBy("name")->sortDesc()->slice(0, 10);
            foreach ($sorted as $key => $count) {
                $ability = $abilityByKey->get($key);
                $abilities[] = [
                    "name" => $ability->name,
                    "count" => $count,
                    "description" => $ability->description
                ];
            }

            Redis::hset(
                "factions:statistics:{$faction->slug}",
                "topAbilities",
                json_encode($abilities)
            );

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

        echo "Statistics have been Calculated and Cached";
    }
}
