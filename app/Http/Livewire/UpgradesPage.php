<?php

namespace App\Http\Livewire;

use App\Models\Faction;
use App\Models\Upgrade;
use App\Models\Urestricted;
use App\Models\Uspecial;
use Livewire\Component;

class UpgradesPage extends Component
{
    public $upgrades;
    public $formRestricteds;
    public $restricted;
    public $special;
    public $formSpecials;
    public $faction;
    public $formFactions;

    protected $queryString = [
        'restricted' => ['except' => ''],
        'special' => ['except' => ''],
        'faction' => ['except' => ''],
    ];

    public function clearFilters()
    {
        $this->reset();
    }

    public function filter()
    {
        $this->upgrades = new Upgrade;
        if ($this->restricted) {
            $name = $this->restricted;
            $this->upgrades = $this->upgrades->whereHas('urestricteds', function ($q) use ($name) {
                $q->where('name', '=', "{$name}");
            });
        }
        if ($this->special) {
            $name = $this->special;
            $this->upgrades = $this->upgrades->whereHas('uspecials', function ($q) use ($name) {
                $q->where('name', '=', "{$name}");
            });
        }
        if ($this->faction) {
            $slug = $this->faction;
            $this->upgrades = $this->upgrades->whereHas('factions', function ($q) use ($slug) {
                $q->where('slug', '=', "{$slug}");
            });
        }
        $this->upgrades = $this->upgrades->orderBy('name')->get();
    }


    public function render()
    {
        $this->filter();
        $this->formFactions = Faction::where('id', '!=', 8)->orderBy('name', 'ASC')->get();
        $this->formSpecials = Uspecial::orderBy('name', 'ASC')->get();
        $this->formRestricteds = Urestricted::orderBy('name', 'ASC')->get();
        return view('livewire.upgrades-page')
            ->extends('main')
            ->section('content');
    }
}
