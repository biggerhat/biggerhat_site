<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Keyword extends Model
{
    protected $fillable = [
        'name',
        'description',
        'tactica',
        'tag',
    ];
    
    public function minis() {
        return $this->belongsToMany(Mini::class);
    }
}
