<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function markers()
    {
        return $this->belongsToMany(Marker::class)->orderBy('name');
    }
}
