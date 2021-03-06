<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Box;
use App\Models\Mini;

class BoxPage extends Component
{
    public $box;

    public function mount(Box $box)
    {
        $this->box = $box;
        $this->box->load('minis', 'minis.factions');
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

    public function render()
    {
        return view('livewire.box-page')
            ->extends('main')
            ->section('content');
    }
}
