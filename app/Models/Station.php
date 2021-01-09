<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Station extends Model
{
    protected $fillable = [
        'name'
    ];

    public function minis() {
        return $this->hasMany(Mini::class);
    }
    
}
