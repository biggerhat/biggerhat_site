<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Token extends Model
{
    protected $fillable = [
        'name',
        'description',

    ];

    public function minis()
    {
        return $this->belongsToMany(Mini::class);
    }
}
