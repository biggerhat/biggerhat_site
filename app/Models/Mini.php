<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


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

    protected $with = [
        'factions',
        'keywords',
        'characteristics',
        'abilities',
        'station',
        'actions',
        'upgrades',
        'cards',
    ];

    public function factions()
    {
        return $this->belongsToMany(Faction::class);
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
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

    public function cards() {
        return $this->hasMany(Card::class, 'mini_id', 'id');
    }

    
}
