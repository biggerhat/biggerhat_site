<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uspecial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function upgrades()
    {
        return $this->belongsToMany(Upgrade::class);
    }
}
