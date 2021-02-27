<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faction;
use App\Models\ResourceType;

class PagesController extends Controller
{
    public function getCharacters()
    {
        $factions = Faction::where('hidden', true)
            ->orderBy('name', 'ASC')
            ->get();

        return view('pages.characters', compact('factions'));
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
