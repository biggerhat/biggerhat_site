<?php

namespace App\Http\Livewire;

use App\Models\Ability;
use App\Models\Action;
use App\Models\Faction;
use App\Models\Mini;
use Livewire\Component;

class AdvancedPage extends Component
{
    public $factions = [];
    public $formFactions;
    public $results;
    public $cost;
    public $costEval;
    public $wounds;
    public $woundEval;
    public $df;
    public $dfEval;
    public $wp;
    public $wpEval;
    public $mv;
    public $mvEval;
    public $size;
    public $sizeEval;
    public $base;
    public $baseEval;
    public $character;
    public $action;
    public $ability;
    public $formAbilities;
    public $formActions;
    protected $queryString = [
        'character' => ['except' => ''],
        'factions' => ['except' => ''],
        'ability' => ['except' => ''],
        'action' => ['except' => ''],
        'cost' => ['except' => ''],
        'costEval' => ['except' => ''],
        'wounds' => ['except' => ''],
        'woundEval' => ['except' => ''],
        'df' => ['except' => ''],
        'dfEval' => ['except' => ''],
        'wp' => ['except' => ''],
        'wpEval' => ['except' => ''],
        'mv' => ['except' => ''],
        'mvEval' => ['except' => ''],
        'size' => ['except' => ''],
        'sizeEval' => ['except' => ''],
        'base' => ['except' => ''],
        'baseEval' => ['except' => ''],
    ];

    public function mount()
    {
        $this->filter();
    }

    public function filter()
    {
        $this->results = Mini::isAlive();
        if ($this->character) {
            $this->results = $this->results->where("name", 'LIKE', "%{$this->character}%");
        }
        if ($this->cost) {
            $eval = $this->evalCheck($this->costEval);
            $this->results = $this->results->where("cost", "{$eval}", "{$this->cost}");
        }
        if ($this->wounds) {
            $eval = $this->evalCheck($this->woundEval);
            $this->results = $this->results->where("wounds", "{$eval}", "{$this->wounds}");
        }
        if ($this->size) {
            $eval = $this->evalCheck($this->szEval);
            $this->results = $this->results->where("size", "{$eval}", "{$this->size}");
        }
        if ($this->df) {
            $eval = $this->evalCheck($this->dfEval);
            $this->results = $this->results->where("defense", "{$eval}", "{$this->df}");
        }
        if ($this->wp) {
            $eval = $this->evalCheck($this->wpEval);
            $this->results = $this->results->where("willpower", "{$eval}", "{$this->wp}");
        }
        if ($this->mv) {
            $eval = $this->evalCheck($this->mvEval);
            $this->results = $this->results->where("move", "{$eval}", "{$this->mv}");
        }
        if ($this->base) {
            $eval = $this->evalCheck($this->baseEval);
            $this->results = $this->results->where("base", "{$eval}", "{$this->base}");
        }
        if ($this->ability) {
            $this->results = $this->results->hasAbility($this->ability);
        }
        if ($this->action) {
            $this->results = $this->results->hasAction($this->action);
        }
        if ($this->factions) {
            $this->results = $this->results->InFaction($this->factions);
        }

        $this->results = $this->results->with('cards')->orderBy('name')->select('slug', 'name', 'id')->get();
    }

    private function evalCheck($eval): string
    {
        switch ($eval) {
            case "grthan":
                return ">";
                break;
            case "lsthan":
                return "<";
                break;
            case "equals":
                return "=";
                break;
            default:
                return "=";
                break;
        }
    }

    public function clearFilters()
    {
        $this->reset();
        $this->filter();
    }


    public function render()
    {
        $this->formFactions = Faction::isAlive()->orderBy('name', 'ASC')->get();
        $tempAbilities = Ability::orderBy('name')->get();
        foreach ($tempAbilities as $newAbility) {
            $newAbility->name = preg_replace('# \((.*?)\)#', "", $newAbility->name);
        }
        $this->formAbilities = $tempAbilities->unique('name');
        $this->formActions = Action::orderBy('name')->get()->unique('name');
        return view('livewire.advanced-page')
            ->extends('main')
            ->section('content');
    }
}
