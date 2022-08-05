<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PromosPage extends Component
{
    public function render()
    {
        return view('livewire.promos-page')
            ->extends('main')
            ->section('content');
    }
}
