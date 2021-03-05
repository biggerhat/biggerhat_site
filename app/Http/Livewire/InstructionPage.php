<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Instruction;
use App\Models\Mini;

class InstructionPage extends Component
{
    public $mini;
    public $instruction;

    public function mount(Instruction $instruction, Mini $mini)
    {
        $this->mini = $mini->load('factions');
        $this->instruction = $instruction->load('minis')->load('minis.factions');
    }

    public function render()
    {
        return view('livewire.instruction-page')
            ->extends('main')
            ->section('content');
    }
}
