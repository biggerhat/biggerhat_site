<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use App\Models\Condition;
use App\Models\Faction;
use App\Models\Keyword;
use App\Models\Marker;
use App\Models\Mini;
use App\Models\Question;
use App\Models\Station;
use App\Models\Terrain;
use App\Models\Upgrade;
use App\Models\Uspecial;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function findMinis(Request $request)
    {
        $name = $request->get("name");
        $mini = Mini::where('name', $name)->with('cards')->get();
        if (count($mini) > 0) {
            return $mini;
        }
        $minis = Mini::where('name', 'LIKE', "%{$name}%")->orWhere('aka', 'LIKE', "%{$name}%")->with('cards')->orderBy('name', 'ASC')->get();
        return $minis;
    }

    public function fetchUpgrade(Request $request) {
        $upgradeResults = [
            "upgrades" => "",
            "specials" => "",
        ];
        $name = $request->get("name");
        $upgrades = Upgrade::where('name', 'LIKE', "%{$name}%")->orderBy('name', 'ASC')->get();

        $upgradeResults["upgrades"] = $upgrades;

        $special = Uspecial::where("name", "LIKE", "%{$name}%")->with("upgrades")->orderBy("name", "ASC")->first();

        if ($special) {
            $upgradeResults["specials"] = $special->upgrades;
        }

        return json_encode($upgradeResults, true);
    }

    public function fetchQuestion(Request $request)
    {
        $query = $request->get("query");
        $questions = Question::where('question', 'LIKE', "%{$query}%")->orWhere('answer', 'LIKE', "%{$query}%")->with('section')->get();
        foreach ($questions as $question) {
            $question->question = $this->stripParse($question->question);
            $question->answer = $this->stripParse($question->answer);
        }
        return $questions;
    }

    public function fetchKeyword(Request $request)
    {
        $name = $request->get("name");
        $keyword = Keyword::where('name', 'LIKE', "%{$name}%")->first();
        if (!$keyword) {
            return "[ ]";
        }

        $minis = Mini::inKeyword($keyword->id)
            ->when($request->get("station"), function ($query) use ($request) {
                $requestedStation = $request->get("station");
                $station = Station::where("name", "LIKE", "%{$requestedStation}%")->first();

                return $query->where("station_id", $station->id);
            })
            ->isAlive()
            ->orderBy('station_id')
            ->orderBy('name')
            ->get();

        return $minis;
    }

    public function fetchMarker(Request $request)
    {
        $name = $request->get("name");
        $marker = Marker::where('name', 'LIKE', "%{$name}%")->get();
        return $marker;
    }

    public function fetchTerrain(Request $request)
    {
        $name = $request->get("name");
        if ($name === "all") {
            $terrain = Terrain::orderBy('name')->get();
            return $terrain;
        }
        $terrain = Terrain::where('name', 'LIKE', "%{$name}%")->get();
        return $terrain;
    }

    public function fetchCondition(Request $request)
    {
        $name = $request->get("name");
        if ($name === "all") {
            $condition = Condition::orderBy('name')->get();
            return $condition;
        }
        $condition = Condition::where('name', 'LIKE', "%{$name}%")->get();
        return $condition;
    }

    public function fetchSummons(Request $request) {
        $name  = $request->get("summoner");
        if($name == "all") {
            $summoners = Mini::whereHas("summoner")->orderBy("name")->get();
            return $summoners;
        }
        $summoner  = Mini::whereHas("summoner")->where('name', 'LIKE', "%{$name}%")->with("summoner")->get();
        return $summoner;
    }

    public function fetchAbilities(Request $request) {
        $name = $request->get("name");
        $abilities = Ability::where("name", "LIKE", "%{$name}%")->get()->pluck("id");

        if (!$abilities) {
            return [];
        }

        $minis = Mini::whereHas("abilities", function ($query) use ($abilities) {
            $query->whereIn("id", $abilities);
        })->when($request->get("faction"), function ($query) use ($request) {
            $requestedFaction = $request->get("faction");
            $faction = Faction::where("name", "LIKE", "%{$requestedFaction}%")->first();

            return $query->whereHas("factions", function ($q) use ($faction) {
                $q->where("id", $faction->id);
            });
        })
            ->isAlive()
            ->orderBy("name")
            ->get();

        return $minis;
    }

    private function stripParse(String $expression): string
    {
        $expression = str_replace(
            array(
                '{{aura}}',
                '{{blast}}',
                '{{crow}}',
                '{{free}}',
                '{{gun}}',
                '{{mask}}',
                '{{melee}}',
                '{{minus}}',
                '{{plus}}',
                '{{pulse}}',
                '{{ram}}',
                '{{tome}}',
                '{{b}}',
                '{{/b}}',
                '{{i}}',
                '{{/i}}',
            ),
            array(
                '**(AURA)**',
                '**(BLAST)**',
                '**(CROW)**',
                '**(FREE)**',
                '**(GUN)**',
                '**(MASK)**',
                '**(MELEE)**',
                '**(MINUS)**',
                '**(PLUS)**',
                '**(PULSE)**',
                '**(RAM)**',
                '**(TOME)**',
                '**',
                '**',
                '*',
                '*',
            ),
            $expression
        );
        return $expression;
    }
}
