<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Action extends Model
{
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

    public function minis()
    {
        return $this->belongsToMany(Mini::class);
    }

    public function triggers()
    {
        return $this->belongsToMany(Trigger::class);
    }

    public function questions() {
        return $this->belongsToMany(Question::class);
    }
}
