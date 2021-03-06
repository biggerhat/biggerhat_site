<?php

namespace App\Models;

use App\Events\BoxSaved;
use Illuminate\Database\Eloquent\Model;



class Box extends Model
{
    protected $fillable = [
        'name',
        'description',
        'front',
        'back',
    ];

    protected $dispatchesEvents = [
        'saved' => BoxSaved::class,
    ];

    public function minis()
    {
        return $this->belongsToMany(Mini::class);
    }
}
