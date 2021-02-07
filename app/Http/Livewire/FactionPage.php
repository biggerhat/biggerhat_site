<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Faction;
use App\Models\Mini;
use App\Models\Keyword;
use App\Models\Upgrade;
use App\Models\Ability;

class FactionPage extends Component
{
    public $faction;
    public $factions;
    public $uniqueCharacters;
    public $totalCharacters = 0;
    public $averageDf;
    public $averageWp;
    public $averageMv;
    public $averageWounds;
    public $averageCost;
    public $minis;
    public $masters;
    public $showMasters = true;
    public $henchmen;
    public $showHenchmen = true;
    public $enforcers;
    public $showEnforcers = true;
    public $minions;
    public $showMinions = true;
    public $topAbilities = [];
    public $abilityFilter = ['','Hard to Wound','Armor +1','Hard to Kill','Unimpeded','Insignificant','Armor +2','Ruthless','Flight','Manipulative','Incorporeal','Terrifying (11)','Flurry','Disguised','Stealth','Don\'t Mind Me','Accomplice','Regeneration +1','Gunfighter','Eat Your Fill','Frenzied Charge','Agile','Evasive','Serene Countenance','Deadly Pursuit','Arcane Shield +1','Terrifying (12)','Rush','From the Shadows','Run and Gun','Counterspell','Extended Reach','Arcane Reservoir','Laugh Off','Nimble','Charge Through','Assassin','Tools for the Job','Butterfly Jump','Chatty','Companion','Rapid Fire'];
    public $superTopAbilities = [];
    public $averageMeleeStat;
    public $averageMeleeRange;
    public $averageGunStat;
    public $averageGunRange;

    public function mount(Faction $faction)
    {
        $this->factions = Faction::where('hidden','1')->orderBy('name','ASC')->get();
        $this->faction = $faction;
        $id = $this->faction->id;
        $this->minis = Mini::whereHas('factions', function($query) use ($id) {
            $query->where('faction_id','=',$id);
        })
            ->whereDoesntHave('factions', function($query) {
                $query->where('faction_id','=', 8);
            })
            ->orderBy('station_id','ASC')
            ->orderBy('name','ASC')
            ->get();
        $this->masters = Mini::whereHas('factions', function($query) use ($id) {
            $query->where('faction_id','=',$id);
        })
            ->whereDoesntHave('factions', function($query) {
                $query->where('faction_id','=', 8);
            })
            ->where('station_id',1)
            ->orderBy('name','ASC')
            ->get();
        $this->henchmen = Mini::whereHas('factions', function($query) use ($id) {
            $query->where('faction_id','=',$id);
        })
            ->whereDoesntHave('factions', function($query) {
                $query->where('faction_id','=', 8);
            })
            ->where('station_id',2)
            ->orderBy('name','ASC')
            ->get();
        $this->enforcers = Mini::whereHas('factions', function($query) use ($id) {
            $query->where('faction_id','=',$id);
        })
            ->whereDoesntHave('factions', function($query) {
                $query->where('faction_id','=', 8);
            })
            ->where('station_id',3)
            ->orderBy('name','ASC')
            ->get();            
        $this->minions = Mini::whereHas('factions', function($query) use ($id) {
            $query->where('faction_id','=',$id);
        })
            ->whereDoesntHave('factions', function($query) {
                $query->where('faction_id','=', 8);
            })
            ->where('station_id',4)
            ->orderBy('name','ASC')
            ->get();            
        $this->getStats();
        $this->getTopAbilities();
        $this->getAttackStats();
    }

    public function getStats()
    {
        $this->uniqueCharacters = count($this->faction->minis);
        $totalDf = 0;
        $totalWp = 0;
        $totalMv = 0;
        $totalWd = 0;
        $totalCost = 0;
        foreach($this->faction->minis as $mini)
        {
            $this->totalCharacters = $this->totalCharacters + $mini->quantity;
            $totalDf = $totalDf + $mini->defense;
            $totalWp = $totalWp + $mini->willpower;
            $totalMv = $totalMv + $mini->move;
            $totalCost = $totalCost + $mini->cost;
            $totalWd = $totalWd + $mini->wounds;
        }

        $this->averageDf = floor($totalDf / $this->uniqueCharacters);
        $this->averageWp = floor($totalWp / $this->uniqueCharacters);
        $this->averageMv = floor($totalMv / $this->uniqueCharacters);
        $this->averageWounds = floor($totalWd / $this->uniqueCharacters);
        $this->averageCost = floor($totalCost / $this->uniqueCharacters);
        


    }


    public function render()
    {
        return view('livewire.faction-page')
            ->extends('main')
            ->section('content');
    }

    public function getTopAbilities()
    {   
        foreach($this->minis as $mini)
        {
            foreach($mini->abilities as $ability)
            {
                if(array_key_exists($ability['name'], $this->topAbilities))
                {
                    $this->topAbilities[$ability['name']] += 1;
                }
                else
                {
                    $this->topAbilities += [$ability['name'] => 1]; 
                }
            }
            arsort($this->topAbilities);
        }
        
        $x = 0;
        foreach($this->topAbilities as $name => $count)
        {
            if(array_search($name,$this->abilityFilter) == false)
            {
                unset($this->topAbilities[$name]);
            }
            else
            {
                $this->superTopAbilities[$x]['name'] = $name;
                $this->superTopAbilities[$x]['count'] = $count;
                $tempAbility = Ability::where('name',$name)->first();
                $this->superTopAbilities[$x]['description'] = $tempAbility->description;
                $x++;
                
                
            }
        }        
        $this->topAbilities = array_slice($this->superTopAbilities,0,10);
    }

    public function getAttackStats()
    {
        $meleeTotal = 0;
        $meleeRangeTotal = 0;
        $meleeStatTotal = 0;
        $gunTotal = 0;
        $gunRangeTotal = 0;
        $gunStatTotal = 0;

        foreach($this->minis as $mini)
        {
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
        $this->averageMeleeStat = floor($meleeStatTotal / $meleeTotal);
        $this->averageMeleeRange = floor($meleeRangeTotal / $meleeTotal);
        $this->averageGunStat = floor($gunStatTotal / $gunTotal);
        $this->averageGunRange = floor($gunRangeTotal / $gunTotal);
    }

}
 