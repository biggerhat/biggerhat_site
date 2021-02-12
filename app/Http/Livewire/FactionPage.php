<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Faction;
use App\Models\Mini;
use App\Models\Keyword;
use App\Models\Upgrade;
use App\Models\Ability;
use Illuminate\Support\Facades\Redis;

class FactionPage extends Component
{
    public $faction;
    public $factions;
    public $minis;
    public $masters;
    public $showMasters = false;
    public $henchmen;
    public $showHenchmen = false;
    public $enforcers;
    public $showEnforcers = false;
    public $minions;
    public $showMinions = false;
    public $topAbilities = [];
    public $abilityFilter = [''];
    //public $abilityFilter = ['','Hard to Wound','Armor +1','Hard to Kill','Unimpeded','Insignificant','Armor +2','Ruthless','Flight','Manipulative','Incorporeal','Terrifying (11)','Flurry','Disguised','Stealth','Don\'t Mind Me','Accomplice','Regeneration +1','Gunfighter','Eat Your Fill','Frenzied Charge','Agile','Evasive','Serene Countenance','Deadly Pursuit','Arcane Shield +1','Terrifying (12)','Rush','From the Shadows','Run and Gun','Counterspell','Extended Reach','Arcane Reservoir','Laugh Off','Nimble','Charge Through','Assassin','Tools for the Job','Butterfly Jump','Chatty','Companion','Rapid Fire'];
    public $superTopAbilities = [];
    public $statistics;

    public function mount(Faction $faction)
    {
        $this->factions = Faction::where('hidden','1')->orderBy('name','ASC')->get();
        $this->faction = $faction;
        $this->statistics = Redis::hgetall("factions:statistics:{$faction->slug}");
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
        $this->getTopAbilities();
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
            /* if(array_search($name,$this->abilityFilter) == false)
            {
                unset($this->topAbilities[$name]);
            }
            else
            { */
                $this->superTopAbilities[$x]['name'] = $name;
                $this->superTopAbilities[$x]['count'] = $count;
                $tempAbility = Ability::where('name',$name)->first();
                $this->superTopAbilities[$x]['description'] = $tempAbility->description;
                $x++;
                
                
            //} 
        }        
        $this->topAbilities = array_slice($this->superTopAbilities,0,10);
    }

    public function masterToggle() 
    {
        if($this->showMasters)
        {
            $this->showMasters = false;
        }
        else
        {
            $this->showMasters = true;
        }
    }

    public function henchmenToggle() 
    {
        if($this->showHenchmen)
        {
            $this->showHenchmen = false;
        }
        else
        {
            $this->showHenchmen = true;
        }
    }

    public function enforcerToggle() 
    {
        if($this->showEnforcers)
        {
            $this->showEnforcers = false;
        }
        else
        {
            $this->showEnforcers = true;
        }
    }

    public function minionToggle() 
    {
        if($this->showMinions)
        {
            $this->showMinions = false;
        }
        else
        {
            $this->showMinions = true;
        }
    }

}
 