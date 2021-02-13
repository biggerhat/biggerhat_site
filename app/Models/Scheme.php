<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Scheme extends Model
{
     protected $fillable = [
          'name',
          'number',
          'description',
          'reveal',
          'end',
          'tactica',
          'season_id',
          'image',
     ];

     public function season()
     {
          return $this->belongsTo(Season::class);
     }
}
