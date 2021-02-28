<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\MiniSaved;
use Illuminate\Database\Query\Builder;

class Mini extends Model
{
    protected $fillable = [
        'name',
        'station_id',
        'cost',
        'wounds',
        'size',
        'base',
        'defense',
        'defense_suit',
        'willpower',
        'willpower_suit',
        'move',
        'quantity',
        'aka',
        'description',
        'tag',
        'hidden_keyword_id',
    ];

    protected $dispatchesEvents = [
        'saved' => MiniSaved::class,
    ];

    public function factions()
    {
        return $this->belongsToMany(Faction::class);
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }

    public function hiddenKeyword()
    {
        return $this->belongsTo(Keyword::class, 'hidden_keyword_id', 'id');
    }

    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class);
    }

    public function abilities()
    {
        return $this->belongsToMany(Ability::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id', 'id');
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class);
    }

    public function upgrades()
    {
        return $this->belongsToMany(Upgrade::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class, 'mini_id', 'id');
    }

    public function erratas()
    {
        return $this->hasMany(Errata::class, 'mini_id', 'id');
    }

    public function markers()
    {
        return $this->belongsToMany(Marker::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function tokens()
    {
        return $this->belongsToMany(Token::class);
    }

    public function promos()
    {
        return $this->hasMany(Promo::class, 'mini_id', 'id');
    }

    public function instructions()
    {
        return $this->belongsToMany(Instruction::class);
    }

    public function boxes()
    {
        return $this->belongsToMany(Box::class);
    }

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }

    /**
     * Scope a query to only include minis of a given faction.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInFaction($query, $id)
    {
        return $query->whereHas('factions', function ($q) use ($id) {
            $q->where('id', $id);
        })->whereDoesntHave('factions', function ($q) {
            $q->where('id', '=', 8);
        });
    }

    public function scopeInKeyword($query, $id)
    {
        return $query->whereHas('keywords', function ($q) use ($id) {
            $q->where('id', $id);
        });
    }

    public function scopeFilterKeyword($query, $name)
    {
        return $query->whereHas('keywords', function ($q) use ($name) {
            $q->where('name', $name);
        });
    }

    public function scopeFilterCharacteristic($query, $name)
    {
        return $query->whereHas('characteristics', function ($q) use ($name) {
            $q->where('name', $name);
        });
    }

    public function scopeHasStation($query, $id)
    {
        return $query->where('station_id', $id);
    }
}
