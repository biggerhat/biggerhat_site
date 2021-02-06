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
    public $topAbilities = [];
    public $abilityFilter = ['','Hard to Wound','Armor +1','Hard to Kill','Unimpeded','Insignificant','Armor +2','Ruthless','Flight','Manipulative','Incorporeal','Terrifying (11)','Flurry','Disguised','Stealth','Don\'t Mind Me','Accomplice','Regeneration +1','Gunfighter','Eat Your Fill','Frenzied Charge','Agile','Evasive','Serene Countenance','Deadly Pursuit','Arcane Shield +1','Terrifying (12)','Rush','From the Shadows','Run and Gun','Counterspell','Extended Reach','Arcane Reservoir','Laugh Off','Nimble','Charge Through','Assassin','Tools for the Job','Butterfly Jump','Chatty','Companion','Rapid Fire'];
    public $superTopAbilities = [];
    public $averageMeleeStat;
    public $averageMeleeRange;
    public $averageGunStat;
    public $averageGunRange;
    public $currentCard;

    public function mount($id)
    {
        $this->master = Mini::find($id);
        if($this->master->station_id != 1)
        {
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
        $this->currentCard = rand(0,count($this->master->cards)-1);
    }

    public function getTopAbilities()
    {   
        foreach($this->minis as $mini)
        {
            foreach($mini->abilities as $ability)
            {
                if(array_key_exists($ability['name'], $this->topAbilities))
                {
                    $this->topAbilities[$ability['name']] += 1;
                }
                else
                {
                    $this->topAbilities += [$ability['name'] => 1]; 
                }
            }
            arsort($this->topAbilities);
        }
        
        $x = 0;
        foreach($this->topAbilities as $name => $count)
        {
            if(array_search($name,$this->abilityFilter) == false)
            {
                unset($this->topAbilities[$name]);
            }
            else
            {
                $this->superTopAbilities[$x]['name'] = $name;
                $this->superTopAbilities[$x]['count'] = $count;
                $tempAbility = Ability::where('name',$name)->first();
                $this->superTopAbilities[$x]['description'] = $tempAbility->description;
                $x++;
                
                
            }
        }        
        $this->topAbilities = array_slice($this->superTopAbilities,0,5);
    }

    public function getStats()
    {
        $this->uniqueCharacters = count($this->minis);
        $totalDf = 0;
        $totalWp = 0;
        $totalMv = 0;
        $totalWd = 0;
        $totalCost = 0;
        foreach($this->minis as $mini)
        {
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

        foreach($this->minis as $mini)
        {
            foreach($mini->actions as $action)
            {
                if(($action->range_type == "{{melee}}") && ($action->type != "tactical"))
                {
                    $meleeTotal++;
                    $meleeRangeTotal += $action->range;
                    $meleeStatTotal += $action->stat;
                }
                else if(($action->range_type == "{{gun}}") && ($action->type != "tactical"))
                {
                    $gunTotal++;
                    $gunRangeTotal += $action->range;
                    $gunStatTotal += $action->stat;
                }
            }
        }
        $this->averageMeleeStat = floor($meleeStatTotal / $meleeTotal);
        $this->averageMeleeRange = floor($meleeRangeTotal / $meleeTotal);
        $this->averageGunStat = floor($gunStatTotal / $gunTotal);
        $this->averageGunRange = floor($gunRangeTotal / $gunTotal);
    }

    public function setBackground()
    {
        if(count($this->master->factions) > 1)
        {
            $this->background = "bg-gradient-to-br from-" . $this->master->factions[0]['bg_color'] . " to-" . $this->master->factions[1]['bg_color'];
        }
        else
        {
            $this->background = "bg-". $this->master->factions[0]['bg_color'];
        }
    }

    public function getKeywords()
    {
        $keywordIds = [];

        foreach($this->master->keywords as $keyword)
        {
            array_push($keywordIds,$keyword->id);
        }
        if($this->master->hiddenKeyword)
        {
            array_push($keywordIds,$this->master->hiddenKeyword->id);
        }

        $query = Mini::whereHas('keywords', function($query) use ($keywordIds) {
            for($i = 0;$i < count($keywordIds); $i++)
            {
                if($i == 0)
                {
                    $query->where('keyword_id','=',$keywordIds[$i]);
                } else {
                    $query->orWhere('keyword_id','=',$keywordIds[$i]);
                }
            }
        });
        for($i = 0;$i < count($keywordIds); $i++)
        {
            $query->orWhere('hidden_keyword_id','=',$keywordIds[0]);
        }

        $this->minis = $query->orderBy('station_id','ASC')->orderBy('name','ASC')->get();
    }
}
