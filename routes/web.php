<?php

use App\Http\Livewire\LoreEntryPage;
use App\Http\Livewire\LorePage;
use App\Models\Mini;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CharacterPage;
use App\Http\Livewire\FactionPage;
use App\Http\Livewire\MasterPage;
use App\Http\Livewire\ResourcePage;
use App\Http\Livewire\KeywordPage;
use App\Http\Livewire\ResourceTypePage;
use App\Http\Livewire\InstructionPage;
use App\Http\Livewire\BoxPage;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TacticaController;
use App\Http\Livewire\AdvancedPage;
use App\Http\Livewire\PromoPage;
use App\Http\Livewire\PromosPage;
use App\Http\Livewire\QuestionPage;
use App\Http\Livewire\UpgradePage;
use App\Http\Livewire\UpgradesPage;
use App\Http\Livewire\SchemePage;
use App\Http\Livewire\SummonPage;
use App\Http\Livewire\TacticaPage;



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

Route::get('/', [PagesController::class, 'getHome'])->name('home');
Route::post('/results', [PagesController::class, 'postSearch'])->name('results');
Route::get('/results', function () {
    return redirect(route('home'));
});


Route::get('/resources', [PagesController::class, 'getResources'])->name('resources');
Route::get('/about', [PagesController::class, 'getAbout'])->name('about');
Route::get('/faqs', QuestionPage::class)->name('faqs');
Route::get('/scenarios', SchemePage::class)->name('schemes');
Route::get('/upgrades', [PagesController::class, 'getUpgrades'])->name('upgrades');
Route::get('/characters', [PagesController::class, 'getCharacters'])->name('characters');
Route::get('/keywords', [PagesController::class, 'getKeywords'])->name('keywords');
Route::get('/masters', [PagesController::class, 'getMasters'])->name('masters');
Route::get('/summons', SummonPage::class)->name('summons');
Route::get('/promos', PromosPage::class)->name('promos');
Route::get('/promos/{slug}', PromoPage::class)->name('promo.view');
Route::get('/markers', [PagesController::class, 'getMarkers'])->name('markers');
Route::get('/blueprints/{instruction:id}/{mini:slug}', InstructionPage::class)->name('instruction.view');
Route::get('/boxes/{box:slug}', BoxPage::class)->name("box.view");
Route::get('/tacticas/{tactica:slug}', [TacticaController::class, 'getTactica'])->name('tactica.view');
Route::get('/tacticas', TacticaPage::class)->name('tacticas');
Route::get('/advanced', AdvancedPage::class)->name('advanced');
Route::get('/keywords/{keyword:slug}', KeywordPage::class)->name("keyword.view");
Route::get('/characters/{mini:slug}', CharacterPage::class)->name("character.view");
Route::get('/upgrades', UpgradesPage::class)->name('upgrades');
Route::get('/upgrades/{upgrade:slug}', UpgradePage::class)->name("upgrade.view");
Route::get('/factions/{faction:slug}', FactionPage::class)->name("faction.view");
Route::get('/masters/{mini:slug}', MasterPage::class)->name("master.view");
Route::get('/resources/types/{resourcetype:slug}', ResourceTypePage::class)->name("resourcetype.view");
Route::get('/resources/{resource:slug}', ResourcePage::class)->name("resource.view");
Route::get('/spoilers', [PagesController::class, 'getSpoilers'])->name('spoilers');
Route::get("/lore/entries/{loreEntry:slug}", LoreEntryPage::class)->name("lore.entry");
Route::get("/lore", LorePage::class)->name("lore");


Route::get('/random', function () {
    $minis = App\Models\Mini::all();
    $mini = $minis->random();
    return redirect()->route('character.view', $mini->slug);
})->name('random');

/*
Route::get('/combotest', function () {
    $cards = App\Models\Card::where("combo", "")->limit(500)->get();
    foreach ($cards as $card) {
        comboImage($card);
    }
    echo "Done: " . count($cards);
}); */

Route::get('/user/logout', 'Laravel\Fortify\Http\Controllers\AuthenticatedSessionController@destroy');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



