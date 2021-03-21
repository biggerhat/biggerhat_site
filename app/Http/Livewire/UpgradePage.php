<?php

namespace App\Http\Livewire;

use App\Models\Mini;
use App\Models\Upgrade;
use Livewire\Component;

class UpgradePage extends Component
{
    public $upgrade;
    public $background;

    public function mount(Upgrade $upgrade)
    {
        $this->upgrade = $upgrade;
        $this->upgrade->load('factions', 'minis', 'erratas');
        $this->setBackground();
    }

    public function setBackground()
    {
        if (count($this->upgrade->factions) > 1) {
            $this->background = "bg-gradient-to-r from-" . $this->upgrade->factions[0]['bg_color'] . " to-" . $this->upgrade->factions[1]['bg_color'];
        } else {
            $this->background = "bg-" . $this->upgrade->factions[0]['bg_color'];
        }
    }

    public function getBackground(Mini $mini): string
    {
        $mini->load('factions');
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
        return view('livewire.upgrade-page')
            ->extends('main')
            ->section('content');
    }
}
