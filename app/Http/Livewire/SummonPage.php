<?php

namespace App\Http\Livewire;

use App\Models\Mini;
use App\Models\Summon;
use Livewire\Component;

class SummonPage extends Component
{
    public $master;
    public $chart;
    public $summoners;
    public $summoner;
    protected $queryString = [
        'master' => ['except' => ''],
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
        } else {
            $newSum = Mini::where('slug', "=", $this->summoner)->with('summoner')->first();
            $this->chart = "\storage\\" . $newSum->summoner[0]->chart;
        }
    }

    public function render()
    {
        $this->setChart();
        return view('livewire.summon-page')
            ->extends('main')
            ->section('content');
    }
}
