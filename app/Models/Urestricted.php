<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Urestricted extends Model
{
    protected $fillable = [
        'name',
    ];

    public function upgrades() {
        return $this->belongsToMany(Upgrade::class);
    }
    
}
