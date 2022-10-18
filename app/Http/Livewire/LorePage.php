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

    public int $selectTab;

    public array $selections = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",];

    public array $sortedTopics;

    protected $listeners = ["topicTypeChange" => "selectChangeTab"];

    public function mount() {
        $this->loreTopicTypes = LoreTopicType::orderBy("name", "ASC")->with("loreTopics")->get();
        $this->changeTab($this->loreTopicTypes->first()->id);
        $this->entryList = collect([]);
    }

    public function selectChangeTab() {
        $this->changeTab($this->activeTab);
    }

    public function getEntryList(LoreTopic $topic) {
        if ($entry = LoreEntry::where("title", $topic->name)->first()) {
            return redirect()->route("lore.entry", $entry->slug);
        }

        dd($topic);
    }

    public function changeTab(int $newTab) {
        $this->activeTab = $newTab;
        $this->loreTopics = LoreTopic::where("lore_topic_type_id", $newTab)->get();
        $this->sortedTopics = [];
    }

    private function sortTopics(Collection $topics) {
        foreach ($this->selections as $selection) {
            foreach ($topics as $topic) {
                if ($topic->name[0] == $selection) {
                    $this->sortedTopics[$selection][] = $topic;
                }
            }
        }
    }

    public function closeEntryModal() {
        $this->entryModal = false;
    }

    public function render() {
        $this->sortedTopics = [];
        $this->sortTopics($this->loreTopics);
        return view('livewire.lore-page')
            ->extends('main')
            ->section('content');
    }
}
