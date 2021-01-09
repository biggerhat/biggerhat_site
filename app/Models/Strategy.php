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
}
