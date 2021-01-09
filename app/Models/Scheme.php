<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Scheme extends Model
{
       protected $fillable = [
            'name',
            'number',
            'description',
            'tactica',
            'season_id',
            'image',
       ];
}
