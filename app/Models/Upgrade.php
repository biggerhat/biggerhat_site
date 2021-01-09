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

    public function minis() {
        return $this->belongsToMany(Mini::class);
    }
}
