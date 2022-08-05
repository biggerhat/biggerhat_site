<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faction;
use App\Models\Keyword;
use App\Models\Marker;
use App\Models\Mini;
use App\Models\ResourceType;
use App\Models\Spoiler;
use App\Models\Tactica;
use App\Models\Upgrade;
use Illuminate\Support\Facades\Redis;

class PagesController extends Controller
{
    public function getCharacters()
    {
        $factions = Faction::where('hidden', true)
            ->orderBy('name', 'ASC')
            ->get();

        return view('pages.characters', compact('factions'));
    }

    public function getMasters()
    {
        $factions = Faction::where('id', '!=', 8)->with(['minis' => function ($query) {
            $query->isAlive()->isHirable()->hasStation("1")->orderBy('name');
        }])->orderBy('name')->get();

        return view('pages.masters', compact('factions'));
    }

    public function getResources()
    {
        $resources = ResourceType::orderBy('name', 'ASC')->get();

        return view('pages.resources', compact('resources'));
    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function getHome()
    {
        $tacticas = Tactica::latest()->take(5)->get();
        return view('pages.home', compact('tacticas'));
    }

    public function getMarkers()
    {
        $markers = Marker::orderBy('name', 'ASC')->get();
        return view('pages.markers', compact('markers'));
    }

    public function postSearch(Request $request)
    {
        $search = $request->search;
        $minis = Mini::where('name', 'LIKE', "%{$search}%")->get();
        $factions = Faction::where('name', 'LIKE', "%{$search}%")->get();
        if ($factions->count() == 1 && $minis->count() == 0) {
            return redirect(route('faction.view', $factions[0]->slug));
        }
        $keywords = Keyword::where('name', 'LIKE', "%{$search}%")->get();
        if ($keywords->count() == 1 && $minis->count() == 0) {
            return redirect(route('keyword.view', $keywords[0]->slug));
        }
        $upgrades = Upgrade::where('name', 'LIKE', "%{$search}%")->get();
        if ($upgrades->count() == 1 && $minis->count() == 0) {
            return redirect(route('upgrade.view', $upgrades[0]->slug));
        }
        if ($minis->count() == 1 && $upgrades->count() == 0 && $keywords->count() == 0 && $factions->count() == 0) {
            return redirect(route('character.view', $minis[0]->slug));
        }
        return view('pages.results', compact('minis', 'upgrades', 'search'));
    }

    public function getSpoilers()
    {
        $spoilers = Spoiler::orderBy('id', 'DESC')->get();
        return view('pages.spoilers', compact('spoilers'));
    }
}
