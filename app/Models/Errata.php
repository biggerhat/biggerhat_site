<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Errata extends Model
{
    protected $fillable = [
        'description',
        'season_id',
        'upgrade_id',
        'mini_id',
    ];

    protected $with = [
        'season'
    ];

    public function upgrade() {
        return $this->belongsTo(Upgrade::class);
    }

    public function mini() {
        return $this->belongsTo(Mini::class);
    }

    public function season() {
        return $this->belongsTo(Season::class);
    }
    
}
