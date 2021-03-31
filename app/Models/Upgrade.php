<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Upgrade extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'plentiful',
        'description',
        'cost',
        'tactica',
    ];

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $trackable = [
            "id",
            'name',
            'plentiful',
            'description',
            'cost',
        ];

        return array_intersect_key($array, array_flip($trackable));
    }

    protected $with = [
        'uspecials',
        'urestricteds',
    ];

    public function minis()
    {
        return $this->belongsToMany(Mini::class);
    }

    public function uspecials()
    {
        return $this->belongsToMany(Uspecial::class);
    }

    public function urestricteds()
    {
        return $this->belongsToMany(Urestricted::class);
    }

    public function erratas()
    {
        return $this->hasMany(Errata::class);
    }

    public function factions()
    {
        return $this->belongsToMany(Faction::class);
    }

    public function tacticas()
    {
        return $this->hasMany(Tactica::class);
    }
}
