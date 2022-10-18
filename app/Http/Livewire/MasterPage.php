<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Faction;
use App\Models\Mini;
use App\Models\Keyword;
use App\Models\Ability;

class MasterPage extends Component
{

    public $master;
    public $background;
    public $minis;
    public $uniqueCharacters;
    public $totalCharacters = 0;
    public $averageDf;
    public $averageWp;
    public $averageMv;
    public $averageWounds;
    public $averageCost;
    public $masters;
    public $henchmen;
    public $enforcers;
    public $minions;
    public $superTopAbilities = [];
    public $averageMeleeStat;
    public $averageMeleeRange;
    public $averageGunStat;
    public $averageGunRange;
    public $currentCard;

    public function mount(Mini $mini)
    {
        $this->master = $mini;
        if ($this->master->station_id != 1) {
            abort(404);
        }
        $this->setBackground();
        $this->getKeywords();
        $this->getTopAbilities();
        $this->getStats();
        $this->getAttackStats();
        $this->setCurrentCard();
    }

    public function render()
    {
        return view('livewire.master-page')
            ->extends('main')
            ->section('content');
    }

    public function setCurrentCard()
    {
        $this->currentCard = rand(0, count($this->master->cards) - 1);
    }


    public function getTopAbilities()
    {
        $allAbilities = collect([]);

        foreach ($this->minis as $mini) {
            foreach ($mini->abilities as $ability) {
                $allAbilities->push($ability);
            }
        }

        $abilityByKey = $allAbilities->keyBy("name");
        $sorted = $allAbilities->countBy("name")->sortDesc()->slice(0, 5);
        foreach ($sorted as $key => $count) {
            $ability = $abilityByKey->get($key);
            $this->superTopAbilities[] = [
                "name" => $ability->name,
                "count" => $count,
                "description" => $ability->description
            ];
        }
    }

    public function getStats()
    {
        $this->uniqueCharacters = count($this->minis);
        $totalDf = 0;
        $totalWp = 0;
        $totalMv = 0;
        $totalWd = 0;
        $totalCost = 0;
        foreach ($this->minis as $mini) {
            $this->totalCharacters = $this->totalCharacters + $mini->quantity;
            $totalDf = $totalDf + $mini->defense;
            $totalWp = $totalWp + $mini->willpower;
            $totalMv = $totalMv + $mini->move;
            $totalCost = $totalCost + $mini->cost;
            $totalWd = $totalWd + $mini->wounds;
        }

        $this->averageDf = floor($totalDf / $this->uniqueCharacters);
        $this->averageWp = floor($totalWp / $this->uniqueCharacters);
        $this->averageMv = floor($totalMv / $this->uniqueCharacters);
        $this->averageWounds = floor($totalWd / $this->uniqueCharacters);
        $this->averageCost = floor($totalCost / $this->uniqueCharacters);
    }

    public function getAttackStats()
    {
        $meleeTotal = 0;
        $meleeRangeTotal = 0;
        $meleeStatTotal = 0;
        $gunTotal = 0;
        $gunRangeTotal = 0;
        $gunStatTotal = 0;

        foreach ($this->minis as $mini) {
            foreach ($mini->actions as $action) {
                if (($action->range_type == "{{melee}}") && ($action->type != "tactical")) {
                    $meleeTotal++;
                    $meleeRangeTotal += $action->range;
                    $meleeStatTotal += $action->stat;
                } else if (($action->range_type == "{{gun}}") && ($action->type != "tactical")) {
                    $gunTotal++;
                    $gunRangeTotal += $action->range;
                    $gunStatTotal += $action->stat;
                }
            }
        }
        $this->averageMeleeStat = 0;
        $this->averageMeleeRange = 0;
        $this->averageGunStat = 0;
        $this->averageGunRange = 0;
        if ($meleeTotal > 0) {
            $this->averageMeleeStat = floor($meleeStatTotal / $meleeTotal);
            $this->averageMeleeRange = floor($meleeRangeTotal / $meleeTotal);
        }
        if ($gunTotal > 0) {
            $this->averageGunStat = floor($gunStatTotal / $gunTotal);
            $this->averageGunRange = floor($gunRangeTotal / $gunTotal);
        }
    }

    public function setBackground()
    {
        if (count($this->master->factions) > 1) {
            $this->background = "bg-gradient-to-br from-" . $this->master->factions[0]['bg_color'] . " to-" . $this->master->factions[1]['bg_color'];
        } else {
            $this->background = "bg-" . $this->master->factions[0]['bg_color'];
        }
    }

    public function getKeywords()
    {
        $keywordIds = [];

        foreach ($this->master->keywords as $keyword) {
            array_push($keywordIds, $keyword->id);
        }
        if ($this->master->hiddenKeyword) {
            array_push($keywordIds, $this->master->hiddenKeyword->id);
        }

        $query = Mini::whereHas('keywords', function ($query) use ($keywordIds) {
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

        $this->minis = $query->orderBy('station_id', 'ASC')->orderBy('name', 'ASC')->get();

        $query = Mini::where('station_id', 2)->isAlive()->whereHas('keywords', function ($query) use ($keywordIds) {
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

        $this->henchmen = $query->orderBy('name', 'ASC')->get();

        $query = Mini::where('station_id', 3)->whereHas('keywords', function ($query) use ($keywordIds) {
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

        $this->enforcers = $query->orderBy('name', 'ASC')->get();

        $query = Mini::where('station_id', 4)->whereHas('keywords', function ($query) use ($keywordIds) {
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

        $this->minions = $query->orderBy('name', 'ASC')->get();
    }
}
