<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Strategy extends Model
{
    protected $fillable = [
        'name',
        'suit',
        'description',
        'tactica',
        'season_id',
        'image',
    ];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function tacticas()
    {
        return $this->hasMany(Tactica::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }
}
