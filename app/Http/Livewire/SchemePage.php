<?php

namespace App\Http\Livewire;

use App\Models\Scheme;
use App\Models\Season;
use App\Models\Strategy;
use Livewire\Component;

class SchemePage extends Component
{
    public $seasons;
    public $season = 1;
    public $strategies;
    public $schemes;
    protected $queryString = ['season' => ['except' => '1']];

    public function render()
    {
        $this->seasons = Season::orderBy('id', 'ASC')->get();
        $this->strategies = Strategy::where('season_id', $this->season)->orderBy('suit', 'ASC')->get();
        $this->schemes = Scheme::where('season_id', $this->season)->orderBy('number', 'ASC')->get();

        return view('livewire.scheme-page')
            ->extends('main')
            ->section('content');
    }
}
