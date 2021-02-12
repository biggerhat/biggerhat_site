<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
use App\Models\Faction;
use App\Models\Mini;
use App\Models\Keyword;
use App\Models\Ability;

class CacheFactionStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cachefactionstats';

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
        //Get All Factions Except DMH
        $factions = Faction::where('hidden','1')->orderBy('name','ASC')->get();
        foreach($factions as $faction)
        {  
            //set hash namespaces
            $namespace = "factions:statistics:{$faction->slug}";
            //Pull all the Characters from this faction except DMH
            $id = $faction->id;
            $minis = Mini::whereHas('factions', function($query) use ($id) {
            $query->where('faction_id','=',$id);
                })
            ->whereDoesntHave('factions', function($query) {
                $query->where('faction_id','=', 8);
                })
            ->orderBy('station_id','ASC')
            ->orderBy('name','ASC')
            ->get();

            //Find Stat Averages and Set them in Redis
            $uniqueCharacters = count($minis);
            $totalCharacters = 0;
            $averageDf = 0;
            $averageWp = 0;
            $averageMv = 0;
            $averageWounds = 0;
            $averageCost = 0;
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
            $averageMeleeStat = 0;
            $averageMeleeRange = 0;
            $averageGunStat = 0;
            $averageGunRange = 0;
            foreach($minis as $mini)
            {
                $totalCharacters += $mini->quantity;
                $totalDf += $mini->defense;
                $totalWp += $mini->willpower;
                $totalMv += $mini->move;
                $totalCost += $mini->cost;
                $totalWd += $mini->wounds;

                foreach($mini->actions as $action)
                {
                    if(($action->range_type == "{{melee}}") && ($action->type != "tactical"))
                    {
                        $meleeTotal++;
                        $meleeRangeTotal += $action->range;
                        $meleeStatTotal += $action->stat;
                    }
                    else if(($action->range_type == "{{gun}}") && ($action->type != "tactical"))
                    {
                        $gunTotal++;
                        $gunRangeTotal += $action->range;
                        $gunStatTotal += $action->stat;
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
            Redis::hset($namespace,
                    "uniqueCharacters",$uniqueCharacters,
                    "totalCharacters",$totalCharacters,
                    "averageDf",$averageDf,
                    "averageWp",$averageWp,
                    "averageMv",$averageMv,
                    "averageWounds",$averageWounds,
                    "averageCost",$averageCost,
                    "averageMeleeStat",$averageMeleeStat,
                    "averageMeleeRange",$averageMeleeRange,
                    "averageGunStat",$averageGunStat,
                    "averageGunRange",$averageGunRange);

        }

        echo "Statistics have been calculated and Cached";
    }
}
