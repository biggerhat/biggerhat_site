<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Keyword;
use App\Models\Mini;

class KeywordPage extends Component
{
    public $keyword;
    public $keywordId;
    public $minis;

    public function mount(Keyword $keyword)
    {
        $this->keyword = $keyword;
        $this->keyword->load('episodes');
        $this->keywordId = $this->keyword->id;
        $this->minis = Mini::inKeyword($this->keywordId)
            ->orderBy('name')
            ->orderBy('station_id')
            ->get();
        $masters = $this->minis->filter(function ($item) {
            return $item['station_id'] === 1;
        });
        if (count($masters) > 0) {
            redirect(route('master.view', $masters->first()->slug));
        }
    }

    public function render()
    {
        return view('livewire.keyword-page')
            ->extends('main')
            ->section('content');
    }
}
