<?php

namespace App\Http\Livewire;

use App\Models\Ability;
use App\Models\Action;
use App\Models\Characteristic;
use App\Models\Faction;
use App\Models\Keyword;
use App\Models\Mini;
use App\Models\Station;
use Livewire\Component;

class AdvancedPage extends Component
{
    public $faction;
    public $formFactions;
    public $station;
    public $formStations;
    public $characteristic;
    public $formCharacteristics;
    public $keyword;
    public $formKeywords;
    public $results;
    public $cost;
    public $costEval;
    public $wounds;
    public $woundEval;
    public $df;
    public $dfEval;
    public $dfSuit;
    public $wp;
    public $wpEval;
    public $wpSuit;
    public $mv;
    public $mvEval;
    public $size;
    public $szEval;
    public $base;
    public $baseEval;
    public $character;
    public $action;
    public $ability;
    public $abiName;
    public $abiText;
    public $actName;
    public $actText;
    public $formAbilities;
    public $formActions;

    public $actionResults;
    public $actionDisplay;
    public $actStat;
    public $actSuit;
    public $actType;
    public $statEval;
    public $minDmg;
    public $minEval;
    public $modDmg;
    public $modEval;
    public $sevDmg;
    public $sevEval;
    public $range;
    public $rangeEval;

