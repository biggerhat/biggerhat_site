<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upgrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'plentiful',
        'description',
        'cost',
        'tactica',
    ];

    protected $with = [
        'uspecials',
        'urestricteds',
    ];

    public function minis() {
        return $this->belongsToMany(Mini::class);
    }

    public function uspecials() {
        return $this->belongsToMany(Uspecial::class);
    }

    public function urestricteds() {
        return $this->belongsToMany(Urestricted::class);
    }

    public function erratas() {
        return $this->hasMany(Errata::class);
    }
}
