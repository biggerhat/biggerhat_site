<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CharacterPage;
use App\Http\Livewire\FactionPage;
use App\Http\Livewire\MasterPage;

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


Route::get('/characters/{id}/{name}', CharacterPage::class);
Route::get('/factions/{id}/{name}', FactionPage::class);
Route::get('/masters/{id}/{name}', MasterPage::class);

Route::get('/user/logout', 'Laravel\Fortify\Http\Controllers\AuthenticatedSessionController@destroy');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



//Voyager Routes for Admin Panel
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
