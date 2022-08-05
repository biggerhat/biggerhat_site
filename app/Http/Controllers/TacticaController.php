<?php

namespace App\Http\Controllers;

use App\Models\Tactica;
use Illuminate\Http\Request;

class TacticaController extends Controller
{
    public function getTactica(Tactica $tactica)
    {
        return view('pages.tactica', compact('tactica'));
    }
}
