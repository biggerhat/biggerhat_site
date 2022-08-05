<?php

namespace App\Http\Livewire;

use App\Models\LoreEntry;
use Illuminate\Support\Collection;
use Livewire\Component;

class LoreEntryPage extends Component
{
    public LoreEntry $loreEntry;

    public Collection $relatedEntries;

    public function mount(LoreEntry $loreEntry) {
        $this->loreEntry = $loreEntry->loadMissing("loreSources", "loreTopics", "minis");
        $topicIDs = $this->loreEntry->loreTopics->pluck("id")->toArray();
        $this->relatedEntries = LoreEntry::where("id", "!=", $this->loreEntry->id)
            ->whereHas("loreTopics", function ($query) use ($topicIDs) {
                $query->whereIn("id", $topicIDs);
            })->orderBy("title", "ASC")->get();
    }

    public function render() {
        return view('livewire.lore-entry-page')
            ->extends('main')
            ->section('content');
    }
}
