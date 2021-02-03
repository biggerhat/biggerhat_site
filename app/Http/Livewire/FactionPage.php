<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Faction;
use App\Models\Mini;
use App\Models\Keyword;

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

    public function mount($id)
    {
        $this->factions = Faction::where('hidden','1')->get();
        $this->faction = Faction::with('minis')->find($id);
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
            ->section('content');;
    }
}
