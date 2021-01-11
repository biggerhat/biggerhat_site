<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Season extends Model
{
    protected $fillable = [
        'name',
        'description',
        'link'
    ];

    public function erratas() {
        return $this->hasMany(Errata::class);
    }
    
    public function schemes() {
        return $this->hasMany(Scheme::class);
    }

    public function strategies() {
        return $this->hasMany(Strategy::class);
    }

    public function deployments() {
        return $this->hasMany(Deployment::class);
    }
}
