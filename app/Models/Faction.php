<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Faction extends Model
{

    protected $fillable = [
        'name',
        'description',
        'tactica',
        'image',
        'tag',
        'hidden',
    ];

    public function minis() {
        return $this->belongsToMany(Mini::class);
    }
    
}
