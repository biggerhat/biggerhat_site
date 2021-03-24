<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SummonPage extends Component
{
    public $master;
    public $chart;
    protected $queryString = [
        'master' => ['except' => '']
    ];

    private function setChart()
    {
        switch ($this->master) {
            case "asami-tanaka":
                $this->chart = "asami.png";
                break;
            case "dashel-barker":
                $this->chart = "dashel.png";
                break;
            case "dreamer":
                $this->chart = "dreamer.png";
                break;
            case "forgotten-marshal":
                $this->chart = "forgotten.png";
                break;
            case "kirai-ankou":
                $this->chart = "kirai.png";
                break;
            case "nicodem":
                $this->chart = "nicodem.png";
                break;
            case "ramos":
                $this->chart = "ramos.png";
                break;
            case "sandeep-desai":
                $this->chart = "sandeep.png";
                break;
            case "somer-teeth-jones":
                $this->chart = "somer.png";
                break;
            case "tara-blake":
                $this->chart = "tara.png";
                break;
            case "ulix-turner":
                $this->chart = "ulix.png";
                break;
            case "widow-weaver":
                $this->chart = "weaver.png";
                break;
            default:
                $this->chart = "summonrules.PNG";
                break;
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
