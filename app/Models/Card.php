<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Card extends Model
{
    protected $fillable = [
        'front',
        'back',
        'pdf',
        'mini_id',
    ];

    public static function booted()
    {
        static::saved(function ($card) {
            if (!$card->combo) {
                comboImage($card);
            }
        });
    }

    public function mini()
    {
        return $this->belongsTo(Mini::class, 'mini_id', 'id');
    }
}
