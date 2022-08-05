<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;

class Promo extends Model
{
    protected $fillable = [
        'name',
        'description',
        'front',
        'back',
        'pdf',
        'mini_id',
    ];

    public static function booted()
    {
        static::saved(function ($promo) {
            $promo->slug = Str::slug($promo->name, '-');
            $promo->saveQuietly();
            if (!$promo->combo) {
                comboImagePromo($promo);
            }
        });
    }

    public function mini()
    {
        return $this->belongsTo(Mini::class);
    }

    public function boxes()
    {
        return $this->belongsToMany(Box::class);
    }

    public function instructions()
    {
        return $this->belongsToMany(Instruction::class);
    }

    public function cultures()
    {
        return $this->belongsToMany(Culture::class);
    }
}