    protected $queryString = [
        'character' => ['except' => ''],
        'faction' => ['except' => ''],
        'station' => ['except' => ''],
        'characteristic' => ['except' => ''],
        'keyword' => ['except' => ''],
        'ability' => ['except' => ''],
        'abiName' => ['except' => ''],
        'abiText' => ['except' => ''],
        'actName' => ['except' => ''],
        'actText' => ['except' => ''],
        'action' => ['except' => ''],
        'cost' => ['except' => ''],
        'costEval' => ['except' => ''],
        'wounds' => ['except' => ''],
        'woundEval' => ['except' => ''],
        'df' => ['except' => ''],
        'dfEval' => ['except' => ''],
        'dfSuit' => ['except' => ''],
        'wp' => ['except' => ''],
        'wpEval' => ['except' => ''],
        'wpSuit' => ['except' => ''],
        'mv' => ['except' => ''],
        'mvEval' => ['except' => ''],
        'size' => ['except' => ''],
        'szEval' => ['except' => ''],
        'base' => ['except' => ''],
        'baseEval' => ['except' => ''],
        'minDmg' => ['except' => ''],
        'minEval' => ['except' => ''],
        'modDmg' => ['except' => ''],
        'modEval' => ['except' => ''],
        'sevDmg' => ['except' => ''],
        'sevEval' => ['except' => ''],
        'rangeEval' => ['except' => ''],
        'range' => ['except' => ''],
        'actStat' => ['except' => ''],
        'statEval' => ['except' => ''],
        'actType' => ['except' => ''],
        'actSuit' => ['except' => ''],
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
        if ($this->dfSuit) {
            $this->results = $this->results->where('defense_suit', 'LIKE', "%{$this->dfSuit}%");
        }
        if ($this->wp) {
            $eval = $this->evalCheck($this->wpEval);
            $this->results = $this->results->where("willpower", "{$eval}", "{$this->wp}");
        }
        if ($this->wpSuit) {
            $this->results = $this->results->where('willpower_suit', 'LIKE', "%{$this->wpSuit}%");
        }
        if ($this->mv) {
            $eval = $this->evalCheck($this->mvEval);
            $this->results = $this->results->where("move", "{$eval}", "{$this->mv}");
        }
        if ($this->base) {
            $eval = $this->evalCheck($this->baseEval);
            $this->results = $this->results->where("base", "{$eval}", "{$this->base}");
        }
        if ($this->ability || $this->abiName) {
            if ($this->ability && $this->abiName) {
                $this->results = $this->results->hasAbility($this->ability);
                $this->reset('abiName');
            } elseif ($this->ability) {
                $this->results = $this->results->hasAbility($this->ability);
            } elseif ($this->abiName) {
                $this->results = $this->results->hasAbility($this->abiName);
            }
        }
        if ($this->action || $this->actName) {
            if ($this->action && $this->actName) {
                $this->results = $this->results->hasAction($this->action);
                $this->reset('actName');
            } elseif ($this->action) {
                $this->results = $this->results->hasAction($this->action);
            } elseif ($this->actName) {
                $this->results = $this->results->hasAction($this->actName);
            }
        }
        if ($this->abiText) {
            $this->results = $this->results->hasAbilityText($this->abiText);
        }

        if (($this->minDmg) || ($this->modDmg) || ($this->sevDmg) || ($this->range) || ($this->actText) || ($this->actStat) || ($this->actType) || ($this->actSuit)) {
            $this->actionResults = new Action;
            if ($this->actText) {
                $this->actionResults = $this->actionResults->where('description', 'LIKE', "%{$this->actText}%");
            }
            if ($this->actType) {
                $this->actionResults = $this->actionResults->where('type', 'LIKE', "%{$this->actType}%");
            }
            if ($this->actStat) {
                $eval = $this->evalCheck($this->statEval);
                $this->actionResults = $this->actionResults->where('stat', "{$eval}", $this->actStat)->where('stat', '!=', 99);
            }
            if ($this->actSuit) {
                $this->actionResults = $this->actionResults->where('stat_suits', 'LIKE', "%{$this->actSuit}%");
            }
            if ($this->minDmg) {
                $eval = $this->evalCheck($this->minEval);
                $this->actionResults = $this->actionResults->where('min_damage', "{$eval}", $this->minDmg);
            }
            if ($this->modDmg) {
                $eval = $this->evalCheck($this->modEval);
                $this->actionResults = $this->actionResults->where('mod_damage', "{$eval}", $this->modDmg);
            }
            if ($this->sevDmg) {
                $eval = $this->evalCheck($this->sevEval);
                $this->actionResults = $this->actionResults->where('severe_damage', "{$eval}", $this->sevDmg);
            }
            if ($this->range) {
                $eval = $this->evalCheck($this->rangeEval);
                $this->actionResults = $this->actionResults->where('range', "{$eval}", $this->range)->where('range', '!=', 37);
            }
            $this->actionResults = $this->actionResults->pluck('id')->toArray();
            $this->actionDisplay = Action::whereIn('id', $this->actionResults)->orderBy('name')->get()->unique('name');
            $this->results = $this->results->whereHas('actions', function ($q) {
                $q->whereIn('id', $this->actionResults);
            });
        }

        if ($this->faction) {
            $this->results = $this->results->inFaction($this->faction);
        }
        if ($this->keyword) {
            $this->results = $this->results->inKeyword($this->keyword);
        }
        if ($this->station) {
            $this->results = $this->results->hasStation($this->station);
        }
        if ($this->characteristic) {
            $this->results = $this->results->filterCharacteristic($this->characteristic);
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
        $this->formStations = Station::orderBy('id', 'ASC')->get();
        $this->formCharacteristics = Characteristic::orderBy('name', 'ASC')->get();
        $this->formKeywords = Keyword::orderBy('name', 'ASC')->get();
        $tempAbilities = Ability::orderBy('name')->get();
        foreach ($tempAbilities as $newAbility) {
            $newAbility->name = preg_replace('# \((.*?)\)#', "", $newAbility->name);
            $newAbility->name = str_replace("Df ", "", $newAbility->name);
            $newAbility->name = str_replace("Df/Mv ", "", $newAbility->name);
            $newAbility->name = str_replace("Df/Wp ", "", $newAbility->name);
        }
        $this->formAbilities = $tempAbilities->sortBy('name')->unique('name');
        $this->formActions = Action::orderBy('name')->get()->unique('name');
        return view('livewire.advanced-page')
            ->extends('main')
            ->section('content');
    }
}
