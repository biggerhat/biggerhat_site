<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Instruction;
use App\Models\Mini;

class InstructionPage extends Component
{
    public $mini;
    public $instruction;
    public $textColor;

    public function mount(Instruction $instruction, Mini $mini)
    {
        $this->mini = $mini->load('factions');
        $this->instruction = $instruction->load('minis')->load('minis.factions');
        $this->setTextColor();
    }

    public function setTextColor()
    {
        if (count($this->mini->factions) > 1) {
            $this->textColor = "text-transparent bg-clip-text bg-gradient-to-br from-{ $this->mini->factions[0]['bg_color'] } to-{ $this->mini->factions[1]['bg_color'] }";
        } else {
            $this->textColor = "text-" . $this->mini->factions[0]['bg_color'];
        }
    }

    public function render()
    {
        return view('livewire.instruction-page')
            ->extends('main')
            ->section('content');
    }
}
