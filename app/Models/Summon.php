<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summon extends Model
{
    use HasFactory;

    public function summoner()
    {
        return $this->belongsTo(Mini::class, 'summoner_id', 'id');
    }

    public function summons()
    {
        return $this->belongsToMany(Mini::class)->orderBy('name');
    }

    public function upgrades()
    {
        return $this->belongsToMany(Upgrade::class);
    }
}
