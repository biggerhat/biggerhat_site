<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Resource;
use App\Models\Episode;
use App\Models\ResourceType;

class ResourcePage extends Component
{
    public $resource;
    public $type;
    public $episodes;
    public $types;
    protected $queryString = ['type' => ['except' => '']];

    public function mount(Resource $resource)
    {
        $this->filterCheck();
        $this->resource = $resource;
        $this->types = $this->resource->types()->get();
    }

    public function filterCheck()
    {
        $query = Episode::where('resource_id', $this->resource->id);
        if ($this->type) {
            $resourceType = ResourceType::where('slug', $this->type)->first();
            $query->where('resource_type_id', $resourceType->id);
        }
        $this->episodes = $query->orderBy('name')->with('factions', 'keywords', 'minis')->get();
    }

    public function clearFilters()
    {
        $this->type = "";
        $this->filterCheck();
    }

    public function render()
    {
        return view('livewire.resource-page')
            ->extends('main')
            ->section('content');
    }
}
