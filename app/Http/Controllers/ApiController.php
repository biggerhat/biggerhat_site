<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use App\Models\Marker;
use App\Models\Mini;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function findMinis(Request $request)
    {
        $name = $request->get("name");
        $minis = Mini::where('name', 'LIKE', "%{$name}%")->with('factions', 'cards', 'keywords', 'station', 'characteristics')->orderBy('name', 'ASC')->get();
        return $minis;
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
}