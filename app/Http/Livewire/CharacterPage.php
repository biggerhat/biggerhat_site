<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mini;

class CharacterPage extends Component
{
    public $mini;

    public function mount($id)
    {
        $this->mini = Mini::find($id);
    }

    public function render()
    {
        return view('livewire.character-page')
            ->extends('main')
            ->section('content');
    }
}
