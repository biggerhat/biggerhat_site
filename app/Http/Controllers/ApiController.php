<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\Keyword;
use App\Models\Marker;
use App\Models\Mini;
use App\Models\Terrain;
use App\Models\Upgrade;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function findMinis(Request $request)
    {
        $name = $request->get("name");
        $minis = Mini::where('name', 'LIKE', "%{$name}%")->with('cards')->orderBy('name', 'ASC')->get();
        return $minis;
    }

    public function fetchUpgrade(Request $request)
    {
        $name = $request->get("name");
        $upgrades = Upgrade::where('name', 'LIKE', "%{$name}%")->orderBy('name', 'ASC')->get();
        return $upgrades;
    }

    public function fetchKeyword(Request $request)
    {
        $name = $request->get("name");
        $keyword = Keyword::where('name', 'LIKE', "%{$name}%")->first();
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
}
