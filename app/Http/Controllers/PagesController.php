<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faction;
use App\Models\Mini;
use App\Models\ResourceType;
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

    public function getHome()
    {
        return view('pages.home');
    }
}
