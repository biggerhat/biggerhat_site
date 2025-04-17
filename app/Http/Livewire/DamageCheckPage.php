<?php

namespace App\Http\Livewire;

use App\Models\Action;
use Livewire\Component;

class DamageCheckPage extends Component
{
    public $totalActions;
    public $calculatedActions;
    public $calculatedPercent;
    public $minDmg;
    public $modDmg;
    public $sevDmg;

    public function mount() {}

    public function filter()
    {
        $this->calculatedActions = Action::where('min_damage', $this->minDmg)->where('mod_damage', $this->modDmg)->where('severe_damage', $this->sevDmg)->count();
        $this->calculatedPercent = ($this->calculatedActions / $this->totalActions) * 100;
    }

    public function render()
    {
        $this->totalActions = Action::where('min_damage', '!=', null)->where('mod_damage', '!=', null)->where('severe_damage', '!=', null)->count();

        return view('livewire.damage-check-page')
            ->extends('main')
            ->section('content');
    }
}
