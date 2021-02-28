<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Faction;
use App\Models\Mini;
use App\Models\Ability;
use Illuminate\Support\Facades\Redis;

class FactionPage extends Component
{
    public $factionId;
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
    public $statistics;
    public $keywords;
    public $keywordFilter;
    public $characteristicFilter;
    public $keyword;
    public $characteristic;
    protected $queryString = ['keyword' => ['except' => ''], 'characteristic' => ['except' => '']];

    public function mount(Faction $faction)
    {
        $this->factions = Faction::where('hidden', '1')->orderBy('name', 'ASC')->get();
        $this->faction = $faction;
        $this->faction->load('episodes');
        $this->statistics = Redis::hgetall("factions:statistics:{$faction->slug}");
        $this->keywords = Redis::hgetall("factions:keywords:{$faction->slug}");
        arsort($this->keywords);
        $this->factionId = $this->faction->id;
        $this->topAbilities = json_decode($this->statistics['topAbilities'], TRUE);

        if ($this->keyword) {
            $this->filterKeyword($this->keyword);
        } else {
            $this->clearFilters();
        }
    }

    public function masterToggle()
    {
        if ($this->showMasters) {
            $this->showMasters = false;
        } else {
            $this->showMasters = true;
        }
    }

    public function henchmenToggle()
    {
        if ($this->showHenchmen) {
            $this->showHenchmen = false;
        } else {
            $this->showHenchmen = true;
        }
    }

    public function enforcerToggle()
    {
        if ($this->showEnforcers) {
            $this->showEnforcers = false;
        } else {
            $this->showEnforcers = true;
        }
    }

    public function minionToggle()
    {
        if ($this->showMinions) {
            $this->showMinions = false;
        } else {
            $this->showMinions = true;
        }
    }

    public function filterKeyword($name)
    {
        $this->keyword = $name;
        $this->minis = Mini::inFaction($this->factionId)
            ->filterKeyword($this->keyword)
            ->orderBy('name', 'ASC')
            ->get();
        $this->stationFilter();
        $this->showMasters = true;
        $this->showHenchmen = true;
        $this->showEnforcers = true;
        $this->showMinions = true;
    }

    public function clearFilters()
    {
        $this->keyword = '';
        $this->characteristic = '';
        $this->minis = Mini::inFaction($this->factionId)
            ->orderBy('name', 'ASC')
            ->get();

        $this->stationFilter();
    }

    public function stationFilter()
    {
        $this->masters = $this->minis->filter(function ($item) {
            return $item['station_id'] === 1;
        });
        $this->henchmen = $this->minis->filter(function ($item) {
            return $item['station_id'] === 2;
        });
        $this->enforcers = $this->minis->filter(function ($item) {
            return $item['station_id'] === 3;
        });
        $this->minions = $this->minis->filter(function ($item) {
            return $item['station_id'] === 4;
        });
    }


    public function render()
    {
        return view('livewire.faction-page')
            ->extends('main')
            ->section('content');
    }
}
