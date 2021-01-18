<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Ability extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function minis()
    {
        return $this->belongsToMany(Mini::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }
    
}
