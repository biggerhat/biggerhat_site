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
    public $characteristics;
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
        $this->characteristics = Redis::hgetall("factions:characteristics:{$faction->slug}");
        arsort($this->characteristics);
        $this->factionId = $this->faction->id;
        $this->topAbilities = json_decode($this->statistics['topAbilities'], TRUE);
        $this->filterCheck();
    }

    public function masterToggle()
    {
        $this->showMasters = !$this->showMasters;
    }

    public function henchmenToggle()
    {
        $this->showHenchmen = !$this->showHenchmen;
    }

    public function enforcerToggle()
    {
        $this->showEnforcers = !$this->showEnforcers;
    }

    public function minionToggle()
    {
        $this->showMinions = !$this->showMinions;
    }

    public function toggleAll($toggle)
    {
        $this->showMasters = $toggle;
        $this->showHenchmen = $toggle;
        $this->showEnforcers = $toggle;
        $this->showMinions = $toggle;
    }


    public function filterKeyword($name)
    {
        $this->keyword = $name;
        $this->filterCheck();
    }

    public function filterCharacteristic($name)
    {
        $this->characteristic = $name;
        $this->filterCheck();
    }

    public function filterCheck()
    {
        $query = Mini::inFaction($this->factionId);
        if ($this->keyword) {
            $query = $query->filterKeyword($this->keyword);
        }
        if ($this->characteristic) {
            $query = $query->filterCharacteristic($this->characteristic);
        }
        $this->minis = $query->orderBy('name', 'ASC')->get();
        $this->stationFilter();
        if (!$this->keyword && !$this->characteristic) {
            $this->toggleAll(false);
            return;
        }
        $this->toggleAll(true);
    }

    public function clearFilters($name = "")
    {
        switch ($name) {
            case "keyword":
                $this->keyword = "";
                break;
            case "characteristic":
                $this->characteristic = "";
                break;
            default:
                $this->keyword = "";
                $this->characteristic = "";
                $this->toggleAll(false);
                break;
        }
        $this->filterCheck();
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
