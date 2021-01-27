<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Faction;

class FactionPage extends Component
{
    public $faction;
    public $factions;

    public function mount($id)
    {
        $this->factions = Faction::where('hidden','1')->get();
        $this->faction = Faction::with('minis')->find($id);
    }


    public function render()
    {
        return view('livewire.faction-page')
            ->extends('main')
            ->section('content');;
    }
}
