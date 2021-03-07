<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ResourceType;

class ResourceTypePage extends Component
{
    public $resourceType;

    public function mount(ResourceType $resourcetype)
    {
        $this->resourceType = $resourcetype;
        $this->resourceType->load('resources', 'episodes', 'episodes.resource');
    }

    public function render()
    {
        return view('livewire.resource-type-page')
            ->extends('main')
            ->section('content');
    }
}
