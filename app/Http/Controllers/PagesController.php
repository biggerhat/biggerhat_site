<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faction;
use App\Models\Keyword;
use App\Models\Mini;
use App\Models\ResourceType;
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
        return view('pages.home');
    }

    public function postSearch(Request $request)
    {
        $search = $request->search;
        $minis = Mini::search("{$search}")->get();
        $factions = Faction::where('name', 'LIKE', "%{$search}%")->get();
        if ($factions->count() == 1) {
            return redirect(route('faction.view', $factions[0]->slug));
        }
        $keywords = Keyword::where('name', 'LIKE', "%{$search}%")->get();
        if ($keywords->count() == 1) {
            return redirect(route('keyword.view', $keywords[0]->slug));
        }
        $upgrades = Upgrade::search("{$search}")->get();
        if ($upgrades->count() == 1) {
            return redirect(route('upgrade.view'), $upgrades[0]->slug);
        }
        if ($minis->count() == 1) {
            return redirect(route('character.view', $minis[0]->slug));
        }
        return view('pages.results', compact('minis', 'upgrades', 'search'));
    }
}
