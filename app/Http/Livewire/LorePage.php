<?php

namespace App\Http\Livewire;

use App\Models\LoreEntry;
use App\Models\LoreTopic;
use App\Models\LoreTopicType;
use Illuminate\Support\Collection;
use Livewire\Component;

class LorePage extends Component
{
    public Collection $loreTopicTypes;

    public Collection $loreTopics;

    public int $activeTab;

    public array $selections = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",];

    public array $sortedTopics;

    public function mount() {
        $this->loreTopicTypes = LoreTopicType::orderBy("name", "ASC")->with("loreTopics")->get();
        $this->changeTab($this->loreTopicTypes->first()->id);
    }

    public function changeTab(int $newTab) {
        $this->activeTab = $newTab;
        $this->loreTopics = LoreTopic::where("lore_topic_type_id", $newTab)->get();
        $this->loreTopics = LoreEntry::whereHas("loreTopics", function ($query) use ($newTab) {
            $query->whereHas("loreTopicType", function ($query2) use ($newTab) {
               $query2->where("id", $newTab);
            });
        })->get();
        $this->sortedTopics = [];
    }

    private function sortTopics(Collection $topics) {
        foreach ($this->selections as $selection) {
            foreach ($topics as $topic) {
                if ($topic->title[0] == $selection) {
                    $this->sortedTopics[$selection][] = $topic;
                }
            }
        }
    }

    public function render()
    {
        $this->sortTopics($this->loreTopics);
        return view('livewire.lore-page')
            ->extends('main')
            ->section('content');
    }
}