//Voyager Routes for Admin Panel
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::any("/test", function () {
    $response = Http::get("https://firebasestorage.googleapis.com/v0/b/m3e-crew-builder-22534.appspot.com/o/allmodels-beta.json", [
        "alt" => "media",
        "token" => "167f52ae-fefc-409f-8a61-08939afaa1e7"
    ]);
    $json = $response->json();
    $total = 0;
    foreach ($json["units"] as $unit) {
        foreach ($unit["fileNames"]["frontJPGs"] ?? [] as $frontJPG) {
            echo "<img src='https://firebasestorage.googleapis.com/v0/b/m3e-crew-builder-22534.appspot.com/o/" . str_replace("/", "%2F", $frontJPG) . "?alt=media&token=167f52ae-fefc-409f-8a61-08939afaa1e7'>";
        }
        echo "<img src='https://firebasestorage.googleapis.com/v0/b/m3e-crew-builder-22534.appspot.com/o/" . str_replace("/", "%2F", $unit["fileNames"]["backJPG"]) . "?alt=media&token=167f52ae-fefc-409f-8a61-08939afaa1e7'>";
        if (isset($unit["fileNames"]["specialBacks"])) {
            foreach ($unit["fileNames"]["specialBacks"] as $specialBack) {
                echo "<img src='https://firebasestorage.googleapis.com/v0/b/m3e-crew-builder-22534.appspot.com/o/" . str_replace("/", "%2F", $specialBack) . "?alt=media&token=167f52ae-fefc-409f-8a61-08939afaa1e7'>";
            }
        }
        $total++;
        if (isset($unit["alternates"])) {
            foreach ($unit["alternates"] as $alternate) {
                foreach ($alternate["fileNames"]["frontJPGs"] ?? [] as $frontJPG) {
                    echo "<img src='https://firebasestorage.googleapis.com/v0/b/m3e-crew-builder-22534.appspot.com/o/" . str_replace("/", "%2F", $frontJPG) . "?alt=media&token=167f52ae-fefc-409f-8a61-08939afaa1e7'>";
                }
                echo "<img src='https://firebasestorage.googleapis.com/v0/b/m3e-crew-builder-22534.appspot.com/o/" . str_replace("/", "%2F", $alternate["fileNames"]["backJPG"]) . "?alt=media&token=167f52ae-fefc-409f-8a61-08939afaa1e7'>";
                if (isset($alternate["fileNames"]["specialBacks"])) {
                    foreach ($alternate["fileNames"]["specialBacks"] as $specialBack) {
                        echo "<img src='https://firebasestorage.googleapis.com/v0/b/m3e-crew-builder-22534.appspot.com/o/" . str_replace("/", "%2F", $specialBack) . "?alt=media&token=167f52ae-fefc-409f-8a61-08939afaa1e7'>";
                    }
                }
                $total++;
            }
        }
    }
    echo "Total: " . $total;
});


Route::any("news", function () {
    $response = Http::get("https://www.wyrd-games.net/news");
    $code = $response->body();

    preg_match_all('(<a href=(.*?) class="u-url" rel="bookmark">(.*?)</a>)', $code, $matches);
    dd($matches);
});

Route::get("/keyword-count", function () {
   $masters = Mini::whereHas("factions", function (\Illuminate\Database\Eloquent\Builder $query) {
       $query->where("name", "Bayou");
   })->where("station_id", 1)->get();

   foreach($masters as $master) {
       $keywords = $master->keywords->pluck("id");
       if ($master->hidden_keyword_id) {
           $keywords[] = $master->hidden_keyword_id;
       }

       $minis = Mini::whereHas("keywords", function (Builder $query) use ($keywords) {
           $query->whereIn("id", $keywords);
       })->get();

       $bases = [
           30 => 0,
           40 => 0,
           50 => 0,
       ];

       foreach ($minis as $mini) {
           $bases[$mini->base]++;
       }
       echo $master->name;
       echo " - ";
       echo collect($bases);
       echo " - ";
       echo "Total: ";
       $total = 30*$bases[30] + 40*$bases[40] + 50*$bases[50];
       echo $total;
       echo "<br />";
   }
});
