<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\MiniSaved;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;

class Mini extends Model
{
    use Searchable;

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

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $trackable = [
            "id",
            'name',
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
        ];

        return array_intersect_key($array, array_flip($trackable));
    }

    protected static function booted()
    {
        static::addGlobalScope('visible', function (Builder $builder) {
            $builder->where('isHidden', false);
        });
    }

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

    public function summoner()
    {
        return $this->hasMany(Summon::class, 'summoner_id', 'id');
    }

    public function summons()
    {
        return $this->belongsToMany(Summon::class);
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
        return $this->hasMany(Errata::class, 'mini_id', 'id')->orderBy('id', 'DESC');
    }

    public function markers()
    {
        return $this->belongsToMany(Marker::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
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
        return $this->belongsToMany(Box::class)
            ->withPivot('quantity');
    }

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }

    public function tacticas()
    {
        return $this->hasMany(Tactica::class);
    }

    public function original()
    {
        return $this->belongsTo(Mini::class, 'original_id');
    }

    public function titles()
    {
        return $this->hasMany(Mini::class, 'original_id');
    }

    public function spoilers()
    {
        return $this->morphToMany(Spoiler::class, 'spoilerize');
    }

    public function cultures()
    {
        return $this->belongsToMany(Culture::class);
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
        $query->where('hidden_keyword_id', $id);
        $query->orWhereHas('keywords', function ($q) use ($id) {
            $q->where('id', $id);
        });
        return $query;
    }

    public function scopeHasAbility($query, $name)
    {
        return $query->whereHas('abilities', function ($q) use ($name) {
            $q->where('name', 'LIKE', "%{$name}%");
        });
    }

    public function scopeHasAbilityText($query, $text)
    {
        return $query->whereHas('abilities', function ($q) use ($text) {
            $q->where('description', 'LIKE', "%{$text}%");
        });
    }

    public function scopeHasAction($query, $name)
    {
        return $query->whereHas('actions', function ($q) use ($name) {
            $q->where('name', 'LIKE', "%{$name}%");
        });
    }

    public function scopeHasMarker($query, $name)
    {
        return $query->whereHas('markers', function ($q) use ($name) {
            $q->where('name', 'LIKE', "%{$name}%");
        });
    }

    public function scopeHasToken($query, $name)
    {
        return $query->whereHas('tokens', function ($q) use ($name) {
            $q->where('name', 'LIKE', "%{$name}%");
        });
    }

    public function scopeHasActionText($query, $text)
    {
        return $query->whereHas('actions', function ($q) use ($text) {
            $q->where('description', 'LIKE', "%{$text}%");
        });
    }

    public function scopeIsHirable($query)
    {
        $query->where('IsUnhirable', 0);
    }

    public function scopeViewAll($query)
    {
        $query->withoutGlobalScope('visible');
    }

    public function scopeIsAlive($query)
    {
        return $query->whereDoesntHave('factions', function ($q) {
            $q->where('id', '=', 8);
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
