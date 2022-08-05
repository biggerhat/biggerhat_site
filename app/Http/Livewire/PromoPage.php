<?php

namespace App\Http\Livewire;

use App\Models\Promo;
use Livewire\Component;

class PromoPage extends Component
{
    public $promos;
    public $currentCard;

    public function mount($slug)
    {
        $this->currentCard = 0;
        $this->promos = Promo::where('slug', $slug)->get();
        if ($this->promos->count() == 0) {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.promo-page')
            ->extends('main')
            ->section('content');
    }
}
