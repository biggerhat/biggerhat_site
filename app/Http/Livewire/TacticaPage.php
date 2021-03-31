<?php

namespace App\Http\Livewire;

use App\Models\Tactica;
use Livewire\Component;

class TacticaPage extends Component
{
    public $query;
    public $results;

    protected $queryString = [
        'query' => ['except' => ''],
    ];

    public function clearQuery()
    {
        $this->reset();
    }

    public function search()
    {
        if ($this->query) {
            $query = $this->query;
            $this->results = Tactica::where('name', 'LIKE', "%{$query}%")
                ->orWhereHas('keyword', function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%");
                })
                ->orWhereHas('faction', function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%");
                })
                ->orWhereHas('mini', function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%");
                })
                ->orWhereHas('upgrade', function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%");
                })
                ->orWhereHas('scheme', function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%");
                })
                ->orWhereHas('strategy', function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%");
                })
                ->get();
        } else {
            $this->results = Tactica::latest()->limit(5)->get();
        }
    }

    public function render()
    {
        $this->search();
        return view('livewire.tactica-page')
            ->extends('main')
            ->section('content');
    }
}
