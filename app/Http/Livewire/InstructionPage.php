<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Instruction;
use App\Models\Mini;

class InstructionPage extends Component
{
    public $mini;
    public $instruction;
    public string $background;

    public function mount(Instruction $instruction, Mini $mini)
    {
        $this->mini = $mini;
        $this->mini->load('factions');
        $this->instruction = $instruction->load('minis')->load('minis.factions');
        $this->setBackground();
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

    public function setBackground()
    {
        if ($this->mini->factions->count() > 1) {
            $this->background = "bg-gradient-to-r from-" . $this->mini->factions[0]['bg_color'] . " to-" . $this->mini->factions[1]['bg_color'];
        } else {
            $this->background = "bg-" . $this->mini->factions[0]['bg_color'];
        }
    }

    public function render()
    {
        return view('livewire.instruction-page')
            ->extends('main')
            ->section('content');
    }
}
