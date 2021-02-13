<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CharacterPage;
use App\Http\Livewire\FactionPage;
use App\Http\Livewire\MasterPage;
use App\Http\Livewire\ResourcePage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});


Route::get('/boxcheck', function () {
    $minis = App\Models\Mini::with('instructions')->get();
    foreach ($minis as $mini) {
        if (count($mini->instructions) < 1) {
            echo "{$mini->name} <br />";
        }
    }
});

Route::get('/characters/{mini:slug}', CharacterPage::class)->name("character.view");
Route::get('/factions/{faction:slug}', FactionPage::class)->name("faction.view");
Route::get('/masters/{mini:slug}', MasterPage::class)->name("master.view");
Route::get('/resources/{resource:slug}', ResourcePage::class)->name("resource.view");

Route::get('/user/logout', 'Laravel\Fortify\Http\Controllers\AuthenticatedSessionController@destroy');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



//Voyager Routes for Admin Panel
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
