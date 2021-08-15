<?php

namespace App\Http\Controllers;

use App\Models\Mini;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function findMinis(Request $request)
    {
        $name = $request->get("name");
        $minis = Mini::where('name', 'LIKE', "%{$name}%")->with('factions', 'cards')->get();
        return $minis;
    }
}
