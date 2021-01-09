<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Deployment extends Model
{
    protected $fillable = [
        'name',
        'description',
        'suit',
        'image',
        'season_id',
    ];
}
