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
        'erratas',
        'markers',
        'questions',
        'tokens',
        'promos',
        'instructions',
        'boxes',
        'episodes',
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

    public function cards() {
        return $this->hasMany(Card::class, 'mini_id', 'id');
    }

    public function erratas() {
        return $this->hasMany(Errata::class, 'mini_id', 'id');
    }

    public function markers() {
        return $this->belongsToMany(Marker::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function tokens() {
        return $this->belongsToMany(Token::class);
    }
     
    public function promos() {
        return $this->hasMany(Promo::class, 'mini_id', 'id');
    }

    public function instructions() {
        return $this->belongsToMany(Instruction::class);
    }

    public function boxes() {
        return $this->belongsToMany(Box::class);
    }

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }
    
}
