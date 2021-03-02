<?php

namespace App\Http\Livewire;

use Livewire\Component;

class KeywordPage extends Component
{
    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.keyword-page')
            ->extends('main')
            ->section('content');
    }
}
