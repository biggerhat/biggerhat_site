<?php

use Illuminate\Support\Facades\Route;

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
    $mini = App\Models\Mini::find(512);
    return view('main',compact('mini'));
});

Route::get('/{id}', function($id) {
    $mini = App\Models\Mini::find($id);
    return view('character',compact('mini'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



//Voyager Routes for Admin Panel
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
