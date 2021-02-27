<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Resource;

class ResourcePage extends Component
{
    public $resource;

    public function mount(Resource $resource)
    {
        $this->resource = $resource;
        $this->resource->load('types', 'episodes', 'episodes.factions', 'episodes.keywords', 'episodes.minis');
    }
    public function render()
    {
        return view('livewire.resource-page')
            ->extends('main')
            ->section('content');
    }
}
