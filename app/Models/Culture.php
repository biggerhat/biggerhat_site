<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Culture extends Model
{
    protected $guarded = [];

    public function minis()
    {
        return $this->belongsToMany(Mini::class);
    }

    public function promos()
    {
        return $this->belongsToMany(Promo::class);
    }
}
