<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Action extends Model
{
    use Searchable;

    protected $fillable = [
        'name',
        'type',
        'bonus',
        'range',
        'stat',
        'stat_suits',
        'stat_modifier',
        'resist',
        'target',
        'target_suits',
        'description',
        'notes',
        'range_type',
    ];

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $trackable = [
            "id",
            'name',
            'type',
            'bonus',
            'range',
            'stat',
            'stat_suits',
            'stat_modifier',
            'resist',
            'target',
            'target_suits',
            'description',
            'range_type',
        ];

        return array_intersect_key($array, array_flip($trackable));
    }

    protected $with = [
        'questions',
        'triggers',
    ];

    public function minis()
    {
        return $this->belongsToMany(Mini::class);
    }

    public function triggers()
    {
        return $this->belongsToMany(Trigger::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }
}
