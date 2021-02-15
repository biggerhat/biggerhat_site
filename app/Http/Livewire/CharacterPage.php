<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mini;
use App\Models\Keyword;
use App\Models\Faction;
use App\Models\Station;
use App\Models\Upgrade;
use App\Models\Marker;

class CharacterPage extends Component
{
    public $mini;
    public $background;
    public $areQuestions = false;
    public $questions = [];
    public $areTokens = false;
    public $tokens = [];
    public $relateds;
    public $upgradeModal = false;
    public $upgradeContent;
    public $markerModal = false;
    public $markerName;
    public $markerContent;
    public $markerSize;
    public $markerIcon;
    public $cards = [];
    public $cardCount;
    public $currentCard = 0;

    protected $listeners = [
        'openUpgradeModal',
        'closeUpgradeModal',
        'openMarkerModal',
        'closeMarkerModal',
    ];

    public function mount(Mini $mini)
    {
        $this->mini = $mini;
        $this->mini->load(
            'factions',
            'keywords',
            'characteristics',
            'abilities',
            'station',
            'actions',
            'upgrades',
            'cards',
            'erratas',
            'markers',
            'questions',
            'tokens',
            'promos',
            'instructions',
            'boxes',
            'episodes'
        );
        $this->setBackground();
        $this->setQuestions();
        $this->setTokens();
        $this->setRelateds();
        $this->setCards();
    }

    public function setCards()
    {
        $this->cardCount = count($this->mini->cards);
        for ($i = 0; $i < $this->cardCount; $i++) {
            if ($this->cardCount == 1) {
                $this->cards[$i]['name'] = $this->mini->name;
            } else {
                $this->cards[$i]['name'] = $this->mini->name . " " . ($i + 1);
            }
            $this->cards[$i]['front'] = $this->mini->cards[$i]->front;
            $this->cards[$i]['back'] = $this->mini->cards[$i]->back;
            $this->cards[$i]['pdf'] = $this->mini->cards[$i]->pdf;
            $this->cards[$i]['type'] = "normal";
        }
        $this->currentCard = array_rand($this->cards);
        foreach ($this->mini->promos as $promo) {
            $this->cards[$i]['name'] = $promo->name;
            $this->cards[$i]['front'] = $promo->front;
            $this->cards[$i]['back'] = $promo->back;
            $this->cards[$i]['pdf'] = $promo->pdf;
            $this->cards[$i]['type'] = "promo";
            $i++;
        }
    }

    public function setNewCard($newCard)
    {
        $this->currentCard = $newCard;
    }

    public function render()
    {
        return view('livewire.character-page')
            ->extends('main')
            ->section('content');
    }

    public function openUpgradeModal($upgradeId)
    {
        $upgrade = Upgrade::find($upgradeId);
        $this->upgradeContent = $upgrade->image;
        $this->upgradeModal = true;
    }

    public function closeUpgradeModal()
    {
        $this->upgradeModal = false;
        $this->upgradeContent = "";
    }

    public function openMarkerModal($markerId)
    {
        $marker = Marker::find($markerId);
        $this->markerName = $marker->name;
        $this->markerIcon = $marker->icon;
        $this->markerSize = $marker->size;
        $this->markerContent = $marker->description;
        $this->markerModal = true;
    }

    public function closeMarkerModal()
    {
        $this->markerModal = false;
        $this->markerName = "";
        $this->markerContent = "";
    }

    public function setBackground()
    {
        if (count($this->mini->factions) > 1) {
            $this->background = "bg-gradient-to-r from-" . $this->mini->factions[0]['bg_color'] . " to-" . $this->mini->factions[1]['bg_color'];
        } else {
            $this->background = "bg-" . $this->mini->factions[0]['bg_color'];
        }
    }

    public function setQuestions()
    {
        if (count($this->mini->questions) > 0) {
            $this->areQuestions = true;
            foreach ($this->mini->questions as $newQuestion) {
                array_push($this->questions, $newQuestion);
            }
        } else {
            foreach ($this->mini->abilities as $ability) {
                if (count($ability->questions) > 0) {
                    $this->areQuestions = true;
                    foreach ($ability->questions as $newQuestion) {
                        array_push($this->questions, $newQuestion);
                    }
                }
            }
            foreach ($this->mini->actions as $action) {
                if (count($action->questions) > 0) {
                    $this->areQuestions = true;
                    foreach ($action->questions as $newQuestion) {
                        array_push($this->questions, $newQuestion);
                    }
                }
            }
        }
    }

    public function setTokens()
    {
        if (count($this->mini->markers) > 0) {
            $this->areTokens = true;
            foreach ($this->mini->markers as $newMarker) {
                array_push($this->tokens, $newMarker);
            }
        } else if (count($this->mini->tokens) > 0) {
            $this->areTokens = true;
            foreach ($this->mini->tokens as $newToken) {
                array_push($this->tokens, $newToken);
            }
        }
    }

    public function setRelateds()
    {
        $keywordIds = [];
        $factionIds = [];

        foreach ($this->mini->keywords as $keyword) {
            array_push($keywordIds, $keyword->id);
        }
        if ($this->mini->hiddenKeyword) {
            array_push($keywordIds, $this->mini->hiddenKeyword->id);
        }
        foreach ($this->mini->factions as $faction) {
            array_push($factionIds, $faction->id);
        }

        if (count($keywordIds) == 0) {
            $query = Mini::where('id', '!=', $this->mini->id)->whereHas('factions', function ($query) use ($factionIds) {
                for ($i = 0; $i < count($factionIds); $i++) {
                    if ($i == 0) {
                        $query->where('faction_id', '=', $factionIds[$i]);
                    } else {
                        $query->orWhere('faction_id', '=', $factionIds[$i]);
                    }
                }
            });

            $query->whereHas('characteristics', function ($query) {
                $query->where('characteristic_id', '=', 5);
            });
        } else {
            $query = Mini::where('id', '!=', $this->mini->id)->whereHas('keywords', function ($query) use ($keywordIds) {
                for ($i = 0; $i < count($keywordIds); $i++) {
                    if ($i == 0) {
                        $query->where('keyword_id', '=', $keywordIds[$i]);
                    } else {
                        $query->orWhere('keyword_id', '=', $keywordIds[$i]);
                    }
                }
            });

            for ($i = 0; $i < count($keywordIds); $i++) {
                $query->orWhere('hidden_keyword_id', '=', $keywordIds[0]);
            }
        }

        $this->relateds = $query->orderBy('station_id', 'ASC')->orderBy('name', 'ASC')->get();
    }
}
