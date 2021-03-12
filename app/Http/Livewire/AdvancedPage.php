<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdvancedPage extends Component
{
    protected $queryString = [];




    public function render()
    {
        return view('livewire.advanced-page')
            ->extends('main')
            ->section('content');
    }
}
