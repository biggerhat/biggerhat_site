<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\Keyword;
use App\Models\Marker;
use App\Models\Mini;
use App\Models\Question;
use App\Models\Terrain;
use App\Models\Upgrade;
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

    public function fetchUpgrade(Request $request)
    {
        $name = $request->get("name");
        $upgrades = Upgrade::where('name', 'LIKE', "%{$name}%")->orderBy('name', 'ASC')->get();
        return $upgrades;
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
            $summoners = Mini::whereHas("summmoner")->orderBy("name")->get();
            return $summoners;
        }
        $summoner  = Mini::whereHas("summoner")->where('name', 'LIKE', "%{$name}%")->with("summoner")->get();
        return $summoner;
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
