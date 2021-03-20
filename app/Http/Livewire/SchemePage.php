<?php

namespace App\Http\Livewire;

use App\Models\Scheme;
use App\Models\Season;
use App\Models\Strategy;
use Livewire\Component;

class SchemePage extends Component
{
    public $seasons;
    public $season = "gaining-grounds-0";
    public $strategies;
    public $schemes;
    protected $queryString = ['season' => ['except' => 'gaining-grounds-0']];

    public function render()
    {
        $season_id = Season::where('slug', $this->season)->select('id')->first();
        $season_id = $season_id->id;
        $this->seasons = Season::orderBy('id', 'ASC')->get();
        $this->strategies = Strategy::where('season_id', $season_id)->orderBy('suit', 'ASC')->get();
        $this->schemes = Scheme::where('season_id', $season_id)->orderBy('number', 'ASC')->get();

        return view('livewire.scheme-page')
            ->extends('main')
            ->section('content');
    }
}
