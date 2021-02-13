<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Promo extends Model
{
    protected $fillable = [
        'name',
        'description',
        'front',
        'back',
        'pdf',
        'mini_id',
    ];

    public function mini()
    {
        return $this->belongsTo(Mini::class);
    }
}
