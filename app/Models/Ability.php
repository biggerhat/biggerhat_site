<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Ability extends Model
{
    use Searchable;

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $trackable = [
            "id",
            'name',
            'description',
        ];

        return array_intersect_key($array, array_flip($trackable));
    }

    protected $fillable = [
        'name',
        'description',
    ];

    protected $with = [
        'questions',
    ];

    public function minis()
    {
        return $this->belongsToMany(Mini::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }
}
