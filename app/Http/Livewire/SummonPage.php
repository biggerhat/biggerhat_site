<?php

namespace App\Http\Livewire;

use App\Models\Mini;
use App\Models\Summon;
use App\Models\Upgrade;
use Livewire\Component;

class SummonPage extends Component
{
    public $chart;
    public $summoners;
    public $summoner;
    public $newSum;
    public $summons = [];
    public $upgrades = [];
    protected $queryString = [
        'summoner' => ['except' => ''],
    ];

    public function mount()
    {
        $this->summoners = Mini::whereHas('summoner')->orderBy('name')->get();
    }

    private function setChart()
    {
        if (!$this->summoner) {
            $this->chart = "./images/summonrules.PNG";
            $this->newSum = null;
            $this->summons = [];
            $this->upgrades = [];
        } else {
            $this->newSum = Mini::where('slug', "=", $this->summoner)->with('summoner', 'summons')->first();
            $this->summons = $this->newSum->summoner[0]->summons;
            $this->upgrades = $this->newSum->summoner[0]->upgrades;
            $this->chart = "\storage\\" . $this->newSum->summoner[0]->chart;
        }
    }

    public function getBackground(Mini $mini): string
    {
        if (count($mini->factions) > 1) {
            return implode(" ", [
                "bg-gradient-to-r",
                "from-{$mini->factions[0]['bg_color']}",
                "to-{$mini->factions[1]['bg_color']}"
            ]);
        }

        return "bg-{$mini->factions[0]['bg_color']}";
    }

    public function getUpgradeBackground(Upgrade $upgrade): string
    {
        if (count($upgrade->factions) > 1) {
            return implode(" ", [
                "bg-gradient-to-r",
                "from-{$upgrade->factions[0]['bg_color']}",
                "to-{$upgrade->factions[1]['bg_color']}"
            ]);
        }

        return "bg-{$upgrade->factions[0]['bg_color']}";
    }

    public function render()
    {
        $this->setChart();
        return view('livewire.summon-page')
            ->extends('main')
            ->section('content');
    }
}
