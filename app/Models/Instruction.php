<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Instruction extends Model
{
    protected $fillable = [
        'image',
    ];

    public function minis()
    {
        return $this->belongsToMany(Mini::class);
    }
}
